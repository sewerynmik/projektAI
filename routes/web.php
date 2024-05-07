<?php

use App\Http\Controllers\FishController;
use App\Http\Controllers\FishermanController;
use App\Http\Controllers\FisheryController;
use App\Http\Controllers\HaulController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});
