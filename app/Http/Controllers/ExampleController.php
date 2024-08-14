<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    
}
