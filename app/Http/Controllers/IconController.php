<?php

namespace App\Http\Controllers;

use App\Models\FutIcon;
use Illuminate\Http\Request;

class IconController extends Controller
{
    public function index()
    {
        // Fetch random player data
        do {
            $player = $this->fetchRandomPlayer();
        } while ($player->position == 'GK');

        return view('game.icon', compact('player'));
    }

    private function fetchRandomPlayer()
    {
        // Get a random player directly from the database
        return FutIcon::inRandomOrder()->first();
    }
}
