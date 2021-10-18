<?php

// Define the card suits
$cardSuits = [
    "C",    // Clubs
    "D",    // Diamonds
    "H",    // Hearts
    "S"     // Spades
];

// Define the card rank and values
$cardRankValues = [
    "A_1", // The number after the "_" represents the value of the card
    "2_2",
    "3_3",
    "4_4",
    "5_5",
    "6_6",
    "7_7",
    "8_8",
    "9_9",
    "10_10",
    "J_11",
    "Q_12",
    "K_13"
];

// Will hold all the 52 cards
$deck = [];

// Build our stack of cards, based on the suits and ranks
foreach ($cardSuits as $cSuit) {
    foreach ($cardRankValues as $cRankValue) {
        array_push($deck, $cSuit . "_" . $cRankValue);
    }
}

// Shuffle our deck
shuffle($deck);

// Will hold the players cards
$player1Cards = [];
$player2Cards = [];

// Set the initial target to player when dealing cards
$dealTo = "Player 1";

// Assign the cards, alternating between players
foreach ($deck as $card) {
    if ($dealTo == "Player 1") {
        // Assign a new card to the Player 1
        array_push($player1Cards, $card);

        // Switch the next card dealing to the Player 2
        $dealTo = "Player 2";
    } else {
        // Assign a new card to the Player 2
        array_push($player2Cards, $card);

        // Switch the next card dealing to the Player 1
        $dealTo = "Player 1";
    }
}

// Will hold the actual rounds of card drawings.
// This is the array that the view will use to display the results in a table-like format
$rounds = [];

// Each player draw, until we have a winner.
// The loser is a player that ends up with 0 cards.
while (count($player1Cards) != 0 && count($player2Cards) != 0) {

    // Will hold the winner of this round
    $roundWinner = "";

    // Get the last cards on the players decks for this round
    $p1Draw = array_pop($player1Cards);
    $p2Draw = array_pop($player2Cards);

    // Extract the values of both cards
    $p1DrawValue = substr($p1Draw, strrpos($p1Draw, "_") + 1);
    $p2DrawValue = substr($p2Draw, strrpos($p2Draw, "_") + 1);

    // Convert the values of both cards to integers
    $p1DrawValue = (int)$p1DrawValue;
    $p2DrawValue = (int)$p2DrawValue;

    // Determine who is the winner of this round
    // Winner = Who has the card of highest value
    if ($p1DrawValue > $p2DrawValue) {

        // Indicate that the Player 1 has won this round
        $roundWinner = "Player 1";

        // Take the winning and losing cards and place them at the bottom of the deck
        array_unshift($player1Cards, $p1Draw);
        array_push($player1Cards, $p2Draw);
        array_unshift($player1Cards, array_pop($player1Cards));
    } else if ($p2DrawValue > $p1DrawValue) {

        // Indicate that the Player 2 has won this round
        $roundWinner = "Player 2";

        // Take the winning and losing cards and place them at the bottom of the deck
        array_unshift($player2Cards, $p2Draw);
        array_push($player2Cards, $p1Draw);
        array_unshift($player2Cards, array_pop($player2Cards));
    } else {
        // Indicate that there is a tie
        $roundWinner = "Tie";
    }

    // Prepare the values before adding them to the round array
    $round = count($rounds) + 1;                                                        // Round Number

    // Player 1 Information
    $p1DrawSuit = substr($p1Draw, 0, 1);                                                // P1 card suit (e.g. 'D' = Diamonds)

    // Player 1 card suit icon determination
    $p1DrawSuitSymbol = getSuitIcon($p1DrawSuit);                                       // P1 card suit HTML entity code

    $p1DrawRank = getCardRank($p1Draw);                                                 // P1 card rank (e.g. 'A', '9', or 'K')
    $p1DrawColor = getCardColor($p1DrawSuit);                                           // P1 color (e.g. 'red' or 'black')
    $p1CardsCount = count($player1Cards);                                               // P1 cards count after the round

    // Player 2 Information
    $p2DrawSuit = substr($p2Draw, 0, 1);                                                // P2 card suit (e.g. 'D' = Diamonds)

    // Player 2 card suit icon determination
    $p2DrawSuitSymbol = getSuitIcon($p2DrawSuit);                                       // P2 card suit HTML entity code

    $p2DrawRank = getCardRank($p2Draw);                                                 // P2 card rank (e.g. 'A', '9', or 'K')
    $p2DrawColor = getCardColor($p2DrawSuit);                                           // P2 color (e.g. 'red' or 'black')
    $p2CardsCount = count($player2Cards);                                               // P2 cards count after the round

    // Add the round information to the rounds array
    array_push(
        $rounds,
        array(
            "Round" => $round,
            "RoundWinner" => $roundWinner,
            "P1DrawSuit" => $p1DrawSuit,
            "P1DrawSuitSymbol" => $p1DrawSuitSymbol,
            "P1DrawRank" => $p1DrawRank,
            "P1DrawColor" => $p1DrawColor,
            "P1CardsCount" => $p1CardsCount,
            "P2DrawSuit" => $p2DrawSuit,
            "P2DrawSuitSymbol" => $p2DrawSuitSymbol,
            "P2DrawRank" => $p2DrawRank,
            "P2DrawColor" => $p2DrawColor,
            "P2CardsCount" => $p2CardsCount
        )
    );
}

$winner = "";

// Establishes who is the winner of this game
if (count($player1Cards) == 0) {
    $winner = "Player 2";
} else {
    $winner = "Player 1";
}

// Returns the rank of a card
function getCardRank($pDraw)
{
    return substr($pDraw, strpos($pDraw, "_") + 1, strrpos($pDraw, "_") - 2);
}

// Returns the right card color to use
function getCardColor($pDrawSuit)
{
    if ($pDrawSuit == "D" || $pDrawSuit == "H") {
        return "red";
    }
    else {
        return "black";
    }
}

// Returns the right card suit symbol to use
function getSuitIcon($pDrawSuit)
{
    if ($pDrawSuit == "C") {
        return "&clubsuit;";
    } elseif ($pDrawSuit == "D") {
        return "&diams;";
    } elseif ($pDrawSuit == "H") {
        return "&heartsuit;";
    } else {
        return "&spadesuit;";
    }
}

require 'index-view.php';
