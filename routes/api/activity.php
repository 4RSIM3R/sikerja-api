<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'activity', 'as' => 'activity.', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['custom.permission:admin']], function () {
        Route::delete('{id}', [ActivityController::class, 'destroy'])->name('destroy');
        Route::resource('', ActivityController::class)->only(['store', 'update']);
    });

    Route::get('', [ActivityController::class, 'index'])->name('index');
    Route::get('{id}', [ActivityController::class, 'show'])->name('show');
});
