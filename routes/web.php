<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Static Pages
Route::view('/about', 'about')->name('about');
Route::view('/contacts', 'contacts')->name('contact');

// Auth
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'authenticate')->name('login.auth');
    Route::get('/logout', 'logout')->name('login.logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register', 'createAccount')->name('register.createAccount');
});

// Users
Route::controller(UserController::class)->group(function () {
    Route::get('/user/{account_name}', 'index')->name('user.index');
    Route::get('/user/{account_name}/edit', 'editIndex')->name('user.edit');
    Route::post('/user/{account_name}/update', 'updateUser')->name('user.update');
});