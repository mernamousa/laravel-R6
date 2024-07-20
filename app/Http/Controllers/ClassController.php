<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
       /* ClassModel::create([        
            'className'=>$request->className,
            'capacity'=>$request->capacity,
            'isFulled'=>$request->isFulled,
            'price'=>$request->price,
            'timeFrom'=>$request->timeFrom,
            'timeTo'=>$request->timeTo,     
            ]); */
        // ClassModel::create([$request->except('_token')]);
       // $timeFrom =date('H:i:s' , strtotime($request->timeFrom));
       // $timeTo =date('H:i:s' , strtotime($request->timeTo));
        //$isFulled=$request->isFulled;
       $className=$request->className;
        $capacity=$request->capacity;
        if(isset($request['isFulled'])){
            $isFulled =1;
        }else{
            $isFulled = 0;
        }
        $price =$request->price;
        $timeFrom =$request->timeFrom;
        $timeTo =$request->timeTo;
        ClassModel::create([
            'className'=>$className,
            'capacity'=>$capacity,
            'isFulled'=>$isFulled,
            'price'=>$price,
            'timeFrom'=>$timeFrom,
            'timeTo'=>$timeTo, 
       ]);  
            return "data inserted sucessfully"; 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
