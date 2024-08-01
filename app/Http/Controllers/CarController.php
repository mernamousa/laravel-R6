<?php

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'carTitle' =>'required|string',
            'description' =>'required|string|max:1000',
            'price'=>'required|decimal:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data['image'] = 'images/'.$imageName;
        $data['published']=$request->has('published');
        
        Car::create($data);
        return redirect()->route('cars.index'); 

          //dd($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->validate([
            'carTitle' =>'required|string',
            'description' =>'required|string|max:1000',
            'price'=>'required|decimal:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
          ]);
          if($request->image != ''){        
            $path = public_path().'/uploads/images/';
  
            //code for remove old file
            if($data['image'] != ''  && $data['image'] != null){
                 $file_old = $path.$data['image'];
                 unlink($file_old);
            }
  
            //upload new file
            $image = $request->image;
            $filename = $image->getClientOriginalName();
            $image->move($path, $filename);
       }

          $data['published']=$request->has('published');
    
            Car::where('id',$id)->update($data);
    
            return redirect()->route('cars.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect()->route('cars.index');
    }
    

    public function showDeleted()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashed_cars', compact('cars'));
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect()->route('cars.index');
    }

    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect()->route('cars.showDeleted');
    }

}
