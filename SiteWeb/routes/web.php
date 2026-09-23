<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\BilleterieController;
use App\Http\Controllers\ExposantsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'admin']);

Route::get('/invite', [InviteController::class, 'index']);

Route::get('/series', [SeriesController::class, 'index']);

Route::get('/billeterie', [BilleterieController::class, 'index']);

Route::get('/exposants', [ExposantsController::class, 'index']);