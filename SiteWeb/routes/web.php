<?php

// Import Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\BilleterieController;
use App\Http\Controllers\ExposantsController;

// Import Illuminate
use Illuminate\Support\Facades\Route;

// Import Controllers Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TypebilletController;
use App\Http\Controllers\Admin\SeriesController as AdminSeriesController;
use App\Http\Controllers\Admin\ExposantController as AdminExposantController;
use App\Http\Controllers\Admin\InviteController as AdminInviteController;
use App\Http\Controllers\Admin\ProgrammeController as AdminProgrammeController;

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
        Route::resource('exposants', AdminExposantController::class);
        Route::resource('invites', AdminInviteController::class);
        Route::resource('programmes', AdminProgrammeController::class);
        
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

    //Panel Admin Tags
        Route::get('/tags', [TagController::class, 'index'])
            ->name('tags.index');
        Route::get('/tags/create', [TagController::class, 'create'])
            ->name('tags.create');
        Route::post('/tags', [TagController::class, 'store'])
            ->name('tags.store');
        Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])
            ->name('tags.edit');
        Route::put('/tags/{tag}', [TagController::class, 'update'])
            ->name('tags.update');
        Route::delete('/tags/{tag}', [TagController::class, 'destroy'])
            ->name('tags.destroy');

    //Panel Admin Type Billets
        Route::get('/typebillets', [TypebilletController::class, 'index'])
            ->name('typebillets.index');
        Route::get('/typebillets/create', [TypebilletController::class, 'create'])
            ->name('typebillets.create');
        Route::post('/typebillets', [TypebilletController::class, 'store'])
            ->name('typebillets.store');
        Route::get('/typebillets/{typebillet}/edit', [TypebilletController::class, 'edit'])
            ->name('typebillets.edit');
        Route::put('/typebillets/{typebillet}', [TypebilletController::class, 'update'])
            ->name('typebillets.update');
        Route::delete('/typebillets/{typebillet}', [TypebilletController::class, 'destroy'])
            ->name('typebillets.destroy');
    });

Route::get('/invite', [InviteController::class, 'index']);

Route::get('/series', [SeriesController::class, 'index']);

Route::get('/billeterie', [BilleterieController::class, 'index']);

Route::get('/exposants', [ExposantsController::class, 'index']);