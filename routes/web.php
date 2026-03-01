<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\Public\IndexController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/search', [App\Http\Controllers\SearchController::class, 'search']);
});

Route::middleware(['role:Administrator'])->group(function () {
    Route::resource('/users', App\Http\Controllers\Executive\UserController::class);
    Route::resource('/services', App\Http\Controllers\Executive\ServiceController::class);
    Route::resource('/branches', App\Http\Controllers\Executive\BranchController::class);
    Route::resource('/references', App\Http\Controllers\Executive\ReferenceController::class);
});


require __DIR__.'/auth.php';
