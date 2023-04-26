<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});
Route::get('/posts',[PostController::class, 'index'])->name('posts');

Route::get('/companies',[CompanyController::class, 'index'])->name('companies');
Route::get('/languages',[LanguageController::class, 'index'])->name('languages');

Route::post('/companies/check/{companyName?}',[CompanyController::class, 'check'])->name('companies.check');



