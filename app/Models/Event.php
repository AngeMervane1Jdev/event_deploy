<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'tag',
        'agence_id',
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

}
