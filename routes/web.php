<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'index'])->name('game.index');
Route::post('/guess', [GameController::class, 'guess'])->name('game.guess');
;
