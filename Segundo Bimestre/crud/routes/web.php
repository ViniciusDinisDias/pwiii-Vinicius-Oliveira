<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', fn() => redirect('/games'));
Route::resource('games', GameController::class);