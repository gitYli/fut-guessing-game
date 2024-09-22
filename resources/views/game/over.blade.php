@extends('layouts.app')

@section('content')
    <div class="game-over">
        <h1>Game Over</h1>
        <p>Your final score is: {{ session('score') }}</p>
        <a href="{{ route('playAgain') }}">Play Again</a>
    </div>
@endsection
