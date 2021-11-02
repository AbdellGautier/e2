<?php

require __DIR__.'/vendor/autoload.php';

use RPS\Game;

$game = new Game();

# Each invocation of the `play` method will play and track a new round of player (given move) vs. computer

// Extract a random initial move
$moves = ["rock", "paper", "scissors"];
$playerMove = $moves[array_rand($moves, 1)];

$gameResult = $game->play($playerMove);

$computerMove = $gameResult["computer"];
$outcome = $gameResult["outcome"];
$timestamp = $gameResult["timestamp"];

require 'index-view.php';