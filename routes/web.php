<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('layout.master');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::get('/registering', [\App\Http\Controllers\AuthController::class, 'registering'])->name('registering');



Route::get('/auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('auth.redirect');

Route::get('/auth/callback/{provider}',[\App\Http\Controllers\AuthController::class, 'callback'])->name('auth.callback');


