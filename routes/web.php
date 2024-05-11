<?php

use App\Http\Controllers\FishController;
use App\Http\Controllers\FishermanController;
use App\Http\Controllers\FisheryController;
use App\Http\Controllers\HaulController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(FishController::class)->group(function () {
    Route::get('/fish', 'index')->name('fish.index');
});

Route::controller(FisheryController::class)->group(function () {
    Route::get('/fishery', 'index')->name('fishery.index');
});

Route::controller(FishermanController::class)->group(function () {
    Route::get('/fisherman', 'index')->name('fisherman.index');
});

Route::controller(HaulController::class)->group(function () {
    Route::get('/haul', 'index')->name('haul.index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});
