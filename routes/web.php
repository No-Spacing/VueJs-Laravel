<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/loginPost', [LoginController::class, 'loginPost']);


Route::post('/registerPost', [RegisterController::class, 'registerPost']);


Route::group(['middleware' => ['UserCheck']], function(){
    
    Route::inertia('/login', 'Login')->name('login');
    Route::inertia('/register', 'Register')->name('register');

    Route::get('/home', [UserController::class, 'home'])->name('home');

    Route::inertia('/about','About')->name('about');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
});