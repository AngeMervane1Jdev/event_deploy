<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable=[
        "user_id",
        "rates"
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
