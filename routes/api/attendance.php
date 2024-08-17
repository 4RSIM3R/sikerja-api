<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'attendance', 'as' => 'attendance.', 'middleware' => ['auth.api', 'custom.permission:user']], function () {
    Route::get('', [AttendanceController::class, 'index'])->name('index');
    Route::post('', [AttendanceController::class, 'store'])->name('store');
    Route::get('today', [AttendanceController::class, 'today'])->name('today');
});
