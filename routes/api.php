<?php

use App\Http\Controllers\APIDailyController;
use App\Http\Controllers\APILocationController;
use App\Http\Controllers\APIModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name("api.")->group(function() {
    // location
    Route::prefix('location/')->name("location.")->group(function() {
        Route::get('/', [APILocationController::class, 'index'])->name('index');
    });

    // daily
    Route::prefix('daily/')->name("location.")->group(function() {
        Route::get('/', [APIDailyController::class, 'index'])->name('index');
        Route::get('/parameter', [APIDailyController::class, 'parameter'])->name('parameter');
    });

    // model
    Route::prefix('model/')->name("model.")->group(function() {
        Route::post('/predict', [APIModelController::class, 'predict'])->name('predict');
        Route::get('/forecast', [APIModelController::class, 'forecast'])->name('forecast');
    });
});

