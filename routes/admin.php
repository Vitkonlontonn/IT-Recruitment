<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.master');
})->name('welcome');

Route::group([
    'as' => 'users.',
    'prefix' => 'users',
], static function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
});
Route::group([
    'as' => 'posts.',
    'prefix' => 'posts',
], static function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/create', [PostController::class, 'store'])->name('store');
    Route::post('/import-csv', [PostController::class, 'importCsv'])->name('import_csv');
    Route::get('/edit', [PostController::class, 'edit'])->name('edit');
    Route::put('/edit/{post}', [PostController::class, 'update'])->name('update');
    Route::get('/destroy', [PostController::class, 'destroy'])->name('destroy');

});

Route::group([
    'as'     => 'companies.',
    'prefix' => 'companies',
], static function () {
    Route::post('/store', [CompanyController::class, 'store'])->name('store');
});

Route::group([
    'as' => 'applies.',
    'prefix' => 'applies',
], static function () {
    Route::get('/', [\App\Http\Controllers\Admin\ApplyController::class, 'index'])->name('index');
    Route::get('/approve', [\App\Http\Controllers\Admin\ApplyController::class, 'approve'])->name('approve');
    Route::get('/view', [\App\Http\Controllers\Admin\ApplyController::class, 'view'])->name('view');

});
