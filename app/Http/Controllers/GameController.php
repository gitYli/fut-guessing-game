<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    private Client $client;
    private int $randomNumber;
    private string $apiUrl;

    public function __construct()
    {
        $this->randomNumber = rand(0, 300);

        if ($this->randomNumber <= 100) {
            $this->apiUrl = 'https://drop-api.ea.com/rating/fc-24?gender=0';
        } elseif ($this->randomNumber <= 200) {
            $this->apiUrl = 'https://drop-api.ea.com/rating/fc-24?gender=0&offset=100';
        } elseif ($this->randomNumber <= 300) {
            $this->apiUrl = 'https://drop-api.ea.com/rating/fc-24?gender=0&offset=200';
        }

        $this->client = new Client(['headers' => [
        ]]);
    }

    public function index()
    {
        // Fetch random player data
        do {
            $player = $this->fetchRandomPlayer();
        } while ($player['position']['shortLabel'] == 'GK');


        if ($player['leagueName'] == 'ROSHN Saudi League')
            $player['leagueName'] = 350;
        elseif ($player['leagueName'] == 'Premier League')
            $player['leagueName'] = 13;
        elseif ($player['leagueName'] == 'Bundesliga')
            $player['leagueName'] = 19;
        elseif ($player['leagueName'] == 'Ligue 1 Uber Eats')
            $player['leagueName'] = 16;
        elseif ($player['leagueName'] == 'MLS')
            $player['leagueName'] = 39;
        elseif ($player['leagueName'] == 'LALIGA EA SPORTS')
            $player['leagueName'] = 53;
        elseif ($player['leagueName'] == 'Serie A TIM')
            $player['leagueName'] = 31;
        elseif ($player['leagueName'] == 'Liga Portugal')
            $player['leagueName'] = 308;
        elseif ($player['leagueName'] == 'Trendyol Süper Lig')
            $player['leagueName'] = 68;

        if ($player['commonName'] == '')
            $player['commonName'] = $player['lastName'];

        $player['avatarUrl'] = str_replace('50w', '512w', $player['avatarUrl']);
        session(['current_player_id' => $player['id'], 'score' => 8]);

        return view('game.index', compact('player'));
    }

    public function guess(Request $request)
    {
        $guessedName = $request->input('name');
        $playerId = session('current_player_id');

        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get("https://drop-api.ea.com/rating/ea-sports-fc?locale=en&offset=0&limit=100&player=$playerId");
        $score = session('score');

        $playerData = $response->json();

        if ($score <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'No more attempts left'
            ]);
        }

        if ($guessedName === trim($playerData['items'][0]['firstName'] . ' ' . $playerData['items'][0]['lastName'])) {
            // Correct guess
            return response()->json([
                'success' => true,
                'player' => $playerData['items'][0]['firstName'] . ' ' . $playerData['items'][0]['lastName'],
                'randomNumber' => $this->randomNumber,
            ]);
        } else {
            // Incorrect guess
            session(['score' => $score - 1]); // Decrease the score
            return response()->json([
                'success' => false,
                'message' => 'Wrong guess',
                'randomNumber' => $this->randomNumber,
            ]);
        }
    }

    private function fetchRandomPlayer()
    {
        $response = $this->client->get($this->apiUrl);
        $players = json_decode($response->getBody(), true)['items'];

        // Get a random player
        return $players[array_rand($players)];
    }

}


