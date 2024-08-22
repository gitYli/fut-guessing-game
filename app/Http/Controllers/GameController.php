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


        if ($player['commonName'] == '')
            $player['commonName'] = $player['lastName'];

        $player['avatarUrl'] = str_replace('50w', '512w', $player['avatarUrl']);
        session(['current_player_id' => $player['id'], 'score' => 8]);

        return view('game.index', compact('player'));
    }


    private function fetchRandomPlayer()
    {
        $response = $this->client->get($this->apiUrl);
        $players = json_decode($response->getBody(), true)['items'];

        // Get a random player
        return $players[array_rand($players)];
    }

}


