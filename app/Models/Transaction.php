<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=[
        "client_id",
        "ticket_id",
        "transref",
        "amount",
        "numero"
    ];


    public function search_transaction($search){
        $transref=DB::table('transactions')
        ->join('tikets','tikets.id','=','transactions.ticket_id')
        ->join('type_tikets','type_tikets.id','=','tikets.type_id')
        ->join('events','events.id','=','tikets.event_id')
        ->where('type_tikets.type_name','like','%'.$search.'%')
        ->orWhere('events.event_name','like','%'.$search.'%')
        ->orWhere('tikets.price','like','%'.$search.'%')
        ->select('tikets.*','type_tikets.*','events.event_name')
        ->get();

        return $transref;
    }
}
