<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FileUploadController extends Controller
{

  public function createForm($id){
    return view('event/add_images',compact('id'));
  }


    public function fileUpload(Request $req){
        $oldImage=Image::all()->where("event_id","=",$req["event_id"])->first();


        $req->validate([
          'imageFile' => 'required',
          'imageFile.*' => 'mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        
        if($req->hasfile('imageFile')) {
            if($oldImage==null and count($req->file('imageFile'))>3){
              return  redirect()->back()->withMessage("Trois images au plus pour un evènement.");
                
            }
            else if($oldImage!=null and (count(json_decode($oldImage->name))+count($req->file('imageFile')))>3){
              return  redirect()->back()->withMessage("Trois images au plus pour un evènement. Nombre d'images déjà enrégistrées :".count(json_decode($oldImage->name)));
            }
            else{
              foreach($req->file('imageFile') as $file)
              {
                  $name = $file->getClientOriginalName();
                  $file->move(public_path().'/Upload/events/Images', $name);  
                  $imgData[] = $name;  
              }
              $oldImage==null?$fileModal = new Image():$fileModal=$oldImage;
              $fileModal->name = json_encode($imgData);
              $fileModal->image_path = json_encode($imgData);
              $fileModal->event_id=$req['event_id'];
              
             
              $fileModal->save();
              return redirect()->action('\App\Http\Controllers\EventsController@show',["id"=>$req['event_id']])->withMessag('Images ajoutées avec succes');
            }
           
        }
      }
}
