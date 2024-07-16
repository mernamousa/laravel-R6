<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $name=$request->name;
        $email=$request->email;
        $subject=$request->subject;
        $message=$request->message;
        $formData = $name ." ".$email ." ".$subject ." ".$message;

         return view('data', compact('formData'));
     

}




}
