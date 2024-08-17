<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'activity', 'as' => 'activity.', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['custom.permission:admin']], function () {
        Route::delete('{id}', [ActivityController::class, 'destroy'])->name('destroy');
        Route::resource('', ActivityController::class)->only(['store', 'update', 'index', 'show']);
        Route::get('{id}/export', [ActivityController::class, 'export'])->name('export');
    });

    Route::group(['prefix' => 'attendance', 'as' => 'attendance.', 'middleware' => ['custom.permission:user']], function () {
        Route::post('{id}/evidence', [ActivityController::class, 'evidence'])->name('evidence');
    });
});