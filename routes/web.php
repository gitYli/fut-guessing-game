<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\IconController;

Route::get('/game-mode-50-tries', [IconController::class, 'gameMode50Tries']);
Route::get('/play-again', [IconController::class, 'gameMode50Tries'])->name('playAgain');

Route::post('/guess-player', [IconController::class, 'guessPlayer'])->name('guessPlayer');
Route::get('/game-over', function () {
    return view('game.over');
})->name('gameOver');
Route::get('/icon', [IconController::class, 'index'])->name('icon.index');
Route::get('/', [GameController::class, 'index'])->name('game.index');
