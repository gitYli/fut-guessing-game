<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class GuessPlayer extends Component
{
    public $player;
    public int $score = 8;
    private Client $client;
    private string $apiUrl;

    public function mount()
    {
        $this->fetchAPlayer();
    }

    public function fetchAPlayer()
    {
        $this->client = new Client();
        $randomNumber = rand(0, 300);

        if ($randomNumber <= 100) {
            $this->apiUrl = 'https://drop-api.ea.com/rating/fc-24?gender=0';
        } elseif ($randomNumber <= 200) {
            $this->apiUrl = 'https://drop-api.ea.com/rating/fc-24?gender=0&offset=100';
        } else {
            $this->apiUrl = 'https://drop-api.ea.com/rating/fc-24?gender=0&offset=200';
        }


        do {
            $this->player = $this->fetchRandomPlayer();
        } while ($this->player['position']['shortLabel'] == 'GK');

        if ($this->player['commonName'] == '') {
            $this->player['commonName'] = $this->player['lastName'];
        }

        $this->player['score'] = 8;

        $this->player['avatarUrl'] = str_replace('50w', '512w', $this->player['avatarUrl']);
        $this->player['PlayerName'] = trim(($this->player['firstName'] ?? '') . ' ' . ($this->player['lastName'] ?? ''));
    }

    private function fetchRandomPlayer()
    {
        $response = $this->client->get($this->apiUrl);
        $players = json_decode($response->getBody(), true)['items'];

        // Get a random player
        return $players[array_rand($players)];
    }

    public function submitGuess($name)
    {
        $correctName = trim(($this->player['firstName'] ?? '') . ' ' . ($this->player['lastName'] ?? ''));

        if ($name === $correctName) {
            $this->emit('correctGuess');
            $this->fetchRandomPlayer();
        } else {
            $this->score -= 1;
            if ($this->score <= 0) {
                $this->emit('gameOver');
            }
        }
    }

    public function render()
    {
        return view('livewire.guess-player');
    }
}
//namespace App\Http\Livewire;
//
//use Livewire\Component;
//
//class GuessPlayer extends Component
//{
//    public function render()
//    {
//        return view('livewire.guess-player');
//    }
//}

