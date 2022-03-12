<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
use App\Models\Portemonnaie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\EventMail;
use App\Models\Image;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{

    public $modelEvents=null;
    public function __construct(){
        $this->modelEvents=new Event;
    }

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
            'cover' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'start_time' => 'required|date_format:"Y-m-d\TH:i"|after:today',
            'end_time'=>'required|date_format:"Y-m-d\TH:i"|after:start_time'

     ]);

    }

    /**************************************************** */

    public function events()
    {
        $events=Event::all()->where('status',"=",1)->where("end_time",">",now());
        
        $cats=Categorie::all();
        return view('events',compact("events",'cats'));
    }


    /*************************************************** */

    function publish($id){

        $event=Event::findOrFail($id);
        $event->status=1;
        $event->publish_date= now();
        $event->save();
        return redirect()->back()->withMessage("Evènement plublié");
    }

    /*************************************************** */

    function edit($id){
        $categories=Categorie::all();

        $event=Event::findOrFail($id);
        $cats=json_decode($event->cats);
       
        return view('event/edit',compact('event','categories',"cats"));

    }
    /*************************************************** */

    function update(Request $request){
       $event=Event::findOrFail($request['id']);
        $this->validator($request->all())->validate();
       
        $event->update($request->all());
       return redirect()->route("show_event",compact($event))->withMesage('Evènement mis à jour');
    }

    /*************************************************** */


    function delete($id){
     Event::destroy($id);
     return redirect()->action([HomeController::class,'index']);

    }

    /*************************************************** */

    function index() {
        return redirect()->action([HomeController::class,'index']);
    }

    //*************************************************** */


    function show($id)
    {
        $event=Event::findOrFail($id);
        $images=Image::where('event_id',"=",$id)->first();
        
        $images? $images=json_decode($images->name):$images=[];
        $tickets=$event->tickets;
        return view('event/show',compact("event","tickets","images"));

    }


    /*************************************************** */
    function create(Request $request){

        $this->validator($request->all())->validate();

        $file=$request["cover"];
        $name = $file->getClientOriginalName();
        $file->move(public_path().'/Upload/events/Covers', $name);

        $event=new Event($request->all());
        $event->cats=json_encode($request['categories']);
        $event->user_id=Auth::user()->id;
        $event->cover=$name;
        $event->status=0;
        $event->save();


        $datamail=[

            'event_name'=>$request->event_name,
            'event_description'=>$request->event_description,
            'zone'=>$request->zone,
            'status'=>$request->status,
            'cats'=>$request->cats,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ];

        // Mail::to(Auth::user()->email)->send(new EventMail($datamail));


     return redirect()->route("show_event",[$event])->withMessage('Evènement crée avec succès');

    }

    // ->where('status',"=",1)
    // ->where("end_time",">",now())

    function search(Request $request){
        $qword=$request->q;
        $events=[];

        if(strlen($qword)>2){
          $events=$this->modelEvents->search($qword);
        }
        $cats=Categorie::all();

        return view("events",compact("events","cats"));

    }
}
