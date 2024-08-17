<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'activity', 'as' => 'activity.', 'middleware' => ['auth']], function () {
    Route::get('', [ActivityController::class, 'index'])->name('index');
    Route::get('{id}', [ActivityController::class, 'show'])->name('show');

    Route::group(['middleware' => ['permission:admin']], function () {
        Route::resource('', ActivityController::class)->only(['store', 'update', 'destroy']);
    });
});
