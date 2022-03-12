<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct(){

    }

    public function show() {
        $users=User::all()->where('is_admin','!=',1);
        $events=Event::all();
        $transa=Transaction::all();

        return view('admin.listOrganize',compact('users'));
        
    }

    public function showEvents(){
        $events=Event::all();
        $cats=Categorie::all();
        return view('admin.listEvent',compact("events",'cats'));
    }
}
