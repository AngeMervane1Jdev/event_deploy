<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    function show(){
        $panier=Panier::findOrCreate();
        $tickets=array();
        if($panier->tickets!=""){
            $tt=explode(",",$panier->tickets);
            foreach ($tt as $tick) {
                $ticket=Tiket::findOrFail(intVal($tick));
                array_push($tickets,$ticket);
            }
        }
       
        $id=$panier->id;
        return view('/client/panier',compact("tickets","id"));
    }


    function remove_ticket($id)
    {
        $panier= $panier=Panier::findOrCreate();
        $tickets=array();
        $ticket=Tiket::findOrFail($id);

        foreach (explode(',',$panier->tickets) as $value) {
            if($value!=$id)
             array_push($tickets,$value);
        }
        $panier->tickets=join(",",$tickets);
        $panier->price=$panier->price-$ticket->price;
        $panier->save();
        return redirect()->action([PanierController::class,'show'])->withMessage("Supprimé du panier");
       
    }

    function add_ticket($id)
    {
        $panier= $panier=Panier::findOrCreate();
         $ticket=Tiket::findOrFail($id);
         if($panier->tickets==""){
            $panier->tickets=$id;
         }else{
            $panier->tickets=$panier->tickets.",".$id;
         }
         $panier->price=$panier->price+$ticket->price;
         $panier->save();
        return redirect()->back()->withMessage("Ajouté au panier");

    }

    function sale($id)
    {
       $panier= $panier=Panier::findOrCreate();
        $is_panier=1;
        return view('/portemonnaie/new',compact("id","is_panier"));
    }

    function remove_all()
    {
        $panier= $panier=Panier::findOrCreate();
        $panier->tickets="";
        $panier->price=0;
        $panier->save();
        return redirect()->action([PanierController::class,'show'])->withMessage("Votre panier a été vidé");

    }

}
