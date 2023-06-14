<?php

use App\Http\Controllers\Applicant\HomePageController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index'])->name('index');
Route::get('/{post}', [HomePageController::class, 'show'])->name ('show');
Route::get('/company/{post}', [HomePageController::class, 'company'])->name ('company');
Route::get('/apply/{post}', [HomePageController::class, 'apply'])->name ('apply');
Route::post('/apply', [HomePageController::class, 'appling'])->name ('appling');
Route::get('/profile/{user}', [HomePageController::class, 'profile'])->name ('profile');
