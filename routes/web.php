<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/loginPost', [LoginController::class, 'loginPost']);


Route::post('/registerPost', [RegisterController::class, 'registerPost']);


Route::group(['middleware'=>['UserCheck']], function(){
    Route::inertia('/login', 'Login')->name('login');
    Route::inertia('/register', 'Register')->name('register');

    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
});