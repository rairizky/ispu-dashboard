<?php

use App\Http\Controllers\CategoryActionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('auth/login');
});

// auth
Route::prefix('auth/')->name("auth.")->group(function() {
    Route::group(['middleware' => ['guest']], function() {
        Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::post('/login', [UserController::class, 'post_login'])->name('post_login');

        // Route::get('/register', [UserController::class, 'register'])->name('register');
        // Route::post('/register', [UserController::class, 'post_register'])->name('post_register');
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    });
});

// dashboard
Route::group(['middleware' => ['auth']], function() {
    Route::prefix('dashboard/')->name("dashboard.")->group(function() {
        // category
        Route::prefix('category/')->name("category.")->group(function() {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/create', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');

            // category action
            Route::prefix('action/')->name("action.")->group(function() {
                Route::get('/{id}', [CategoryActionController::class, 'index'])->name('index');
                Route::get('/{id}/create', [CategoryActionController::class, 'create'])->name('create');
                Route::post('/{id}/create', [CategoryActionController::class, 'store'])->name('store');
                Route::get('/{id}/edit/{idCategoryAction}', [CategoryActionController::class, 'edit'])->name('edit');
                Route::put('/{id}/edit/{idCategoryAction}', [CategoryActionController::class, 'update'])->name('update');
                Route::delete('/{id}/delete/{idCategoryAction}', [CategoryActionController::class, 'delete'])->name('delete');
            });
        });

        // location
        Route::prefix('location/')->name("location.")->group(function() {
            Route::get('/', [LocationController::class, 'index'])->name('index');
            Route::get('/create', [LocationController::class, 'create'])->name('create');
            Route::post('/create', [LocationController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [LocationController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [LocationController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [LocationController::class, 'delete'])->name('delete');

        });

        Route::prefix('daily/')->name("daily.")->group(function() {
            Route::get('/', [DailyController::class, 'index'])->name('index');
            Route::get('/create', [DailyController::class, 'create'])->name('create');
            Route::post('/create', [DailyController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [DailyController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [DailyController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [DailyController::class, 'delete'])->name('delete');

        });
    });
});
