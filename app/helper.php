<?php

use App\Models\Commande;
use App\Models\Event;
use App\Models\Tiket;

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


?>