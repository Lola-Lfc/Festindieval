<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\InviteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/programme', [ProgrammeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


<<<<<<< Updated upstream
Route::get('/programme', [ProgrammeController::class, 'index']);

Route::get('/invite', [InviteController::class, 'index']);
=======
>>>>>>> Stashed changes
