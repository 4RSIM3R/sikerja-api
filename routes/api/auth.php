<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::group(['middleware' => 'api'], function () {
        Route::post('logout', [AuthController::class, 'logout']);
    });
});
