<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('category')->get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =Category::select('id','categoryName')->get();
        return view('add_car',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'carTitle' =>'required|string',
            'description' =>'required|string|max:1000',
            'price'=>'required|decimal:2',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category_id' =>'required',
        ]);
        $data['image']=$this->uploadFile($request->image, 'assets/images');
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
        $car = Car::with('category')->findOrFail($id);
        //dd($car->category->categoryName);
        return view('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories =Category::select('id','categoryName')->get();
        $car = Car::findOrFail($id);
        return view('edit_car', compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->validate([
            'carTitle' =>'required|string',
            'description' =>'required|string|max:1000',
            'price'=>'required|decimal:2',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category_id' =>'required|exists:categories,id'
          ]);
          
          if($request->hasFile('image')){
            $data['image']=$this->uploadFile($request->image, 'assets/images');
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
