<?php

use App\Models\Event;
use App\Models\Tiket;
use App\Models\Commande;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

if (!function_exists("date_formater")) {
    function date_formater($date){
       
       $m=date('n',strtotime($date));
       $jourMois=date('j',strtotime($date));
       $annee=date('Y',strtotime($date));
       $heure=date('H',strtotime($date));
       $minutes=date('i',strtotime($date));
       $lundi=date('w',strtotime($date));

       $Mois=["Janvier","Frevrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"];
       $mois=$Mois[$m-1];
       $Jours=["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"];
       $jour=$Jours[$lundi];

       return array("jour"=>$jour,"mois"=>$mois,"jourMois"=>$jourMois,"heure"=>$heure,"minutes"=>$minutes,"annee"=>$annee);
       

    }
}if (!function_exists("event_status")) {
    function event_status($event_id){
       $e=Event::findOrFail($event_id);

       $msg="";
      if($e->end_time>now() and $e->start_time<now()){
          $msg="En cours";
      }
      else if($e->start_time>now()){
        $date=date_formater($e->start_time);
       $msg="Commence le ".$date["jour"]." ".$date["jourMois"]." ".$date["mois"]." ".$date["annee"];
      }
      else if($e->end_time<now()){
          $msg="Passé";
      }
       return $msg;
    }
}
if (!function_exists("event_and_tiket")) {
    function event_and_tiket($ticket){
          $t=Tiket::findOrFail($ticket);
          $e=Event::findOrFail($t->event_id);
          $events[$e->event_name]=$t;


       return $events;
    }
}

if(!function_exists("tickeEvent")){
    function tickeEvent($id){
        $eventTicket=DB::table('type_tikets')
        ->join('tikets','tikets.type_id','=','type_tikets.id')
        ->join('events','tikets.event_id','=','events.id')
        ->where('events.id','=',$id)
        ->select('type_tikets.*','tikets.*')
        ->get();
        return $eventTicket;
    }
}

if(!function_exists("RateUser")){
    function RateUser($id){
       $rate=1;
        $tickets=DB::table("tikets")
        ->join("events","events.id","=","tikets.event_id")
        ->join("users","users.id","=","events.user_id")
        ->where("users.id","=",$id);

       $tickets= count($tickets->select("*")->get());
       $events=count(Event::where('user_id',"=",$id)->get());

       if($events>0 and $events<=5){
        $rate=1.0;

       }
     else if($events>5 and $events<=10){
        $rate=2.0;

       }
       else if($events>10 and $events<=50){
           $rate=3.0;

       }
       elseif ($events>50 and $events<=100) {
        $rate=4.0;

       }
       else if($events>100){
           $rate=5.0;
       }
      User::whereId($id)->update(['rate'=>$rate]);
 
    }
}

if(!function_exists("RateClient")){
    function RateClient($id){
    $rate=1.0;
        $tickets=count(Transaction::where('client_id',$id)->get());
       
       if($tickets>0 and $tickets<=5){
        $rate=1.0;

       }
     else if($tickets>5 and $tickets<=10){
        $rate=2.0;

       }
       else if($tickets>10 and $tickets<=50){
           $rate=3.0;

       }
       elseif ($tickets>50 and $tickets<=100) {
        $rate=4.0;

       }
       else if($tickets>100){
           $rate=5.0;
       }
      User::whereId($id)->update(['rate'=>$rate]);
 
    }
}


?>