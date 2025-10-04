<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('final_tmdt_web/public/index.html', function (){
    return view('welcome');
});

Route::get('final_tmdt_web/public/login.html', function () {
    return view('pages.login');
})->name('login');


Route::get('final_tmdt_web/public/cart.html', function () {
    return view('pages.cart');
});

Route::get('final_tmdt_web/public/checkout.html', function () {
    return view('pages.checkout');
});