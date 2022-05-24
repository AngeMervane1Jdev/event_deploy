<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use App\Models\TypeTiket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    function new($id){
        $types=TypeTiket::all();
       return view("ticket/new",compact("types", "id"));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index($id){

        $tickets=Tiket::all()->where('event_id',"=",$id);
        return view('ticket/index',compact("tickets","id"));

    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */

    function edit($id){
        $types=TypeTiket::all();
        $ticket=Tiket::findOrFail($id);
        return view('ticket/edit',compact("ticket","types"));
    }

    function update(Request $request){
        $ticket=Tiket::findOrFail($request['id']);

        $validate=$request->validate([
        "price"=>"required|integer"
        ]);
       if(!$validate){
        return redirect()->back();
       }
        $ticket->update($request->all());
          return redirect()->action('\App\Http\Controllers\TicketsController@index',["id"=>$ticket->event_id]);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    function show($id){ 

        $ticket=Tiket::findOrFail($id);
        $type=TypeTiket::findOrFail($ticket->type_id)->type_name;
        return view('ticket/show',compact("ticket",'type'));

    }

    function create(Request $request){
    
       $validate=$request->validate([
           "price"=>"required|integer"
       ]);
       if(!$validate){
        return redirect()->back();
       }     
       $ticket=Tiket::create($request->all());
       
       return redirect()->action('\App\Http\Controllers\EventsController@show',["id"=>$ticket->event_id]);
    }


    function delete($id){
        $event=Event::findOrFail(Tiket::findOrFail($id)->event_id);
        Tiket::destroy($id);
        return redirect()->action('\App\Http\Controllers\TicketsController@index',[$event]);
    }
}
