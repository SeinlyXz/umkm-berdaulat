<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, ProductController, ProfileController, TokoController, HomeController, KeranjangController};
use App\Models\{User};
use Illuminate\Support\Str;
use Illuminate\Http\Request;

Route::get("/", [HomeController::class, "index"])->name("home.index");

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/register', [AuthController::class, 'RegisterPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/login', [AuthController::class, 'LoginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
});

Route::get("/profile", [ProfileController::class, "index"])->middleware('auth')->name("profile.index");
Route::get("/profile/edit", [ProfileController::class, "edit"])->middleware('auth')->name("profile.edit");
Route::post("/profile/edit", [ProfileController::class, "update"])->middleware('auth')->name("profile.update");

Route::get("/toko", [TokoController::class, "index"])->middleware('auth')->name("toko.index");
Route::get("/toko/create", [TokoController::class, "create"])->middleware('auth')->name("toko.create");
Route::get("/toko/edit/{id}", [TokoController::class, "edit"])->name("toko.edit");
Route::get("/toko/{id}", [TokoController::class, "show"])->name("toko.view");
Route::post("/toko", [TokoController::class, "store"])->middleware('auth')->name("toko.store");
Route::put("/toko/{id}", [TokoController::class, "update"])->middleware('auth')->name("toko.update");

Route::get("/product", [ProductController::class, "index"])->name("product.index");
Route::get("/product/create", [ProductController::class, "create"])->name("product.create")->middleware('auth');
Route::get("/product/{id}", [ProductController::class, "show"])->name("product.view");
Route::post("/product", [ProductController::class, "store"])->name("product.store")->middleware('auth');
Route::get("/product/edit/{id}", [ProductController::class, "edit"])->name("product.edit");
Route::put("/product/edit/{id}", [ProductController::class, "update"])->name("product.update");
Route::delete("/product/{id}", [ProductController::class, "destroy"])->name("product.destroy");

Route::get("/keranjang", [KeranjangController::class, "index"])->name("keranjang.index")->middleware('auth');
Route::get("/keranjang/add", [KeranjangController::class, "store"])->name("keranjang.store")->middleware('auth');
Route::get("/keranjang/{id}", [KeranjangController::class, "show"])->name("keranjang.view")->middleware('auth');
Route::post("/keranjang", [KeranjangController::class, "store"])->name("keranjang.store")->middleware('auth');

Route::post("/checkout", [KeranjangController::class, "checkout"])->name("checkout");
Route::get("/checkout/success", [KeranjangController::class, "checkoutSuccess"])->name("checkout.success");