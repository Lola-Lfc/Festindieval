<?php

// Import Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\BilleterieController;
use App\Http\Controllers\ExposantsController;
use App\Http\Controllers\Admin\SeriesController as AdminSeriesController;

// Import Illuminate
use Illuminate\Support\Facades\Route;

// Import Controllers Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

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

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

    // Panel Admin Dashboard
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

    // Panel Admin User
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');
        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])
            ->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

    //Panel Admin Series
        Route::get('/series', [AdminSeriesController::class, 'index'])
            ->name('series.index');
        Route::get('/series/create', [AdminSeriesController::class, 'create'])
            ->name('series.create');
        Route::post('/series', [AdminSeriesController::class, 'store'])
            ->name('series.store');
        Route::get('/series/{serie}/edit', [AdminSeriesController::class, 'edit'])
            ->name('series.edit');
        Route::put('/series/{serie}', [AdminSeriesController::class, 'update'])
            ->name('series.update');
        Route::delete('/series/{serie}', [AdminSeriesController::class, 'destroy'])
            ->name('series.destroy');
    });

Route::get('/invite', [InviteController::class, 'index']);

Route::get('/series', [SeriesController::class, 'index']);

Route::get('/billeterie', [BilleterieController::class, 'index']);

Route::get('/exposants', [ExposantsController::class, 'index']);