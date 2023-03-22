<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layout.master');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class,'login'] );

