<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'attendance', 'as' => 'attendance.', 'middleware' => ['auth.api', 'custom.permission:user']], function () {
    Route::get('', [\App\Http\Controllers\AttendanceController::class, 'index'])->name('index');
    Route::post('', [\App\Http\Controllers\AttendanceController::class, 'store'])->name('store');
});