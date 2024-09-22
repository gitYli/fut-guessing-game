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

    public function gameMode50Tries()
    {
        // Only set a new player if no player is set in the session
        if (!session()->has('current_player_id')) {
            $player = FutIcon::where('position', '!=', 'GK')->inRandomOrder()->first();

            if (!$player) {
                return redirect()->back()->with('error', 'No players found.');
            }

            session(['current_player_id' => $player->id, 'score' => 0, 'tries' => 50]);
        }

        $player = FutIcon::find(session('current_player_id'));

        return view('game.50tries', compact('player'));
    }

    public function guessPlayer(Request $request)
    {
        $playerId = session('current_player_id');
        $player = FutIcon::find($playerId);

        if (!$player) {
            return redirect()->back()->with('error', 'Player not found.');
        }

        $guess = $request->input('player_guess');

        if (strtolower($guess) === strtolower($player->commonName)) {
            // Correct guess
            $score = session('score', 0) + 1;
            session(['score' => $score]);

            // Optionally set a new player for the next round
            $newPlayer = FutIcon::where('position', '!=', 'GK')->inRandomOrder()->first();
            session(['current_player_id' => $newPlayer->id]);
            $triggerRevealAllFieldFunction = true;

            return redirect()->back()->with('success', 'Correct guess! Your score is now ' . $score);
        } else {
            // Incorrect guess, decrement tries
            $tries = session('tries', 50) - 1;
            session(['tries' => $tries]);
            $triggerRevealRandomFieldFunction = true;

            if ($tries <= 0) {
                session(['current_player_id' => null]);
                return redirect()->route('gameOver');
            }

            return redirect()->back()->with('error', 'Incorrect guess. Try again.');
        }
    }

//    public function playAgain()
//    {
//        if (!session()->has('current_player_id')) {
//            $player = FutIcon::where('position', '!=', 'GK')->inRandomOrder()->first();
//
//            if (!$player) {
//                return redirect()->back()->with('error', 'No players found.');
//            }
//
//            session(['current_player_id' => $player->id, 'score' => 0, 'tries' => 50]);
//        }
//
//        $player = FutIcon::find(session('current_player_id'));
//
//        return view('game.50tries', compact('player'));
//    }


    private function fetchRandomPlayer()
    {
        // Get a random player directly from the database
        return FutIcon::inRandomOrder()->first();
    }
}
