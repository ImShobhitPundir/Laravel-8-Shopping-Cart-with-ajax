<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('home',[HomeController::class,'index'])->name('home');
Route::post('home/add_to_cart',[HomeController::class,'add_to_cart'])->name('add_to_cart');
Route::get('home/cart',[HomeController::class,'cart'])->name('cart');
Route::post('home/checkout',[HomeController::class,'checkout'])->name('checkout');
