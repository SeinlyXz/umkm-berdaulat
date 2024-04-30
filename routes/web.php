<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/register', [AuthController::class, 'RegisterPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/login', [AuthController::class, 'LoginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
});
