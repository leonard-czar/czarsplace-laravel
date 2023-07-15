<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

#auth middleware begins

Route::middleware('auth')->group(function () {

    Route::get('/watchspec/{id}', [App\Http\Controllers\ProductController::class, 'get_Product'])->name('watchspec');

    Route::get('/dashboard', [App\Http\Controllers\ProductController::class, 'displayProducts'])->name('dashboard');

    Route::post('/cart', [App\Http\Controllers\CartController::class, 'insertCart'])->name('cart');

    Route::get('/rolex', [App\Http\Controllers\ProductController::class, 'displayRolex'])->name('rolex');

    Route::get('/hublot', [App\Http\Controllers\ProductController::class, 'displayHublot'])->name('hublot');

    Route::get('/audemars', [App\Http\Controllers\ProductController::class, 'displayAudemars'])->name('audemars');

    Route::get('/femalewatches', [App\Http\Controllers\ProductController::class, 'displayFemaleWatch'])->name('femalewatch');

    Route::get('/malewatches', [App\Http\Controllers\ProductController::class, 'displayMaleWatch'])->name('malewatch');

    Route::get('/displaybrands', [App\Http\Controllers\BrandController::class, 'showBrands'])->name('displaybrands');

    Route::post('/redirect', [App\Http\Controllers\ProductController::class, 'redirect'])->name('redirect');

    Route::delete('/clearcart', [App\Http\Controllers\CartController::class, 'deleteCart'])->name('clearcart');

    Route::delete('/deletecart/{id}', [App\Http\Controllers\CartController::class, 'deleteCartItem'])->name('cartdeleteitem');

    Route::get('/editcart/{id}', [App\Http\Controllers\CartController::class, 'findCart'])->name('cartedit');

    Route::put('/updatqty/{id}', [App\Http\Controllers\CartController::class, 'editCart'])->name('editqty');

    Route::get('/showcart', [App\Http\Controllers\CartController::class, 'showUserCart'])->name('showcart');

    Route::get('/checkout', function () {
        return view('checkout');
    });

    Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

    Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment');

    Route::get('/userorder', [App\Http\Controllers\OrdersController::class, 'userOrder'])->name('userorder');
});

#auth middleware ends


Route::view('/addbrand', 'addbrand');

Auth::routes();

Route::get('/index_displaybrands', [App\Http\Controllers\BrandController::class, 'showIndexBrands'])->name('displayindexbrands');

Route::controller(ProductController::class)->group(function () {
    Route::post('/index_redirect', 'indexRedirect')->name('indexredirect');
    Route::get('/index_femalewatches', 'displayIndexFemaleWatch')->name('indexfemalewatch');
    Route::get('/index_malewatches', 'displayIndexMaleWatch')->name('indexmalewatch');
    Route::get('/index_hublot', 'displayIndexHublot')->name('indexhublot');
    Route::get('/index_rolex', 'displayIndexRolex')->name('indexrolex');
    Route::get('/index_audemars', 'displayIndexAudemars')->name('indexaudemars');
    Route::get('/index_watchspec/{id}', 'getProduct');
    Route::get('/', 'Index');
});
