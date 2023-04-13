<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/test', [TestController::class, 'test']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', array(AuthController::class, 'register'))->name('register');
Route::post('/register', [AuthController::class, 'registering'])->name('registering');

Route::get('/auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('auth.redirect');
Route::get('/auth/callback/{provider}',[AuthController::class, 'callback'])->name('auth.callback');

Route::get('/', function (){
    return view('layout.master');
})->name('welcome');


Route::get('/roleregister', [AuthController::class, 'roleRegister'])->name('roleregister');

Route::post('/roleregister', [AuthController::class, 'roleRegistering'])->name('roleregistering');

Route::get('/applican.welcome', [AuthController::class, 'applicantWelcome'])->name('applicant.welcome');
Route::get('/hr.welcome', [AuthController::class, 'hrWelcome'])->name('hr.welcome');






