<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Panier extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "tickets",
        "price",
        "tickets_validated"
    ];

    // Put this in any model and use
    // Modelname::findOrCreate($id);
    public static function findOrCreate()
    {
        $obj = static::where("user_id","=",Auth::user()->id)->first();
        return $obj ?: static::create(['tickets'=>null,"user_id"=>Auth::user()->id,"price"=>0,"tickets_validated"=>null]);
    }
}
