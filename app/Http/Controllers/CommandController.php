<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Event;
use App\Models\Portemonnaie;
use App\Models\Tiket;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use HTTP_Request2;
use HTTP_Request2_Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class CommandController extends Controller

{

   public $MTN_REQUEST_URL='https://qosic.net:8443/QosicBridge/user/requestpayment';
   public $MOOV_REQUEST_URL='https://qosic.net:8443/QosicBridge/user/requestpaymentmv';
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
      if($type=="mtn"){
        $request->setUrl($this->MTN_REQUEST_URL);
        $this->current_client_id=$this->MTN_CLIENT_ID;
      } 
      else{
        $request->setUrl($this->MOOV_REQUEST_URL);
        $this->current_client_id=$this->MOOV_CLIENT_ID;
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

      if(in_array(intval(substr($num,0,2)),$this->MTN_PREFIXES)){
       $reseau="mtn";
      }elseif(in_array(intval(substr($num,0,2)),$this->MOOV_PREFIXES)){
         $reseau="moov";
      }else{

        return redirect()->back() ->with('alert', 'Les réseaux prit en compte sont MTN et MOOV ');
      }
      $num="229".$num;

      $request=$this->request_header($reseau);
      $body=[
        "msisdn"=> $num,
        "amount"=> "1",
        "transref" =>$this->get_new_transref(),
        "narration"=>"payment",
        "clientid"=>$this->MOOV_CLIENT_ID
      ];
      echo "===>".$this->get_new_transref()."<=====";
      $request->setBody(json_encode($body));

          try {
            $response = $request->send();
            echo json_decode($response->getBody())->responsecode;

            if ($response->getStatus() == 202 || $response->getStatus() == 200) {

              
              try{
                  while(json_decode($response->getBody())->responsecode=="01") {
                    echo 'code --> '.json_decode($response->getBody())->responsecode;
                   }
                   echo 'code --> '.json_decode($response->getBody())->responsecode;
                   if(json_decode($response->getBody())->responsecode=="00"){
                    echo 'code --> '.json_decode($response->getBody())->responsecode; 
                   }
              }catch(Exception  $e){
                echo ''.$e;
              }
              
            }
            else {
              echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
              $response->getReasonPhrase();
            }
          }
          catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
          }

    }

    public function check_request_status()
    {
     
    
    }


    










    function buy($id){

        // $ticket=Tiket::findOrFail($id);
        // $tickets=Tiket::all()->where('event_id','=',$ticket->event_id);
        // $ptm=Portemonnaie::where('id_client','=',Auth::user()->id)->first();
        // $event_=0;
        // if ($ptm!=null and ($ptm->total_account-$ptm->waiting_price)>=$ticket->price){
        //     Commande::create(
        //             ['event_id'=>$ticket->event_id,'client_id'=>Auth::user()->id,'price'=>$ticket->price,'status'=>0]
        //         );
        //     $ptm->update(["waiting_price"=>$ptm->waiting_price-$ticket->price,"id_tickets"=>$ptm->id_tickets==null ? $ticket->id : $ptm->id_tickets." ".$ticket->id ]);
        //     $tickets_=explode(" ", $ptm->id_tickets);
        //     //return redirect()->view("/event/show/"+$ticket->event_id,compact("tickets_","event_"));
        //     return redirect()->route("show_event",['id'=>$ticket->event_id]);
        //     }


        // elseif ($ptm!=null and ($ptm->total_account-$ptm->waiting_price)>=$ticket->price) {

        //     return redirect()->action([PortemonnaieController::class,'edit'],['id'=>$ptm->id]);
        // }   

        // elseif ($ptm==null) return redirect()->action([PortemonnaieController::class,'new']);
        return redirect()->action([PortemonnaieController::class,'new']);
        // else return redirect()->back()->with("error","You don't have enough money");
    }

    function publish($id){

        $commande=Commande::findOrFail($id);
        $commande->status=1;
        $commande->save();
        return redirect()->action([DashboardController::class,'promotor']);
    }

}
