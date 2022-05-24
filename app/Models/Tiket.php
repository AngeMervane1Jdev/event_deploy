<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
