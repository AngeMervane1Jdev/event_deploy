<?php

namespace App\Models;

use App\Models\Event;
use App\Models\TypeUser;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'profil_image',
        "agence_id",
        "type_user_id",
        "is_admin"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getCategoriesAttribute($value)
    {
        return $this->attributes['cats'] = json_decode($value);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function agence(){
        return $this->BelongsTo(Agence::class);
    }

    public function panier()
    {
        return $this->hasOne(Panier::class);
    }

    public function typeuser(){
        return $this->belongsTo(TypeUser::class,'type_user_id');
    }
 
}
