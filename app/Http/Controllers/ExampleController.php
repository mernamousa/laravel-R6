<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function upload(){
        return view('upload');
    }

    public function uploadImage(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'asset/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }
}
