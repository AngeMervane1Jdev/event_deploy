<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
use App\Models\Portemonnaie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    function new(){
        $categories=Categorie::all();
        return view('event/new',compact("categories"));
    }
      /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'event_name' => ['required' ,'string', 'max:255'],
            'event_description' => [ 'required' ,'string', 'max:255',],
            'zone' => ['required' , 'string'],
            'start_time' => 'required|date_format:"Y-m-d\TH:i"|after:today',
            'end_time'=>'required|date_format:"Y-m-d\TH:i"|after:start_time'


     ]);
    }

    /*************************************************** */

    function publish($id){

        $event=Event::findOrFail($id);
        $event->status=1;
        $event->publish_date= now();
        $event->save();
        return redirect()->back();
    }

    /*************************************************** */

    function edit($id){
        $categories=Categorie::all();

        $event=Event::findOrFail($id);
        $cats=json_decode($event->cats);
        $tags=$event->tag;
        return view('event/edit',compact('event','categories',"tags","cats"));

    }
    /*************************************************** */

    function update(Request $request){
       $event=Event::findOrFail($request['id']);
        $this->validator($request->all())->validate();
        $tags = explode(",", $request->tags);
        $request['tag']=$tags;
        $event->update($request->all());
       return redirect()->route("show_event",compact($event));
    }

    /*************************************************** */


    function delete($id){
     Event::destroy($id);
     return redirect()->action([HomeController::class,'index']);

    }

    /*************************************************** */

    function index() {
        $events=Event::all();
        return redirect()->action([HomeController::class,'index']);
    }

    //*************************************************** */


    function show($id)
    {
        $event=Event::findOrFail($id);
        $tickets=$event->tickets;
        $buy_ids=[];
        $table=[];
        if(Auth::user()!=null and Auth::user()->type_user_id==3){
            $ptm=Portemonnaie::where('id_client','=',Auth::user()->id)->first();

            if($ptm!=$buy_ids){
                $buy_ids=explode(" ",($ptm->first())->id_tickets);
            }
            return view('event/show',compact("event","tickets","buy_ids"));
        }
        return view('event/show',compact("event","tickets"));

    }


    /*************************************************** */
    function create(Request $request){

        $this->validator($request->all())->validate();
        $tags = explode(",", $request->tags);
        $tags=$request->tags;
        $event=new Event($request->all());
        $event->cats=json_encode($request['cats']);
        $event->agence_id=Auth::user()->agence_id;
        $event->user_id=Auth::user()->id;
        $event->tag=$tags;
        $event->status=0;
        $event->save();

     return redirect()->route("show_event",[$event]);

    }

    function search(Request $request){
        $search_event=$request->q;
        $events=[];
        if(strlen($search_event)>2){
            $events=Event::query()
            ->where('event_name','like',"%{$search_event}%")
            ->orWhere('event_description','like',"%{$search_event}%")
            ->orWhere('zone','like',"%{$search_event}%")
            ->get();
        }

        return view("events",compact("events"));

    }
}
