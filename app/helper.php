<?php

use App\Models\Commande;
use App\Models\Event;

if (!function_exists("date_formater")) {
    function date_formater($date){
       
       $m=date('n',strtotime($date));
       $jourMois=date('j',strtotime($date));
       $annee=date('Y',strtotime($date));
       $heure=date('H',strtotime($date));
       $minutes=date('i',strtotime($date));
       $lundi=date('w',strtotime($date));

       $Mois=["Jan","Fre","Mar","Avr","Mai","Jui","Juil","Aou","Sep","Oct","Nov","Dec"];
       $mois=$Mois[$m-1];
       $Jours=["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"];
       $jour=$Jours[$lundi];

       return array("jour"=>$jour,"mois"=>$mois,"jourMois"=>$jourMois,"heure"=>$heure,"minutes"=>$minutes,"annee"=>$annee);
       

    }
}if (!function_exists("commandes_for_event")) {
    function commandes_for_event($event){
       $commandes=Commande::all()->where("event_id","=",$event)->first();
       return $commandes;
    }
}
if (!function_exists("event_for_commande")) {
    function event_for_commande($id){
       $event=Event::findOrFail($id);
       return $event;
    }
}


?>