<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fashion;
use App\Traits\Common;

class FashionController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */

    public function index(){
        /* $products = Fashion::orderBy('created_at', 'desc')
        ->take(3)
        ->get(); */
        //$products =Fashion::orderBy('id', 'desc')->take(3)->get();
        $products =Fashion::latest()->take(3)->get();
        return view('index', compact('products'));
    }

    public function about(){
        return view('about');
    }

    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $data =$request->validate([
            'productName' =>'required|string',
            'description' =>'required|string|max:1000',
            'price'=>'required|decimal:2',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        $data['image']=$this->uploadFile($request->image, 'asset/images');
        $data['published']=$request->has('published');
        
        Fashion::create($data);
        return 'data inserted successfuly';  

          //dd($data);

    }

    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        $products = Fashion::get();
        return view('products', compact('products'));
    }
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Fashion::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->validate([
            'productName' =>'required|string',
            'description' =>'required|string|max:1000',
            'price'=>'required|decimal:2',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        if($request->hasFile('image')){
            $data['image']=$this->uploadFile($request->image, 'asset/images/products');
          }
          $data['published']=$request->has('published');
    
          Fashion::where('id',$id)->update($data);
    
         return redirect()->route('fashion.showAll');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
