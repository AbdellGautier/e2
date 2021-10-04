<?php

// Temporary placeholder for a possible score for the game
$roundsPlayed = 106;
$winner = "Player 2";

// Define the card suits
$cardSuits = [
    "Clubs",
    "Diamonds",
    "Hearts",
    "Spades"
];

// Define the card ranks
$cardRanks = [
    "Ace" => 1,
    "2" => 2,
    "3" => 3,
    "4" => 4,
    "5" => 5,
    "6" => 6,
    "7" => 7,
    "8" => 8,
    "9" => 9,
    "10" => 10,
    "Jack" => 11,
    "Queen" => 12,
    "King" => 13
];

// Will hold all the 52 cards
$deck = [];

// Build our stack of cards, based on the suits and ranks
foreach ($cardSuits as $cSuit) {
    foreach ($cardRanks as $cRank => $value) {
        $deck[$cSuit . "_" . $cRank] = $value;
    }
}

// Shuffle our deck, keeping the associative array intact.
// If we shuffle using the regular 'shuffle()' function, we lose the custom keys
// Credit to ahmad at: https://www.php.net/manual/en/function.shuffle.php#94697
shuffle_assoc($deck);

$playerCards = [];
$computerCards = [];

// Set the initial target to player when dealing cards
$dealTo = "Player";

// Assign the cards, alternating between player and computer
foreach ($deck as $card => $value) {
    if ($dealTo == "Player") {
        $playerCards[$card] = $value;
        $dealTo = "Computer";
    }
    else {
        $computerCards[$card] = $value;
        $dealTo = "Player";
    }
}

// Player and Computer draw a card
$playerDraw = array_pop($playerCards);
$computerDraw = array_pop($computerCards);

// Credit to ahmad at: https://www.php.net/manual/en/function.shuffle.php#94697
function shuffle_assoc(&$array) {
    $keys = array_keys($array);

    shuffle($keys);

    foreach($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}

require 'index-view.php';
