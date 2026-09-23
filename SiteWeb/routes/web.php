<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\InviteController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/programme', [ProgrammeController::class, 'index']);

Route::get('/invite', [InviteController::class, 'index']);