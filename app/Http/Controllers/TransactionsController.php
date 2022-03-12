<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public $modelTransactions=null;
    public function __construct(){
        $this->modelTransactions=new Transaction;
    }

    public function search_transaction(Request $request){
       $value= $request->get('searchQword');
        $transa=$this->modelTransactions->search_transaction($value);
        //$transa=Transaction::where('amount','like','%'.$value.'%')->get();
        return json_decode($transa);
    }
}
