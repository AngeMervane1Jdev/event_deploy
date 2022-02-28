<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Event;
use App\Models\Portemonnaie;
use App\Models\Tiket;
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
   private $current_client_id;
   private $TRANSREF_INI="massali-20";
   private $CURRENT_TRANS_REF;



   /////////////////////////////////////////////////////////////////////
   public function request_header($type)
   {
      $request = new HTTP_Request2();
      if($type=="mtn"){
        $request->setUrl($this->MTN_REQUEST_URL);
        $this->current_client_id=$this->MTN_CLIENT_ID;
      } // $request->setBody('
      // {
      //   "msisdn": "22966895585",
      //   "amount": "1",
      //   "transref" :"ange-12",
      //   "narration": "payment",
      //   "clientid": "Massali5BF"
      // }'
      //    );
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
     $to_returned=str_replace("-","",substr(time().now(),10));
     $to_returned=str_replace(":","",$to_returned);
     return str_replace(" ","",$to_returned);
   }



   /////////////////////////////////////////////////////////////////////


    public function sale_ticket(Request $coming_request){

      $reseau=$coming_request->reseau;
      $num="229".$coming_request->phone_number;

      $request=$this->request_header($reseau=="moov");
      $body=[
        "msisdn"=> $num,
        "amount"=> "1",
        "transref" =>$this->get_new_transref(),
        "narration"=>"payment",
        "clientid"=>$this->MTN_CLIENT_ID
      ];
      echo "===>".$this->get_new_transref()."<=====";
      $request->setBody(json_encode($body));

          try {
            $response = $request->send();

            if ($response->getStatus() == 202) {

              echo $this->CURRENT_TRANS_REF;
         
              echo json_decode($response->getBody())->responsecode;
              while(json_decode($response->getBody())->responsecode=="01") {
                
              }
              if(json_decode($response->getBody())->responsecode=="00"){
                           
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
