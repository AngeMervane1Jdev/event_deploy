<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RateProfil extends Model
{
    protected  $fillable=[
        'rate',
        "user_id",
        "profil_id"
    ];
    use HasFactory;

    static function findOrCreate($user,$profil,$value) {
        $obj = static::where("user_id","=",$user->id)->first();
        $older=0;
        if($obj){
             $older=$obj->rate;
             $obj->update(['rate'=>$value]);
            $obj->save();
        }else{
           $obj= static::create(["user_id"=>$user->id,"profil_id"=>$profil->id,"rate"=>$value]);
           $older=$obj->rate;
        }
        return $older;
    }
}
