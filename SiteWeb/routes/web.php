<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgrammeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/programme', [ProgrammeController::class, 'index']);