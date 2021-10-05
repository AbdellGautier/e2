<?php

// Define the card suits
$cardSuits = [
    "C",    // Clubs
    "D",    // Diamonds
    "H",    // Hearts
    "S"     // Spades
];

// Define the card ranks
$cardRanks = [
    "A" => 1,
    "2" => 2,
    "3" => 3,
    "4" => 4,
    "5" => 5,
    "6" => 6,
    "7" => 7,
    "8" => 8,
    "9" => 9,
    "10" => 10,
    "J" => 11,
    "Q" => 12,
    "K" => 13
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

// Will hold the players cards
$player1Cards = [];
$player2Cards = [];

// Set the initial target to player when dealing cards
$dealTo = "Player 1";

// Assign the cards, alternating between players
foreach ($deck as $card => $value) {
    if ($dealTo == "Player 1") {
        // Assign a new card to the Player 1
        $player1Cards[$card] = $value;

        // Switch the next card dealing to the Player 2
        $dealTo = "Player 2";
    } else {
        // Assign a new card to the Player 2
        $player2Cards[$card] = $value;

        // Switch the next card dealing to the Player
        $dealTo = "Player 1";
    }
}

// Will hold the actual rounds of card drawings.
// This is the array that the view will use to display the results in a table-like format
$rounds = [];

$temporaryCounter = 0;

// Each player draw, until we have a winner.
// The loser is a player that ends up with 0 cards.
// while(count($player1Cards) != 0 && $player2Cards != 0) {
while ($temporaryCounter < 5) {

    // ***********************************************
    // Decrease the counter, to avoid an infinite loop
    // ***********************************************
    $temporaryCounter++;

    // Will hold the winner of this round
    $roundWinner = "";

    // Get the last cards on the players decks for this round
    $player1Draw = array_slice($player1Cards, -1, 1, true);
    $player2Draw = array_slice($player2Cards, -1, 1, true);


    // Determine who is the winner of this round
    if (end($player1Draw) > end($player2Draw)) {

        // Indicate that the Player 1 has won this round
        $roundWinner = "Player 1";

        // Player has a card with the highest value.
        // Add the Player 2 card to Player 1
        array_push($player1Cards, $player2Draw);
        //array_pop($player2Cards);

    } else if (end($player1Draw) < end($player2Draw)) {

        // Indicate that the Player 2 has won this round
        $roundWinner = "Player 2";

        // Player 2 has a card with the highest value.
        // Add the Player 1 card to Player 2
        array_push($player2Cards, $player1Draw);
        //array_pop($player1Cards);

    } else {
        // Indicate that there is a tie
        $roundWinner = "Tie";

        // Both players have cards with the same value.
        // Remove the cards from both players.
        //array_pop($player1Cards);
        //array_pop($player2Cards);
    }

    // Prepare the values before adding them to the round array
    $round = count($rounds) + 1;                                                    // Round Number

    // Player 1 Information
    $p1DrawSuit = substr(key($player1Draw), 0, strpos(key($player1Draw), "_"));     // P1 draw card suit (e.g. 'D' = Diamonds)
    $p1DrawRank = substr(key($player1Draw), 2);                                     // P1 draw card rank (e.g. 'A', '9', or 'K')
    $p1DrawColor = ($p1DrawSuit == "D" || $p1DrawSuit == "H") ? "red" : "black";    // P1 draw color (e.g. 'red' or 'black')
    $p1CardsCount = count($player1Cards);                                           // P1 cards count after the round

    // Player 2 Information
    $p2DrawSuit = substr(key($player2Draw), 0, strpos(key($player2Draw), "_"));     // P2 draw card suit (e.g. 'D' = Diamonds)
    $p2DrawRank = substr(key($player2Draw), 2);                                     // P2 draw card rank (e.g. 'A', '9', or 'K')
    $p2DrawColor = ($p2DrawSuit == "D" || $p2DrawSuit == "H") ? "red" : "black";    // P2 draw color (e.g. 'red' or 'black')
    $p2CardsCount = count($player2Cards);                                           // P2 cards count after the round

    // Add the round information to the rounds array
    array_push(
        $rounds,
        array(
            "Round" => $round,
            "RoundWinner" => $roundWinner,
            "P1DrawSuit" => $p1DrawSuit,
            "P1DrawRank" => $p1DrawRank,
            "P1DrawColor" => $p1DrawColor,
            "P1CardsCount" => $p1CardsCount,
            "P2DrawSuit" => $p2DrawSuit,
            "P2DrawRank" => $p2DrawRank,
            "P2DrawColor" => $p2DrawColor,
            "P2CardsCount" => $p2CardsCount
        )
    );
}

$winner = "";

// Will configure who is the winner of this game?
if (count($player1Cards) == 0) {
    $winner = "Player 1";
} else {
    $winner = "Player 2";
}

// Credit to ahmad at: https://www.php.net/manual/en/function.shuffle.php#94697
function shuffle_assoc(&$array)
{
    $keys = array_keys($array);

    shuffle($keys);

    foreach ($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}

require 'index-view.php';
