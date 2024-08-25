<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth.api', 'custom.permission:admin']], function () {
    Route::resource('', UserController::class)->except(['destroy']);
});