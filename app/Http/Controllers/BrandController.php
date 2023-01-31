<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    //
    public function insertBrand(Request $request)
    {
        //validate using inbluit function validate()
        $validated = $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required'
        ]);
        // save images in Watchimages
        $path = $request->file('brand_image')->store('Watchimages');
        //make instance of Brand class
        $brand = new Brand();
        // pass the inputs from your UI
        $brand->brandname = $request->input('brand_name');
        $brand->brandimg = $path;
        // Send to DB using inbuilt function save()
        $brand->save();
        // return redirect('/');
        return redirect('allbrands')->with('success', 'Brand was added successfully!');
    }

    public function viewIt()
    {
        $brands = Brand::all();
        return view('allbrands')->with('brands', $brands);
    }

    public function viewBrand()
    {
        $brands = Brand::all();
        return view('addproduct')->with('brands', $brands);
    }

    public function showIndexBrands()
    {
        $brands = Brand::all();
        return view('index_displaybrands')->with('brands', $brands);
    }

    public function showBrands()
    {
        $brands = Brand::all();
        return view('displaybrands')->with('brands', $brands);
    }
    public function showBrandToAudemars()
    {
        $brands = DB::table('brands')->where('id', 3)->get();
        return view('index_audemars')->with('brands', $brands);
    }
    public function getBrandToEdit($id)
    {
        $brand = Brand::find($id);
        return view('editbrand')->with('brand', $brand);
    }
    public function editBrand(Request $request, $id)
    {
        $request->validate([
            'brandname' => 'required'
        ]);
        $brand = Brand::find($id);
        $brand->brandname = $request->input('brandname');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('Watchimages');
            $brand->brandimg = $path;
        }
        $brand->save();
        return redirect('allbrands')->with('success', 'Brand was updated successfully!');
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->action([BrandController::class, 'ViewIt']);
    }
}
