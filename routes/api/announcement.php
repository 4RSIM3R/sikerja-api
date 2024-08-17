<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'announcement', 'as' => 'announcement.', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['custom.permission:admin']], function () {
        Route::delete('{id}', [AnnouncementController::class, 'destroy'])->name('destroy');
        Route::resource('', AnnouncementController::class)->only(['store', 'update']);
    });

    Route::get('', [AnnouncementController::class, 'index'])->name('index');
    Route::get('{id}', [AnnouncementController::class, 'show'])->name('show');
});
