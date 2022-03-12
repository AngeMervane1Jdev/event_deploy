<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortemonnaieController extends Controller
{


    function new($id,$price){
        $is_panier=0;
       return view('/portemonnaie/new',compact("id","is_panier"));
    }


    // public function create(Request $request)
    // {    
        
    //     $id_client=Auth::user()->id;
    //     $total_buy_price=0;
    //     $waiting_price=0;
    //     $validate=$request->validate([
    //         "username"=>"required",
    //         "card_number"=>"required",
    //         "mm"=>"required|numeric",
    //         "yy"=>"required|numeric",
    //         "cvv"=>"required",
    //     ]);
    //   if (!$validate) {
    //     return back()->withErrors($validate)->withInput();
    //   }
    //   $ptm=new Portemonnaie($request->all());
    //   $ptm->total_buy_price=$total_buy_price;
    //   $ptm->username=$request->username;
    //   $ptm->card_number=$request->card_number;
    //   $ptm->cvv=$request->cvv;
    //   $ptm->waiting_price=$waiting_price;
    //   $ptm->expiration=$request->mm."/".$request->yy;
    //   $ptm->total_account=100000;
    //   $ptm->id_client=$id_client;
    //  $ptm->save();
    //  return redirect()->back()->with('success',"You can start bying now");
    // }




    // public function edit($id)
    // {
    //     $ptm=Portemonnaie::findOrFail($id);
    //     return view('/portemonnaie/edit',compact("ptm"));
    // }



    // public function update(Request $request)
    // {
    //     $request->validate([
    //         "username"=>"required",
    //         "card_number"=>"required",
    //         "mm"=>"required|numeric",
    //         "yy"=>"required|numeric",
    //         "cvv"=>"required",
    //     ]);
    //    $ptm=Portemonnaie::findOrFail($request['id']);
    //    $ptm->update([
    //        "username"=>$request->username,
    //        "card_number"=>$request->card_number,
    //        "expiration"=>$request->mm."/".$request->yy,
    //        "cvv"=>$request->cvv
    //    ]);
    //    return redirect()->back()->with("success","you modification has been update now");
    // }
}
