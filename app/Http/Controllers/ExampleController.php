<?php

namespace App\Http\Controllers;

use App\Mail\MailgunEmail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    public function test(){
        dd(Student::find(1), Student::find(1)->phone);
    }

    public function testdb(){
        dd(DB::table('students')
        ->join('phones', 'phones.id', '=', 'students.phone_id')
        ->where('students.id', '=', 1)
        ->first());
    }

    public function contactus(){
        session()->put('test', 'First Laravel session');
        return view('contactus');
    }

    public function sendmsg(Request $request){
       $data =$request->except('_token');
      Mail::to($request->input('email'))->send(new MailgunEmail($data));
        return view('mail.mail',compact('data'));
    }
    
}
