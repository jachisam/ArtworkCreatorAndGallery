<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // create new function for show uploaded page
    public function showfileupload(Request $request){
      $file = $request -> file('image');
      // show the file name
      //echo 'File Name : '.
      $file->getClientOriginalName();
      //echo '<br>';

      // show file extensions
      //echo 'File Extensions : '.
      $file->getClientOriginalExtension();
      //echo '<br>';

      // show file path
      //echo 'File Path : '.
      $file->getRealPath();
      //echo '<br>';

      // show file size
      //echo 'File Size : '.
      $file->getSize();
      //echo '<br>';

      // show file mime type
      ////echo 'File Mime Type : '.
      $file->getMimeType();
      // '<br>';

      // move uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      echo"<h1>File Upload was successful!</h1><a href='/home'>Back to Home</a>";
    }
}
