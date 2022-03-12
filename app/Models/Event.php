<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Event extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'event_name',
        'event_description',
        'zone',
        'status',
        'start_time',
        'end_time',
        'cover',
        'user_id',
        'tikets',
        'publish_date',
        'cats',
        'logo',
    ];
    public function tickets(){
        return $this->hasMany(Tiket::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function images()
    {
        return $this->hasOne(Image::class);
    }
 

    public function search($qword){
        /*$events=Event::query()
        ->where('event_name','like',"%{$qword}%")
        ->where('status',"=",1)
        ->where("end_time",">",now())
        ->orWhere('event_description','like',"%{$qword}%")
        ->orWhere('zone','like',"%{$qword}%")
        ->get();*/
        $encode_qword=json_encode($qword);
        $events=DB::table("events")
        ->join('users', 'users.id', '=', 'events.user_id')
        ->where('users.name','like',"%{$qword}%")
    
        ->orWhere('event_name','like',"%{$qword}%")
        ->orWhere('event_description','like',"%{$qword}%")
        ->orWhere('zone','like',"%{$qword}%")
        ->orWhere('cats','like',"%{$encode_qword}%")
        ->select("*")
        ->get();
        return $events;
    }
}
