<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\RateProfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateProfilController extends Controller
{
    public function rate()
    {
        $profil_id=intVal($_GET["profil_id"]);
        $value=intVal($_GET["rate"]);

        $profil=Profil::all()->where("user_id","=",$profil_id)->first();
        $user = Auth::user();
        
        // Is user profil owner ?
        if($this->isOwner($user, $profil)) {
            return response()->json(['status' => 'no']);
        }
        // Rating

        $rate=RateProfil::findOrCreate($user,$profil, $value);

        $vues=count(RateProfil::all()->where('profil_id',"=",$profil_id));
        
        $profil->rates=$value;
        $profil->save();

        return [
            'status' => 'ok',
            'id' => $profil->id,
            'value' => $profil->rates,
            'count' => $vues,
            'rate' => $rate
        ];
    }

    public function isOwner($user, $profil)
    {
        return $profil->user_id==$user->id;
    }


    public function clients()
    {
        $profils=Profil::all()->where("type_user","=",0);
        return view('/ratings/clients',compact("profils"));
    }
    
    public function organizers()
    {
        $profils=Profil::all()->where("type_user","=",1);
        return view('/ratings/promotor',compact("profils"));
    }
}
