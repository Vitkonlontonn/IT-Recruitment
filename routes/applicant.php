<?php

use App\Http\Controllers\Applicant\HomePageController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index']);
