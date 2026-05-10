<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

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

#Admin middleware begins

Route::middleware('admin')->group(function () {

    Route::get('/editproduct/{id}', [App\Http\Controllers\ProductController::class, 'getProductToEdit'])->name('productedit');

    Route::post('/updateproduct/{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('updateproduct');

    Route::get('/editbrand/{id}', [App\Http\Controllers\BrandController::class, 'getBrandToEdit'])->name('brandedit');

    Route::post('/updatebrand/{id}', [App\Http\Controllers\BrandController::class, 'editBrand'])->name('updatebrand');

    Route::post('/deleteproduct/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('productdelete');

    Route::post('/deletebrand/{id}', [App\Http\Controllers\BrandController::class, 'deleteBrand'])->name('branddelete');

    Route::get('/addproduct', [App\Http\Controllers\BrandController::class, 'viewBrand'])->name('showbrand');

    Route::get('/allbrands', [App\Http\Controllers\BrandController::class, 'viewIt'])->name('allbrands');

    Route::get('/allproduct', [App\Http\Controllers\ProductController::class, 'getAllProduct'])->name('allproduct');

    Route::post('/brand', [App\Http\Controllers\BrandController::class, 'insertBrand'])->name('brand');

    Route::post('/product', [App\Http\Controllers\ProductController::class, 'insertProduct'])->name('addproduct');

    Route::get('/admindashboard', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admindashboard');

    Route::get('/allusers', [App\Http\Controllers\AdminController::class, 'displayUsers'])->name('allusers');

    Route::get('/allorders', [App\Http\Controllers\OrdersController::class, 'displayOrders'])->name('allorders');

    Route::get('/orderdetails/{id}', [App\Http\Controllers\OrdersDetailController::class, 'displayDetails'])->name('orderdetails');
});
#Admin middleware ends

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment');

/*
|--------------------------------------------------------------------------
| Storefront (same pages for guests and signed-in customers)
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/watchspec/{id}', [ProductController::class, 'get_Product'])->name('watchspec');

Route::get('/rolex', [ProductController::class, 'displayBrandCollection'])
    ->defaults('catalogSlug', 'rolex')
    ->name('rolex');

Route::get('/hublot', [ProductController::class, 'displayBrandCollection'])
    ->defaults('catalogSlug', 'hublot')
    ->name('hublot');

Route::get('/audemars', [ProductController::class, 'displayBrandCollection'])
    ->defaults('catalogSlug', 'audemars')
    ->name('audemars');

Route::get('/femalewatches', [ProductController::class, 'displayFemaleWatch'])->name('femalewatch');

Route::get('/malewatches', [ProductController::class, 'displayMaleWatch'])->name('malewatch');

Route::get('/displaybrands', [BrandController::class, 'showBrands'])->name('displaybrands');
Route::get('/search', [ProductController::class, 'searchResults'])->name('search.results');

Route::post('/redirect', [ProductController::class, 'redirect'])->name('redirect');

#auth middleware begins

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ProductController::class, 'displayProducts'])->name('dashboard');

    Route::post('/cart', [App\Http\Controllers\CartController::class, 'insertCart'])->name('cart');

    Route::delete('/clearcart', [App\Http\Controllers\CartController::class, 'deleteCart'])->name('clearcart');

    Route::delete('/deletecart/{id}', [App\Http\Controllers\CartController::class, 'deleteCartItem'])->name('cartdeleteitem');

    Route::get('/editcart/{id}', [App\Http\Controllers\CartController::class, 'findCart'])->name('cartedit');

    Route::put('/updatqty/{id}', [App\Http\Controllers\CartController::class, 'editCart'])->name('editqty');

    Route::get('/showcart', [App\Http\Controllers\CartController::class, 'showUserCart'])->name('showcart');

    Route::view('/checkout', 'checkout')->name('checkout');

    Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

    Route::get('/userorder', [App\Http\Controllers\OrdersController::class, 'userOrder'])->name('userorder');
});

#auth middleware ends


Route::view('/addbrand', 'addbrand');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.post');
});

Auth::routes();
