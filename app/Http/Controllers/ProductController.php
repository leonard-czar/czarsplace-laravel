<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function Insertproduct(Request $request){
        $validated=$request->validate([
            'watch_name'=>'required',
            'watch_price'=>'required|numeric',
            'watch_desc'=>'required',
            'watch_image'=>'required'
            // 'brandid'=>'required|numeric'
        ],[
            'watch_image.required'=>'please upload an image',
            'watch_desc.required'=>'please enter a description',
            'watch_price.required'=>'please set a price',
            'watch_price.numeric'=>'the watch price should be a number',
            'watch_name.required'=>'please enter a name'
            
            
        ],[
            'watch_desc'=>'description',
            'watch_price'=>'price'
            // 'brandid'=>'brand id'
            
        ]);

        $path=$request->file('watch_image')->store('Watchimages');

        $product= new Product();
        $product->watch_name=$request->input('watch_name');
        $product->watch_description=$request->input('watch_desc');
        $product->watch_price=$request->input('watch_price');
        $product->collection=$request->input('collection');
        $product->reference_number=$request->input('ref_no');
        $product->case_description=$request->input('Case_desc');
        $product->gender=$request->input('gender');
        $product->movement=$request->input('movement');
        $product->dial=$request->input('dial');
        $product->Bezel=$request->input('bezel');
        $product->crystal=$request->input('crystal');
        $product->caliber=$request->input('caliber');
        $product->watch_function=$request->input('watch_function');
        $product->mechanism=$request->input('mechanism');
        $product->number_of_jewels=$request->input('number_of_jewels');
        $product->total_diameter=$request->input('total_diameter');
        $product->power_reserve=$request->input('power_reserve');
        $product->number_of_parts=$request->input('number_of_parts');
        $product->frequency=$request->input('frequency');
        $product->bracelet=$request->input('bracelet');
        $product->clasp=$request->input('clasp');
        $product->water_resistance=$request->input('water_resistance');
        $product->brand_id=$request->input('brandid');
        $product->watch_image=$path;
        $product->save();
        return redirect('allproduct')->with('success','Product was added successfully!');

    }
    public function Getallproduct(){
        $products=Product::all();
        return view('allproducts')->with('products',$products);
    }
    public function Getproduct($id){
        $product=Product::find($id);
        return view('index_watchspec')->with('product',$product);
    }
    
    public function Getaproduct(){
        $products=Product::all() ;
        return view('index')->with('products',$products);
    }
    public function Get_allproduct(){
        $products=Product::all();
        return view('dashboard')->with('products',$products);
    }
    public function Get_product($id){
        $product=Product::find($id);
        return view('watchspec')->with('product',$product);
    }
    public function GetProductToEdit($id){
        $product=Product::find($id);
        return view('editproduct')->with('product',$product);
    }
    
    public function EditProduct(Request $request, $id){
       $request->validate([
        'watch_price'=>'numeric'
       ]);
        $product=Product::find($id);
        $product->watch_name=$request->input('watch_name');
        $product->watch_description=$request->input('watch_desc');
        $product->watch_price=$request->input('watch_price');
        $product->collection=$request->input('collection');
        $product->reference_number=$request->input('ref_no');
        $product->case_description=$request->input('Case_desc');
        $product->gender=$request->input('gender');
        $product->movement=$request->input('movement');
        $product->dial=$request->input('dial');
        $product->Bezel=$request->input('bezel');
        $product->crystal=$request->input('crystal');
        $product->caliber=$request->input('caliber');
        $product->watch_function=$request->input('watch_function');
        $product->mechanism=$request->input('mechanism');
        $product->number_of_jewels=$request->input('number_of_jewels');
        $product->total_diameter=$request->input('total_diameter');
        $product->power_reserve=$request->input('power_reserve');
        $product->number_of_parts=$request->input('number_of_parts');
        $product->frequency=$request->input('frequency');
        $product->bracelet=$request->input('bracelet');
        $product->clasp=$request->input('clasp');
        $product->water_resistance=$request->input('water_resistance');
        if ($request->hasFile('watch_image')) {
           $path=$request->file('watch_image')->store('Watchimages');
           $product->watch_image=$path;
        }
        $product->save();
        return redirect('allproduct')->with('success','Product was updated successfully!');
    }

    public function DeleteProduct($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->action([ProductController::class,'Getallproduct']);
    }
}
