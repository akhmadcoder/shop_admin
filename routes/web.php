<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     // return view('welcome');
//     // return view('admin');
    
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/buyers', [App\Http\Controllers\BuyerController::class, 'index'])->name('buyers');
Route::get('/customerlist', [App\Http\Controllers\BuyerController::class, 'customers'])->name('customerlist');
Route::get('/add_customer', [App\Http\Controllers\BuyerController::class, 'create'])->name('add_customer');
Route::post('/create_new_customer', [App\Http\Controllers\BuyerController::class, 'create_customer'])->name('create_new_customer');
Route::get('/view/{id}', [App\Http\Controllers\BuyerController::class, 'view'])->name('view');
Route::get('/edit_customer/{id}', [App\Http\Controllers\BuyerController::class, 'edit'])->name('edit_customer');
Route::post('/customer_update', [App\Http\Controllers\BuyerController::class, 'update'])->name('customer_update');
Route::get('/delete/{id}', [App\Http\Controllers\BuyerController::class, 'destroy'])->name('delete');
Route::get('/purchaselist', [App\Http\Controllers\BuyerController::class, 'purchases'])->name('purchaselist');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');
Route::get('/productlist', [App\Http\Controllers\ProductsController::class, 'productlist'])->name('productlist');
Route::get('/add_product', [App\Http\Controllers\ProductsController::class, 'create'])->name('add_product');
Route::post('/create_product', [App\Http\Controllers\ProductsController::class, 'store'])->name('create_product');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


