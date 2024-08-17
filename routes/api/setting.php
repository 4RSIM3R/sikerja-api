<?php

use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'setting', 'as' => 'setting.', 'middleware' => ['auth.api']], function () {
    Route::get('', [SettingController::class, 'index'])->name('index');

    Route::group(['middleware' => ['auth.api', 'custom.permission:admin']], function () {
        Route::post('', [SettingController::class, 'store'])->name('store');
    });
});