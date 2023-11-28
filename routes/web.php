<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Welcome
Route::get('/', function () {
    return view('welcome');
});

// Static Pages
Route::view('about', 'about')->name('about');
Route::view('contacts', 'contacts')->name('contact');

// Auth
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login.index');
    Route::post('login', 'authenticate')->name('login.auth');
});