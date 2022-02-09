<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetController;
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

Route::get('/', [HomeController::class, 'home']);

Route::resource('boxes', BoxController::class);

Route::prefix('boxes/{box}')->group(function () {
    Route::resource('sets', SetController::class);

    Route::prefix('sets/{set}')->group(function () {
        Route::resource('checks', CheckController::class);
    });
});
