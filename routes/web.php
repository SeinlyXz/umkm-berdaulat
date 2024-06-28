<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

Route::redirect("/", "/login");

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/register', [AuthController::class, 'RegisterPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/login', [AuthController::class, 'LoginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function (Request $request) {
        $search = $request->query('search');
        $user = Auth::user();
        return view('home', [
            'user' => $user,
            'search' => $search
        ]);
    })->name('home');
    Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
    
});

Route::get('/hello', function(){
    $users = User::all();
    return view('hello', [
        'users' => $users
    ]);
})->middleware("auth")->name('hello');

Route::get('/product',[ProductController::class, 'index']);

Route::get('/product/create',[ProductController::class, 'create']);

Route::post('/product',[ProductController::class, 'store'])->name('product.store');
