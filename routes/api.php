<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});
Route::get('/posts',[PostController::class, 'index'])->name('posts');

