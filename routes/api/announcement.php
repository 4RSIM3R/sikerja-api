<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'announcement', 'as' => 'announcement.', 'middleware' => ['auth']], function () {
    Route::get('', [AnnouncementController::class, 'index'])->name('index');
    Route::get('{id}', [AnnouncementController::class, 'show'])->name('show');

    Route::group(['middleware' => ['permission:admin']], function () {
        Route::resource('announcement', AnnouncementController::class)->only(['store', 'update', 'destroy']);
    });
});
