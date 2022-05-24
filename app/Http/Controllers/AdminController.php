<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Agence;
use App\Models\Categorie;
use App\Models\TypeAgence;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public $modelUser=null;

    public function __construct(){
         $this->middleware('auth');
         $this->modelUser=new User;
    }

    public function transactions($id)
    {

        $transactions=Transaction::all()->whereStrict("event_id",$id);
        return view("/admin/transactions",compact('transactions'));
    }

    public function home()
    {
        $users=count(User::all());
        $transactions=Transaction::all();
        $tickets=count(Tiket::all());
        $amount=0;
        foreach ($transactions as $value) {
         $amount=+$value->amount;   
        }
        $trs=count($transactions);
        return view('admin/home',compact('users','amount','trs','tickets'));
    }

    public function show() {
        $users=User::all();
        return view('admin.listOrganize',compact('users'));
        
    }


    public function showEvents($id=null){
        $events=Event::all();
        $commandes=[];
       
        if($id!=null){
            $commandes=$this->modelUser->all_transaction($id);
          }
        return view('admin.list_event',compact("events","commandes"));
    }


    public function delete($id){
        $events=Event::find($id);
        if(Auth::user()->id==$id){
            
            return redirect()->route('admin_listOrganize')->withMesage(" impossible de supprimer cet utilisateur ");
        }
        else{
            $user = User::find($id);
            $events=Event::all();
            foreach($events as $event){
                if($user->id==$event->user_id){
                    return redirect()->route('admin_listOrganize')->withMesage(" impossible de supprimer cet utilisateur ");
                }else{
                    $user->delete();
                    return redirect()->route('admin_listOrganize')->withMesage('user is successfully deleted');
                }
            }

        }

    }

    public function edit($id){
        $user=User::find($id);
        $agenceId=$user->agence_id;
        $agence=Agence::find($agenceId);
        $type_agence=TypeAgence::all();
        return view('admin.editUser',compact('user','type_agence','agence'));
    }

    public function update(Request $request,$id){
        $file1=null;
        $file2=null;
        $user=User::find($id);
        $agenceId=$user->agence_id;
        $agence=Agence::find($agenceId);

        if($user->typeuser->id==3){
            $validate=$request->validate([
                'name' => ['required' ,'string', 'max:255'],
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
                'name' => $request['name'],
                "profil_image"=>$file1,
                'email' => $request['email'],
                "contact"=>$request['contact'],
            ]);

        }else{
            $validate=$request->validate([
                'name' => ['required' ,'string', 'max:255'],
                'email' => [ 'required' ,'string', 'email', 'max:255',
                            Rule::unique('users')->where(fn ($query) => $query->where('email','!=',$user->email)),
                            ],
                'contact' => ['required', 'string', 'min:8'],
                // 'profil_image'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
                'agence_name'=>["string","max:255"],
                "description"=>['string','max:255'],
                "type"=>['required','string','max:255'],
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
                'name' => $request['name'],
                "profil_image"=>$file1,
                'email' => $request['email'],
                "contact"=>$request['contact'],
            ]);

            $agence=Agence::whereId($agenceId)->update([
                'agence_name'=>$request["agence_name"],
                "description"=>$request["description"],
                "logo"=>$file2,
                'type'=>$request['type']
            ]);

        }

        return redirect()->route('admin_listOrganize')->withMesage("Utilisateur mis à jour avec succés ");
    }



    function organizer_promotor($id=null){
        $events=Event::all()->where("user_id",'=',Auth::user()->id)->sortByDesc("created_at");
        if($id!=null){
          $commandes=$this->modelTransactions->achat_transaction($id);
          return view("/transaction/show",compact('commandes'));
        }
        return view('/dashoard_organizer_promotor/dashboard',compact("events"));
      }

}
