<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portemonnaie extends Model
{
    use HasFactory;
    protected $fillable=['id_client','total_buy_price','waiting_price','total_account','username','card_number','cvv','type','description','expiration','id_tickets'];
}
