<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        "type_id",
        "event_id"
    ];
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
