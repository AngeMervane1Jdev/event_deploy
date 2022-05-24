<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Categorie;
use App\Models\TypeUser;
use App\Models\Agence;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\RegisterMail;
use App\Models\Panier;
use App\Models\TypeAgence;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class RegisterController extends Controller
{



    use RegistersUsers;


    public function showRegistrationForm()
    {
        $types_agences=TypeAgence::all();
        $types=TypeUser::all();
        return view('auth.register',compact('types_agences','types'));
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
                'name' => ['required' ,'string', 'max:255'],
                'email' => [ 'required' ,'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required' , 'string', 'min:8', 'confirmed'],
                'type' => [],
                'contact' => ['required', 'string', 'min:8'],
                'profil_image'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
                'type'=>["required",'integer'],


         ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */




    private $agence_informations=["agence_name","description","banner","logo","categories"];


    protected function create(array $data)
    {

        $file1=null;
        $file2=null;
        $file3=null;
        $agence=null;
        $type_user_id=intval($data["type"]);


        if($type_user_id==1){  
            
            // 
            // si il s'agit d'un organisateur on crée une agence

            // quand les champ destinés à la création d'une agence sont vides
            if($data["agence_name"]==$data["description"] and !array_key_exists("logo",$data) and !array_key_exists("banner",$data) and $data["description"]==null){
                $type_user_id=2;
            }
            // sinon
            else{

                $valid=Validator::make($data, [
                    'agence_name'=>["string","max:255"],
                    "description"=>['string','max:255'],
                    'logo'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
                    'banner'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288'
                ]);
                if(array_key_exists("logo",$data)){
                    $file2 = time().'.'.$data["logo"]->extension();
                    $data["logo"]->move(public_path('logos'), $file2);
                }

                if(array_key_exists("banner",$data)){
                    $file3 = time().'.'.$data["banner"]->extension();
                    $data["banner"]->move(public_path('banners'), $file3);
                }

                $agence=Agence::create([
                    'agence_name'=>$data["agence_name"],
                    "description"=>$data["description"],
                    "logo"=>$file2,
                    "banner"=>$file3,
                    'type'=>$data['type']
                ]);
                $agence=$agence->id;
           }


        }


       if(array_key_exists("profil_image",$data)){
        $file1 = time().'.'.$data["profil_image"]->extension();
        $data["profil_image"]->move(public_path('profils'), $file1);
       }

       /************************ mail ********************* */
        //  $datareg=([
        //         'name'=>$data['name'],
        //  ]);


        //*   Mail::to($data['email'])->send(new RegisterMail($datareg));

         /**************************************************************** */


        //return view('<h1>'.$type_user_id.'</h1>');
         
         return User::create([
             'name' => $data['name'],
             "profil_image"=>$file1,
             'email' => $data['email'],
             "contact"=>$data['contact'],

             'password' => Hash::make($data['password']),
             "agence_id"=>$agence,
             'type_user_id'=>(int)$type_user_id,
         ]);

    }

}
