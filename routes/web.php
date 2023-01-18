<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/index_watchspec/{id}', [App\Http\Controllers\ProductController::class, 'Getproduct']);

Route::get('/watchspec/{id}', [App\Http\Controllers\ProductController::class, 'Get_product'])->name('watchspec');

Route::get('/dashboard',[App\Http\Controllers\ProductController::class, 'Get_allproduct'])->name('dashboard');
Route::get('/',[App\Http\Controllers\BrandController::class, 'index']);

Route::get('/',[App\Http\Controllers\ProductController::class, 'Getaproduct']);



Route::get('/allbrands', [App\Http\Controllers\BrandController::class, 'ViewIt'])->name('allbrands');

Route::post('/cart', [App\Http\Controllers\CartController::class, 'Insertcart'])->name('cart');

Route::view('/addbrand', 'addbrand');


 Route::get('/editproduct/{id}', [App\Http\Controllers\ProductController::class, 'GetProductToEdit'])->name('productedit');

 Route::post('/updateproduct/{id}', [App\Http\Controllers\ProductController::class, 'EditProduct'])->name('updateproduct');

 Route::get('/editbrand/{id}', [App\Http\Controllers\BrandController::class, 'GetBrandToEdit'])->name('brandedit');

 Route::post('/updatebrand/{id}', [App\Http\Controllers\BrandController::class, 'EditBrand'])->name('updatebrand');

 Route::post('/deleteproduct/{id}', [App\Http\Controllers\ProductController::class, 'DeleteProduct'])->name('productdelete');

 Route::post('/deletebrand/{id}', [App\Http\Controllers\BrandController::class, 'DeleteBrand'])->name('branddelete');

Route::get('/showcart',[App\Http\Controllers\CartController::class, 'ShowuserCart'])->name('showcart');

Route::get('/addproduct',  [App\Http\Controllers\BrandController::class, 'ViewBrand'])->name('showbrand');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::post('/product', [App\Http\Controllers\ProductController::class, 'Insertproduct'])->name('addproduct');

Route::get('/allproduct', [App\Http\Controllers\ProductController::class, 'Getallproduct'])->name('allproduct');

Route::post('/brand', [App\Http\Controllers\BrandController::class, 'Insertbrand'])->name('brand');
// Route::get('/allbrands', [App\Http\Controllers\BrandController::class, 'Allbrands'])->name('brands');
