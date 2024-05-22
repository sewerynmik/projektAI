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
    Route::get('/fish/{fish}', 'show')->name('fish.show');
    Route::get('/fish/create', 'create')->name('fish.create');
});

Route::resource('fish', FishController::class)->except('index', 'show')->middleware('auth');

Route::controller(FisheryController::class)->group(function () {
    Route::get('/fishery', 'index')->name('fishery.index');
});

Route::resource('fishery', FisheryController::class)->except('index')->middleware('auth');

Route::resource('fisherman', FishermanController::class)->middleware('auth');

Route::get('/haul/add', [HaulController::class, 'add'])->name('haul.add')->middleware('auth');
Route::resource('haul', HaulController::class)->middleware('auth');


Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/profile', 'index')->name('users.index');
});
