<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group([], function () {
    Route::middleware('auth:api')->prefix('auth')->name('auth.')->group(function () {
        Route::post('/login', [UserController::class, 'login'])->name('login')->withoutMiddleware('auth:api');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::post('/refresh', [UserController::class, 'refresh'])->name('refresh');
        Route::post('/me', [UserController::class, 'me'])->name('me');
    });

    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/{id}', [NewsController::class, 'show'])->name('show');
        Route::get('/all', [NewsController::class, 'list'])->name('list');

        Route::middleware('auth:api')->group(function () {
            Route::post('/', [NewsController::class, 'create'])->name('create');
            Route::put('/{id}', [NewsController::class, 'update'])->name('update');
            Route::delete('/{id}', [NewsController::class, 'delete'])->name('delete');
        });
    });
});
