<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\TypeAgence;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct(){
         $this->middleware('auth');
    }

    public function show() {
        $users=User::all();
        $events=Event::all();
        $transa=Transaction::all();

        return view('admin.listOrganize',compact('users'));
        
    }


    public function showEvents(){
        $events=Event::all();
        $cats=TypeAgence::all();
        return view('admin.list_event',compact("events",'cats'));
    }


    public function edit($id){
        $user=User::find($id);
        $user->agence_id;
        $type_agence=TypeAgence::find($id);
        $typeAgence=TypeAgence::all();
        return view('admin.editUser',compact('user','typeAgence'));
    }

    public function delete($id){
        $events=Event::find($id);
        if(Auth::user()->id==$id){
            
            return redirect()->route('admin_listOrganize')->withMesage(" impossible de supprimer cet utilisateur ");
        }
        else{
            $user = User::find($id);
            $events=Event::all();
            foreach($events as $event){
                if($user->id==$event->user_id){
                    return redirect()->route('admin_listOrganize')->withMesage(" impossible de supprimer cet utilisateur ");
                }else{
                    $user->delete();
                    return redirect()->route('admin_listOrganize')->withMesage('user is successfully deleted');
                }
            }

        }

    }
}
