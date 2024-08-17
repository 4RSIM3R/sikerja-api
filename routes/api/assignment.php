<?php

use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'assignment', 'as' => 'assignment.', 'middleware' => ['auth.api']], function () {
    Route::get('', [AssignmentController::class, 'index'])->name('index');
    Route::get('{id}', [AssignmentController::class, 'show'])->name('show');

    Route::group(['middleware' => ['custom.permission:admin']], function () {
        Route::resource('', AssignmentController::class)->only(['store', 'update', 'destroy']);
    });
});
