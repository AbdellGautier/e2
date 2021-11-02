<?php

require __DIR__.'/vendor/autoload.php';

use App\MyGame;

$myGame = new MyGame();

# Each invocation of the `play` method will play and track a new round of player (given move) vs. computer

// Extract a random initial move
$coinSides = ["heads", "tails"];
$playerSideSelected = $coinSides[array_rand($coinSides, 1)];

$gameResult = $myGame->play($playerSideSelected);
$outcome = $gameResult["outcome"];

require 'coinflip-view.php';