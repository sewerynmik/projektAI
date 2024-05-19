<?php

use App\Http\Controllers\FishController;
use App\Http\Controllers\FishermanController;
use App\Http\Controllers\FisheryController;
use App\Http\Controllers\HaulController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(FishController::class)->group(function () {
    Route::get('/fish', 'index')->name('fish.index');
    Route::get('/fish/create', 'create')->name('fish.create');
    Route::post('/fish', 'store')->name('fish.store');
    Route::get('/fish/{id}', 'show')->name('fish.show');
    Route::get('/fish/{id}/edit', 'edit')->name('fish.edit');
    Route::put('/fish/{id}', 'update')->name('fish.update');
    Route::delete('/fish/{id}', 'destroy')->name('fish.destroy');
});

Route::controller(FisheryController::class)->group(function () {
    Route::get('/fishery', 'index')->name('fishery.index');
    Route::get('/fishery/create', 'create')->name('fishery.create');
    Route::post('/fishery', 'store')->name('fishery.store');
    Route::get('/fishery/{id}', 'show')->name('fishery.show');
    Route::get('/fishery/{id}/edit', 'edit')->name('fishery.edit');
    Route::put('/fishery/{id}', 'update')->name('fishery.update');
    Route::delete('/fishery/{id}', 'destroy')->name('fishery.destroy');
});

Route::controller(FishermanController::class)->group(function () {
    Route::get('/fisherman', 'index')->name('fisherman.index');
    Route::get('/fisherman/create', 'create')->name('fisherman.create');
    Route::post('/fisherman', 'store')->name('fisherman.store');
    Route::get('/fisherman/{id}', 'show')->name('fisherman.show');
    Route::get('/fisherman/{id}/edit', 'edit')->name('fisherman.edit');
    Route::put('/fisherman/{id}', 'update')->name('fisherman.update');
    Route::delete('/fisherman/{id}', 'destroy')->name('fisherman.destroy');
});

//Route::controller(HaulController::class)->group(function () {
//    Route::get('/haul', 'index')->name('haul.index');
//    Route::get('/haul/create', 'create')->name('haul.create');
//    Route::post('/haul', 'store')->name('haul.store');
//    Route::get('/haul/{id}', 'show')->name('haul.show');
//    Route::get('/haul/{id}/edit', 'edit')->name('haul.edit');
//    Route::put('/haul/{id}', 'update')->name('haul.update');
//    Route::delete('/haul/{id}', 'destroy')->name('haul.destroy');
//});

Route::resource('haul', HaulController::class)->middleware('auth');

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/profile', 'index')->name('users.index');
});
