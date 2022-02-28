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
        'categories',
        'description',
        'banner',
        'agence_name',
        'logo',
    ];
    /**
     * Set the categories
     *
     */
    public function setCategoriesAttribute($value)
    {
        $this->attributes['categories'] = json_encode($value);
    }

   /**
     * Get the categories
     *
     */
    public function getCategoriesAttribute($value)
    {
        return $this->attributes['categories'] = json_decode($value);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
