<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
        'description',
        'adress',
        'banner',
        'agence_name',
        'logo',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
