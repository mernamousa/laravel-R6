<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Traits\Common;

class ClassController extends Controller
{
    use Common;
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
        $data =$request->validate([
            'className' =>'required|string|max:255',
            'capacity' =>'required|numeric',
            'price' =>'required|decimal:2',
            'timeFrom' =>'required',
            'timeTo'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'

          ]);
         
        $data['image']=$this->uploadFile($request->image, 'assets/images');
          $data['isFulled']=$request->has('isFulled');

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
        $data =$request->validate([
            'className' =>'required|string|max:255',
            'capacity' =>'required|numeric',
            'price' =>'required|decimal:2',
            'timeFrom' =>'required',
            'timeTo'=>'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif'
          ]);
          if($request->hasFile('image')){
            $data['image']=$this->uploadFile($request->image, 'assets/images');
          }
          $data['isFulled']=$request->has('isFulled');
    
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
    public function destroyForm(string $id)
    {
        ClassModel::where('id', $id)->delete();
        return redirect()->route('class.index');
    }

    public function restore(string $id)
    {
        ClassModel::where('id', $id)->restore();
        return redirect()->route('class.index');
    }

    public function forceDelete(string $id)
    {
        ClassModel::where('id', $id)->forceDelete();
        return redirect()->route('class.showDeleted');
    }

}
