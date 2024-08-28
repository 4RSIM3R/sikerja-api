<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'activity', 'as' => 'activity.', 'middleware' => ['auth.api']], function () {
    Route::get('', [ActivityController::class, 'index'])->name('index');
    Route::post('evidence/{id}', [ActivityController::class, 'evidence'])->name('evidence');

    Route::group(['middleware' => ['custom.permission:admin']], function () {
        Route::get('export/{id}', [ActivityController::class, 'export'])->name('export');
        Route::delete('{id}', [ActivityController::class, 'destroy'])->name('destroy');
        Route::resource('', ActivityController::class)->only(['store', 'update', 'show']);
    });
});
