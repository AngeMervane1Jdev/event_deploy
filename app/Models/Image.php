<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'name',
        'image_path'
    ];

    public static function findOrCreate($event_id)
    {
        
        $obj = static::where("user_id","=",Auth::user()->id)->first();
        return $obj ?: static::create(['event_id'=>$event_id,"image_path"=>""]);
    }
    public function event(){
        return $this->belongsTo(Event::class,'event_id');
    }
}
