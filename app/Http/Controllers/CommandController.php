<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Panier;
use App\Models\Tiket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use HTTP_Request2;
use HTTP_Request2_Exception;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller

{

   public $MTN_REQUEST_URL='https://qosic.net:8443/QosicBridge/user/requestpayment';
   public $MOOV_REQUEST_URL='https://qosic.net:8443/QosicBridge/user/requestpaymentmv';
   public $TRANS_STATE_URL="https://qosic.net:8443/QosicBridge/user/gettransactionstatus";
   public $MTN_CLIENT_ID="Massali5BF";
   public $MOOV_CLIENT_ID="Massali6MV";
   public $MTN_PREFIXES=[51, 52, 53, 54, 61, 62, 66, 67, 69, 90, 91, 96, 97];
   public $MOOV_PREFIXES=[60,63,65,68,94,95,98,99,55];
   private $TRANSREF_INI="msl";
   private $CURRENT_TRANS_REF;



   /////////////////////////////////////////////////////////////////////
   public function request_header($type)
   {
      $request = new HTTP_Request2();
      $request->setUrl($this->MOOV_REQUEST_URL);
      if($type=="mtn"){
        $request->setUrl($this->MTN_REQUEST_URL);
      } 
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
          'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
          'Authorization' => 'Basic UVNVU1IzNDg6a2pLRkk0NnZyWngwWklSU1pFNUE=',
          'Content-Type' => 'application/json'
        ));
        return $request;
   
   }



   /////////////////////////////////////////////////////////////////////

   public function get_new_transref()
   {
     $to_returned=str_replace("-","",substr($this->TRANSREF_INI.''.time().now(),10));
     $to_returned=str_replace(":","",$to_returned);
     return str_replace(" ","",$to_returned);
   }



   /////////////////////////////////////////////////////////////////////


    public function sale_ticket(Request $coming_request){

        $num=$coming_request->phone_number;
        $reseau="";
      
        if($coming_request->is_panier==1){
          $panier= Panier::findOrFail($coming_request->id);
          $amount=$panier->price;
          $tickets_id=json_decode($panier->tickets_validated,true);
        }
        else{
          $ticket=Tiket::findOrFail($coming_request->id);
          $amount=$ticket->price;
          $tickets_id[1]=$ticket->id;
        }

        if(in_array(intval(substr($num,0,2)),$this->MTN_PREFIXES)){
            $reseau="mtn";
            $clientID=$this->MTN_CLIENT_ID;
        }elseif(in_array(intval(substr($num,0,2)),$this->MOOV_PREFIXES)){
            $reseau="moov";
            $clientID=$this->MOOV_CLIENT_ID;
        }else{

            return redirect()->back() ->withMessage('Les réseaux prit en compte sont MTN et MOOV ');
        }
        $num="229".$num;


        $request=$this->request_header($reseau);
        $transref=$this->get_new_transref();
        $body=[
          "msisdn"=> $num,
          "amount"=> 1,
          "transref" =>$transref,
          "narration"=>"payment",
          "clientid"=>$clientID
        ];
        $request->setBody(json_encode($body));

        try {
          $response = $request->send();

          if ($response->getStatus() == 202 || $response->getStatus() == 200) {
                $result=$this->check_request_status($transref,$clientID,$reseau);
                if($result){
                  Transaction::CreateOrUpdate([
                    "numero"=> $num,
                    "amount"=> $amount,
                    "transref" =>$transref,
                    "client_id"=>Auth::user()->id,
                    'ticket_id'=>json_encode($tickets_id),
                    "date"=>date('d-m-y h:i:s'),
                    "status"=>1
                  ]);
                  if($coming_request->is_panier==1){
                      $panier->price=0;
                      $panier->tickets="";
                  }

                  return redirect()->back()->withMessage('1');
                }
                else{
                  Transaction::CreateOrUpdate([
                    "numero"=> $num,
                    "amount"=> $amount,
                    "transref" =>$transref,
                    "client_id"=>Auth::user()->id,
                    'ticket_id'=>json_encode($tickets_id),
                    "date"=>date('d-m-y h:i:s'),
                    "status"=>-1
                   ]);
                  return redirect()->back()->withMessage("Echec d'envoi !! ".json_decode($response->getBody())->responsecode);
                }
          }
          else {
            return redirect()->back()->withMessage('Unexpected HTTP status: ' . $response->getReasonPhrase());
          
          }
        }
        catch(HTTP_Request2_Exception $e) {
          $response->getReasonPhrase('Error: ' . $e->getMessage());
        }

    }

    ////////////////////////////////////////////////////////////////////$


    public function check_request_status($transref,$clientID,$reseau)
    {
     
      $request=$this->request_header($reseau);
      $body=[
        "transref" =>$transref,
        "clientid"=>$clientID
      ];
      $request->setBody(json_encode($body));
      try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
          if(json_decode($response->getBody())->responsecode=="00" || json_decode($response->getBody())->responsecode=="0"){
            return true;
          }
          else if(json_decode($response->getBody())->responsecode=="01"){
            $this->check_request_status($transref,$clientID,$reseau);
          }
          else{
            return false;
          }
        }
        else {
          $response->getReasonPhrase( 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
          $response->getReasonPhrase());
        }
      }
      catch(HTTP_Request2_Exception $e) {
        echo 'Error: ' . $e->getMessage();
      }
    
    }

////////////////////////////////////////////////////////////////

    function publish($id){

        $commande=Commande::findOrFail($id);
        $commande->status=1;
        $commande->save();
        return redirect()->action([DashboardController::class,'promotor']);
    }

}
