<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin')->group(function () {

    Route::get('/editproduct/{id}', [App\Http\Controllers\ProductController::class, 'GetProductToEdit'])->name('productedit');

    Route::post('/updateproduct/{id}', [App\Http\Controllers\ProductController::class, 'EditProduct'])->name('updateproduct');

    Route::get('/editbrand/{id}', [App\Http\Controllers\BrandController::class, 'GetBrandToEdit'])->name('brandedit');

    Route::post('/updatebrand/{id}', [App\Http\Controllers\BrandController::class, 'EditBrand'])->name('updatebrand');

    Route::post('/deleteproduct/{id}', [App\Http\Controllers\ProductController::class, 'DeleteProduct'])->name('productdelete');

    Route::post('/deletebrand/{id}', [App\Http\Controllers\BrandController::class, 'DeleteBrand'])->name('branddelete');

    Route::get('/addproduct', [App\Http\Controllers\BrandController::class, 'ViewBrand'])->name('showbrand');

    Route::get('/allbrands', [App\Http\Controllers\BrandController::class, 'ViewIt'])->name('allbrands');

    Route::get('/allproduct', [App\Http\Controllers\ProductController::class, 'Getallproduct'])->name('allproduct');

    Route::post('/brand', [App\Http\Controllers\BrandController::class, 'Insertbrand'])->name('brand');

    Route::post('/product', [App\Http\Controllers\ProductController::class, 'Insertproduct'])->name('addproduct');
});

Route::middleware('auth')->group(function () {

    Route::get('/watchspec/{id}', [App\Http\Controllers\ProductController::class, 'Get_product'])->name('watchspec');

    Route::get('/dashboard', [App\Http\Controllers\ProductController::class, 'Get_allproduct'])->name('dashboard');

    Route::post('/cart', [App\Http\Controllers\CartController::class, 'Insertcart'])->name('cart');
});

Route::get('/index_watchspec/{id}', [App\Http\Controllers\ProductController::class, 'Getproduct']);
Route::get('/', [App\Http\Controllers\BrandController::class, 'index']);

Route::get('/', [App\Http\Controllers\ProductController::class, 'Getaproduct']);

Route::view('/addbrand', 'addbrand');

Route::get('/showcart', [App\Http\Controllers\CartController::class, 'ShowuserCart'])->name('showcart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Route::get('/allbrands', [App\Http\Controllers\BrandController::class, 'Allbrands'])->name('brands');
