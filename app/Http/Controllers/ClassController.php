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
        $classes = ClassModel::get();
        return view('classes', compact('classes'));
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
        $data =[
            'className' => $request->className,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'timeFrom'=> $request->timeFrom ,
            'timeTo'=> $request->timeTo ,
            'isFulled'=> $request->has('isFulled'),
         ];

        ClassModel::create($data);
        return redirect()->route('class.index'); 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = ClassModel::findOrFail($id);
        return view('class_details', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = ClassModel::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =[
            'className' => $request->className,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'timeFrom'=> $request->timeFrom ,
            'timeTo'=> $request->timeTo ,
            'isFulled'=> $request->has('isFulled'),
  
         ];
    
         ClassModel::where('id',$id)->update($data);
    
         return redirect()->route('class.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClassModel::where('id', $id)->delete();
        return redirect()->route('class.index');
    }

    public function showDeleted()
    {
        $classes = ClassModel::onlyTrashed()->get();
        return view('trashed_classes', compact('classes'));
    }

}
