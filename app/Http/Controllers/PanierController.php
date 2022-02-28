<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    function show(){
        $commnandes=Command::where("client_id","=",Auth::user()->id)->get()->all();
        return view("",compact('commandes'));
    }

    function ValidatePanier(){
        
    }
}
