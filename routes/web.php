<?php

use App\Http\Controllers\Merchant;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', [Merchant::class, "index"])->name("merchant.index");
Route::get('/merchant/{id}',[Merchant::class,"show"])->name("merchant.show");
Route::get('/rank', [Merchant::class,"rank"])->name("merchant.rank");
Route::get('/discover', [Merchant::class,"discover"])->name("merchant.discover");
Route::get('/signup/customer', [UserAuth::class,"hal_signup_pembeli"])->name("page_signup.customer");
Route::post('/auth/seller', [UserAuth::class,"store_seller"])->name("store.seller");
Route::post('/auth/cust', [UserAuth::class,"store_customer"])->name("store.cust");
Route::post('/auth/login/seller', [UserAuth::class,"signin_seller"])->name("login.seller");
Route::post('add/komentar', [Merchant::class,"add_comment"])->name("add.komentar");
Route::get('/auth/logout', function () {
    if(Auth::check()){
        Auth::logout();
    }
    return redirect()->route("merchant.index");
})->name("logout.user");
// Route::get('/',[Merchant::class,"signup"]);
