<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'activity', 'as' => 'activity.', 'middleware' => ['auth.api']], function () {

    Route::group(['middleware' => ['custom.permission:user']], function () {
        Route::post('evidence/{id}', [ActivityController::class, 'evidence'])->name('evidence');
    });

    Route::get('', [ActivityController::class, 'index'])->name('index');

    Route::group(['middleware' => ['custom.permission:admin']], function () {
        Route::get('export/{id}', [ActivityController::class, 'export'])->name('export');
        Route::delete('{id}', [ActivityController::class, 'destroy'])->name('destroy');
        Route::resource('', ActivityController::class)->only(['store', 'update', 'show']);
    });
});
