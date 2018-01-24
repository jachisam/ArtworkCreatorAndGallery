<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class ImageController extends Controller
{
  public function profile(){
    return view('images', array('user' => Auth::user()));
  }
  public function update_image(Request $request){
    //Handle the user upload of the avatar
    if($request->hasfile('artwork')){
      $artwork = $request->file('artwork');
      $filename = time() . "." . $artwork->getClientOriginalExtension();
      Image::make($artwork)->resize(300,300)->save(public_path('/uploads/artwork/'.$filename));
      $user = Auth::user();
      $user->artwork = $filename;
      $user->save();
    }
    return view('images', array('user' => Auth::user()));
  }
}
