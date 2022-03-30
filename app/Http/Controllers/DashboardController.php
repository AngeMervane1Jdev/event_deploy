<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public $modelTransactions=null;

    public function __construct(){
        $this->modelTransactions=new Transaction;
    }

    function client(){
      $transactions=Transaction::all()->where("client_id","=",Auth::user()->id);
      return view("/client/dashboard",compact('transactions'));
    }

    function organizer_promotor($id=null){
      $events=Event::all()->where("user_id",'=',Auth::user()->id)->sortByDesc("created_at");
      if($id!=null){
        $commandes=$this->modelTransactions->achat_transaction($id);
        return view("/transaction/show",compact('commandes'));
      }
      return view('/dashoard_organizer_promotor/dashboard',compact("events"));
    }


    // function organizer(){
    //   $promotors=User::all()->where('agence_id',"=",Auth::user()->agence_id)->where("id","!=",Auth::user()->id);
    //   $events=Event::all()->where("user_id",'=',Auth::user()->id)->sortByDesc("created_at");
    //   return view('/dashoard_organizer_promotor/dashboard',compact("events")); 
    // }

    protected function validator($data)
    {
      return Validator::make($data, [
        'name' => ['required' ,'string', 'max:255'],
        'email' => [ 'required' ,'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required' , 'string', 'min:8', 'confirmed'],
        'contact' => ['required', 'string', 'min:8'],
        'profil_image'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
    ]);
    }

    function store_promotor(Request $request){
      $this->validator($request->all())->validate();
       $data=$request->all();
      $file1=null;
      if(array_key_exists("profil_image",$data)){
        $imageName = time().'.'.$data["profil_image"]->extension();  
        $file1=$data["profil_image"]->move(public_path('images'), $imageName); 
       }
        //return view('<h1>'.$type_user_id.'</h1>');
         User::create([
             'name' => $data['name'],
             "profil_image"=>$file1,
             'email' => $data['email'],
             "contact"=>$data['contact'],

             'password' => Hash::make($data['password']),
             "agence_id"=>Auth::user()->agence_id,
             'type_user_id'=>2, 
         ]);
         return redirect()->action([DashboardController::class,'organizer']);
    }

}
