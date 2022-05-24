<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Agence;
use App\Models\Commande;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


    public function update(Request $request,$id){
      $file1=null;
      $file2=null;
      $user=User::find($id);
      $agenceId=$user->agence_id;
      $agence=Agence::find($agenceId);

      if($user->typeuser->id==3){
          $validate=$request->validate([
              'pseudo' => ['required' ,'string', 'max:255'],
              'email' => [ 'required' ,'string', 'email', 'max:255',
                          Rule::unique('users')->where(fn ($query) => $query->where('email','!=',$user->email)),
                          ],
              'contact' => ['required', 'string', 'min:8'],
              // 'profil_image'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
          ]);

          if(isset($request->profil_image)){
              $file1 = time().'.'.$request->profil_image->extension();
              $request["profil_image"]->move(public_path('profils'), $file1);
             }

          $userupdate=User::whereId($id)->update([
              'pseudo'=> $request['pseudo'],
              "profil_image"=>$file1,
              'email' => $request['email'],
              "contact"=>$request['contact'],
          ]);

      }else{
          $validate=$request->validate([
              'pseudo' => ['required' ,'string', 'max:255'],
              'email' => [ 'required' ,'string', 'email', 'max:255',
                          Rule::unique('users')->where(fn ($query) => $query->where('email','!=',$user->email)),
                          ],
              'contact' => ['required', 'string', 'min:8'],
              // 'profil_image'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
              'agence_name'=>["string","max:255"],
              "description"=>['string','max:255'],
              // 'logo'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
          ]); 


          if(isset($request->logo)){
              $file2 = time().'.'.$request->logo->extension();
              $request['logo']->move(public_path('logos'), $file2);
          }

          if(isset($request->profil_image)){
              $file1 = time().'.'.$request->profil_image->extension();
              $request["profil_image"]->move(public_path('profils'), $file1);
             }

          $userupdate=User::whereId($id)->update([
              'pseudo'=> $request['pseudo'],
              "profil_image"=>$file1,
              'email' => $request['email'],
              "contact"=>$request['contact'],
          ]);

          $agence=Agence::whereId($agenceId)->update([
              'agence_name'=>$request["agence_name"],
              "description"=>$request["description"],
          ]);

      }

      return redirect()->route('home');
  }

}
