<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Tiket;
use Illuminate\Support\Arr;

class PanierController extends Controller
{
    function show(){
        $panier=Panier::findOrCreate();
       

        /**
         * une un json [id=>quantité ticket]
         */
        $panier_tickets=json_decode($panier->tickets,true);
        
        $selected=json_decode($panier->tickets_validated,true);

        
        

        $selected!=null?$tickets_validated=array_keys($selected):$tickets_validated=array();

        
        /**
         * un json [model_Ticket=>quantite] à retourner
         */
        $tickets=array();
        $quantities=array();
        if($panier_tickets!=null && count($panier_tickets)>0){
            foreach ($panier_tickets as $id=> $quantity) {
                $ticket=Tiket::findOrFail(intVal($id));
                array_push($tickets,$ticket);
                array_push($quantities,$quantity);

            }
            
        }
       

        

        
        $id=$panier->id;
        $price=$panier->price;
        return view('/client/panier',compact("quantities","tickets","id","tickets_validated","price"));
    }


    function remove_ticket($id)
    {
        $panier=Panier::findOrCreate();
        $ticket=Tiket::findOrFail($id);

        $panier_tickets=json_decode($panier->tickets,true);
        unset($panier_tickets[$id]);
        $panier->tickets=$panier_tickets;
        

        $selected=json_decode($panier->tickets_selected,true);
        if($selected!=null && array_key_exists($id,$selected)){
            $panier->price=$panier->price-$ticket->price*$selected[$id];
            unset($selected[$id]);
            $panier->tickets_validated=json_encode($panier_tickets);
        }
        
        $panier->save();
        return redirect()->action([PanierController::class,'show'])->withMessage("Supprimé du panier");
       
    }

    function add_ticket($id)
    {

        /**
         * Les tickets du panier sont dans un tableau associatif [id=>quantité tickets]
         */
        $panier=Panier::findOrCreate();
        if($panier->tickets==null){
            $tickets=array();
        }else{
            $tickets=json_decode($panier->tickets,true);
        }
        
         $ticket=Tiket::findOrFail($id);

         /**
          * si le panier n'a pas encore de tickets  
          */
       
         if(count($tickets)==0){
            $tickets[$id]=1;
         }
         //sinon on recherche le ticket s'il existe dejà pour augmenter la quantité de 1
         //sinon on l'ajoute au tableau des tickets du panier avec quantité 1
         
         else{
            if(array_key_exists($id,$tickets)){
               $tickets[$id]=$tickets[$id]+1;
            }else{
                $tickets[$id]=1;
            }
         }
         //  return view(var_dump($tickets[1]));
         $panier->tickets=$tickets;
         //calcule du prix total dans le panier

         $panier->save();
        return redirect()->back()->withMessage("Ajouté au panier");

    }
     


   public function select_id(){
        $id=$_GET["id"];
        $price=$_GET["price"];
        $panier=Panier::findOrCreate();
        $tickets= json_decode($panier->tickets,true);
        $tickets_selected= json_decode($panier->tickets_validated,true);
        
        if($tickets_selected==null)$tickets_selected=array();
        $tickets_selected[$id]=$tickets[$id];
        $panier->tickets_validated=$tickets_selected;
        
        $panier->price=$panier->price+$price*$tickets_selected[$id];
    

        $panier->save();
        return json_encode(["price"=>$panier->price]);      
   }

   public function deselect_id(){
    $id=$_GET["id"];
    $price=$_GET["price"];
    $panier=Panier::findOrCreate();
    $tickets_selected=json_decode($panier->tickets_validated,true);
    $panier->price=$panier->price-$price*$tickets_selected[$id];
    unset($tickets_selected[$id]);
    $panier->tickets_validated=$tickets_selected;
    $panier->save();
    return json_encode(["price"=>$panier->price]);   

  }

  public function deselect_all()
  {
     $panier=Panier::findOrCreate();
     $panier->tickets_validated=array();
     $panier->price=0.0;
     $panier->save();
     return json_encode(["price"=>0]) ;
  }
  public function select_all()
  {
     $panier=Panier::findOrCreate();
     $tickets_validated=json_decode($panier->tickets,true);
     $price=0.0;
     $panier->tickets_validated=array();

     $panier->tickets_validated=$tickets_validated;

    foreach($tickets_validated as $key => $value) {
        $ticket=Tiket::findOrFail(intVal($key));
        $price=$price+$ticket->price*intval($value);
    }
   
     $panier->price=$price;
     $panier->save();
     return json_encode(["price"=>$price]) ;
  }

  public function change_quantity()
  {
    $quantity=intVal($_GET["quantity"]);
    $id=intVal($_GET["id"]);
    
    $ticket=Tiket::findOrFail($id);
    $panier=Panier::findOrCreate();

    $tickets_selected=json_decode($panier->tickets_validated,true);
    $tickets=json_decode($panier->tickets,true);


  
  
   // on verifie si la quantité est surperieure à zéro
   // si oui, on change sa valeur dans tickets et s'il était selectioné, on change aussi


    if($quantity>0){
        $tickets[$id]=$quantity;
        $new_price= $panier->price;
        if($tickets_selected!=null && array_key_exists($id,$tickets_selected)){
           $new_price= $new_price  -  $tickets_selected[$id]*$ticket->price  +  $quantity*$ticket->price;
           $tickets_selected[$id]=$quantity;
           $panier->price=$new_price;
        }
        $panier->tickets=$tickets;
        $panier->tickets_validated=$tickets_selected;
        $panier->save();
       return json_encode(['success'=>$tickets,"price"=>$new_price]) ;
    }
    return json_encode(['error'=>"La quantité doit être plus que 0","price"=>$panier->price]) ;
   }

    function sale($id)
    {
        $panier=Panier::findOrCreate();
        $is_panier=1;
        if (count(json_decode($panier->tickets_validated,true))==0) {
            return redirect()->back()->withMessage(1);
        }
        return view('/portemonnaie/new',compact("id","is_panier"));
    }

    
    function remove_all()
    {
        $panier= $panier=Panier::findOrCreate();
        $panier->tickets=null;
        $panier->tickets_validated=null;
        $panier->price=0.0;
        $panier->save();
        return redirect()->action([PanierController::class,'show'])->withMessage("Votre panier a été vidé");

    }

}
