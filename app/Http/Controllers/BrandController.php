<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private function brandsForView(string $viewName)
    {
        $brands = Brand::orderBy('brandname')->get();

        return view($viewName, ['brands' => $brands]);
    }

    public function insertBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ]);
        $path = $request->file('brand_image')->store('Watchimages', 'public');
        $brand = new Brand;
        $brand->brandname = $request->input('brand_name');
        $brand->brandimg = $path;
        $brand->save();

        return redirect('allbrands')->with('success', 'Brand was added successfully!');
    }

    public function viewIt()
    {
        return $this->brandsForView('allbrands');
    }

    public function viewBrand()
    {
        return $this->brandsForView('addproduct');
    }

    public function showBrands()
    {
        return $this->brandsForView('displaybrands');
    }

    public function getBrandToEdit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('editbrand')->with('brand', $brand);
    }

    public function editBrand(Request $request, $id)
    {
        $request->validate([
            'brandname' => 'required',
        ]);
        $brand = Brand::findOrFail($id);
        $brand->brandname = $request->input('brandname');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('Watchimages', 'public');
            $brand->brandimg = $path;
        }
        $brand->save();

        return redirect('allbrands')->with('success', 'Brand was updated successfully!');
    }

    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->action([BrandController::class, 'viewIt']);
    }
}
