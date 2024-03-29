<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CartsController;


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
    })->name('welcome');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');
Route::post('/carts/remove', [App\Http\Controllers\CartsController::class, 'remove']);
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])
->name('products');
Route::get('/carts', [App\Http\Controllers\CartsController::class, 'checkout'])
->name('carts');
Route::get('/checkout', [App\Http\Controllers\ProductController::class, 'index'])
->name('checkout');
Route::post('/checkout', [App\Http\Controllers\ProductController::class, 'addtocart']);
Route::post('/carts', [App\Http\Controllers\CartsController::class, 'user_order']);
Route::get('/admin', [App\Http\Controllers\SudoController::class, 'index'])
->name('admin');
Route::post('/admin', [App\Http\Controllers\SudoController::class, 'get_invoices']);
Route::post('/admin/order_complete', [App\Http\Controllers\SudoController::class, 'order_complete']);
Route::get('/admin/stock', [App\Http\Controllers\StockController::class, 'index'])
->name('stock');
Route::post('/admin/stock/addproduct', [App\Http\Controllers\StockController::class, 'addproduct']);
Route::post('/admin/stock/belongs', [App\Http\Controllers\StockController::class, 'belongs']);
Route::post('/product', [App\Http\Controllers\ProductController::class, 'filterStore']);




//call other fucntion in the same controller 
//straks allemaal nodig nu niet meer

// //add to cart
// Route::get('/add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'adds'])->name('add-to-cart');
// //remove from cart
// Route::get('/remove-from-cart/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('remove-from-cart');
// //update cart
// Route::get('/update-cart', [App\Http\Controllers\CartController::class, 'update'])->name('update-cart');
// //checkout
// Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
// //order
// Route::post('/order', [App\Http\Controllers\CartController::class, 'order'])->name('order');
// //order details
// Route::get('/order-details/{id}', [App\Http\Controllers\CartController::class, 'orderDetails'])->name('order-details');