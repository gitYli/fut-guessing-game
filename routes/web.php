<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\IconController;

Route::get('/icon', [IconController::class, 'index'])->name('icon.index');
Route::get('/', [GameController::class, 'index'])->name('game.index');
