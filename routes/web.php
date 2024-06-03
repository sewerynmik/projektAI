<?php

use App\Http\Controllers\FishController;
use App\Http\Controllers\FishermanController;
use App\Http\Controllers\FisheryController;
use App\Http\Controllers\HaulController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('fish', FishController::class)->except('index', 'show', 'search')->middleware('auth');


Route::controller(FishController::class)->group(function () {
    Route::get('/fish', 'index')->name('fish.index');
    Route::get('/fish/search', 'search')->name('fish.search');
    Route::get('/fish/{fish}', 'show')->name('fish.show');
    Route::post('/upload/image', 'uploadImage')->name('upload.image')->middleware('auth');
});

Route::controller(FisheryController::class)->group(function () {
    Route::get('/fishery', 'index')->name('fishery.index');
    Route::get('/fishery/search', 'search')->name('fishery.search');
});

Route::resource('fishery', FisheryController::class)->except('index')->middleware('auth');

Route::resource('fisherman', FishermanController::class)->middleware('auth');

Route::get('/haul/add', [HaulController::class, 'add'])->name('haul.add')->middleware('auth');

Route::resource('haul', HaulController::class)->middleware('auth');

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile/edit/pass', [UserController::class, 'editPass'])->name('users.editPass');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/profile/edit/name', [UserController::class, 'editName'])->name('users.editName');
    Route::get('/profile/edit/email', [UserController::class, 'editEmail'])->name('users.editEmail');
    Route::put('/profile/update/pass/{user}', [UserController::class, 'updatePass'])->name('users.updatePass');
    Route::put('/profile/update/name/{user}', [UserController::class, 'updateName'])->name('users.updateName');
    Route::put('/profile/update/email/{user}', [UserController::class, 'updateEmail'])->name('users.updateEmail');
    Route::put('/profile/update/{fisherman}', [UserController::class, 'update'])->name('users.update');
});

Route::fallback(function(){
    return view('error');
});
