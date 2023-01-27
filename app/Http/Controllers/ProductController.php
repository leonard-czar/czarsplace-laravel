<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Orders;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function insertProduct(Request $request)
    {
        $request->validate([
            'watch_name' => 'required',
            'watch_price' => 'required|numeric',
            'watch_desc' => 'required',
            'watch_image' => 'required'
            // 'brandid'=>'required|numeric'
        ], [
            'watch_image.required' => 'please upload an image',
            'watch_desc.required' => 'please enter a description',
            'watch_price.required' => 'please set a price',
            'watch_price.numeric' => 'the watch price should be a number',
            'watch_name.required' => 'please enter a name'


        ], [
            'watch_desc' => 'description',
            'watch_price' => 'price'
            // 'brandid'=>'brand id'

        ]);

        $path = $request->file('watch_image')->store('Watchimages');

        $product = new Product();
        $product->watch_name = $request->input('watch_name');
        $product->watch_description = $request->input('watch_desc');
        $product->watch_price = $request->input('watch_price');
        $product->collection = $request->input('collection');
        $product->reference_number = $request->input('ref_no');
        $product->case_description = $request->input('Case_desc');
        $product->gender = $request->input('gender');
        $product->movement = $request->input('movement');
        $product->dial = $request->input('dial');
        $product->Bezel = $request->input('bezel');
        $product->crystal = $request->input('crystal');
        $product->caliber = $request->input('caliber');
        $product->watch_function = $request->input('watch_function');
        $product->mechanism = $request->input('mechanism');
        $product->number_of_jewels = $request->input('number_of_jewels');
        $product->total_diameter = $request->input('total_diameter');
        $product->power_reserve = $request->input('power_reserve');
        $product->number_of_parts = $request->input('number_of_parts');
        $product->frequency = $request->input('frequency');
        $product->bracelet = $request->input('bracelet');
        $product->clasp = $request->input('clasp');
        $product->water_resistance = $request->input('water_resistance');
        $product->brand_id = $request->input('brandid');
        $product->watch_image = $path;
        $product->save();
        return redirect('allproduct')->with('success', 'Product was added successfully!');
    }
    public function getAllProduct()
    {
        $products = Product::all();
        return view('allproducts')->with('products', $products);
    }

    public function displayIndexAudemars()
    {
        $products = Product::where('brand_id', 3)->get();
        $brand = Brand::find(3);
        return view('index_audemars', [
            'products' => $products,
            'brand' => $brand
        ]);
    }

    public function displayAudemars()
    {
        $products = Product::where('brand_id', 3)->get();
        $brand = Brand::find(3);
        return view('audemars', [
            'products' => $products,
            'brand' => $brand
        ]);
    }

    public function displayIndexRolex()
    {
        $products = Product::where('brand_id', 2)->get();
        $brand = Brand::find(2);
        return view('index_rolex', [
            'products' => $products,
            'brand' => $brand
        ]);
    }

    public function displayRolex()
    {
        $products = Product::where('brand_id', 2)->get();
        $brand = Brand::find(2);
        return view('rolex', [
            'products' => $products,
            'brand' => $brand
        ]);
    }
    public function displayIndexHublot()
    {
        $products = Product::where('brand_id', 1)->get();
        $brand = Brand::find(1);
        return view('index_hublot', [
            'products' => $products,
            'brand' => $brand
        ]);
    }
    public function displayHublot()
    {
        $products = Product::where('brand_id', 1)->get();
        $brand = Brand::find(1);
        return view('hublot', [
            'products' => $products,
            'brand' => $brand
        ]);
    }
    public function displayMaleWatch()
    {
        $male = Product::where('gender', 'male')->get();
        return view('malewatches')->with('male', $male);
    }

    public function displayIndexMaleWatch()
    {
        $male = Product::where('gender', 'male')->get();
        return view('index_malewatches')->with('male', $male);
    }

    public function displayFemaleWatch()
    {
        $female = Product::where('gender', 'female')->get();
        return view('femalewatches')->with('female', $female);
    }

    public function displayIndexFemaleWatch()
    {
        $female = Product::where('gender', 'female')->get();
        return view('index_femalewatches')->with('female', $female);
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        return view('index_watchspec', [
            'product' => $product
        ]);
    }

    public function index()
    {
        $brand = Brand::all();
        return view('index', [
            'brands' => $brand
        ]);
    }
    public function displayProducts()
    {

        $brand = Brand::all();
        return view('dashboard', [
            'brands' => $brand
        ]);
    }

    public function get_Product($id)
    {
        $product = Product::find($id);
        return view('watchspec')->with('product', $product);
    }
    public function getProductToEdit($id)
    {
        $product = Product::find($id);
        return view('editproduct')->with('product', $product);
    }

    public function editProduct(Request $request, $id)
    {
        $request->validate([
            'watch_price' => 'numeric'
        ]);
        $product = Product::find($id);
        $product->watch_name = $request->input('watch_name');
        $product->watch_description = $request->input('watch_desc');
        $product->watch_price = $request->input('watch_price');
        $product->collection = $request->input('collection');
        $product->reference_number = $request->input('ref_no');
        $product->case_description = $request->input('Case_desc');
        $product->gender = $request->input('gender');
        $product->movement = $request->input('movement');
        $product->dial = $request->input('dial');
        $product->Bezel = $request->input('bezel');
        $product->crystal = $request->input('crystal');
        $product->caliber = $request->input('caliber');
        $product->watch_function = $request->input('watch_function');
        $product->mechanism = $request->input('mechanism');
        $product->number_of_jewels = $request->input('number_of_jewels');
        $product->total_diameter = $request->input('total_diameter');
        $product->power_reserve = $request->input('power_reserve');
        $product->number_of_parts = $request->input('number_of_parts');
        $product->frequency = $request->input('frequency');
        $product->bracelet = $request->input('bracelet');
        $product->clasp = $request->input('clasp');
        $product->water_resistance = $request->input('water_resistance');
        if ($request->hasFile('watch_image')) {
            $path = $request->file('watch_image')->store('Watchimages');
            $product->watch_image = $path;
        }
        $product->save();
        return redirect('allproduct')->with('success', 'Product was updated successfully!');
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->action([ProductController::class, 'getAllProduct']);
    }

    public function indexRedirect(Request $request)
    {
        $search = trim(strtolower($request->input('isearchbox')));
        if ($search == 'rolex') {
            return redirect()->action([ProductController::class, 'displayIndexRolex']);
        }
        if ($search == 'audemars' || $search == 'audemars piguet') {
            return redirect()->action([ProductController::class, 'displayIndexAudemars']);
        }
        if ($search == 'hublot') {
            return redirect()->action([ProductController::class, 'displayIndexHublot']);
        }
        if ($search == 'male' || $search == 'men') {
            return redirect()->action([ProductController::class, 'displayIndexMaleWatch']);
        }
        if ($search == 'female' || $search == 'woman' || $search == 'women' || $search == 'ladies') {
            return redirect()->action([ProductController::class, 'displayIndexFemaleWatch']);
        } else {
            return back()->with('failed', 'Invalid search please try again!');
        }
    }

    public function redirect(Request $request)
    {
        $search = trim(strtolower(trim($request->input('searchbox'))));
        if ($search == 'rolex') {
            return redirect()->action([ProductController::class, 'displayRolex']);
        }
        if ($search == 'audemars' || $search == 'audemars piguet') {
            return redirect()->action([ProductController::class, 'displayAudemars']);
        }
        if ($search == 'hublot') {
            return redirect()->action([ProductController::class, 'displayHublot']);
        }
        if ($search == 'male' || $search == 'men') {
            return redirect()->action([ProductController::class, 'displayMaleWatch']);
        }
        if ($search == 'female' || $search == 'woman' || $search == 'women' || $search == 'ladies') {
            return redirect()->action([ProductController::class, 'displayFemaleWatch']);
        } else {
            return back()->with('failed', 'Invalid search please try again!');
        }
    }
}
