<?php

// Will hold the Player board spaces and moves
$playerBoard = [
    "A1" => "", "A2" => "", "A3" => "", "A4" => "", "A5" => "", "A6" => "", "A7" => "", "A8" => "",
    "B1" => "", "B2" => "", "B3" => "", "B4" => "", "B5" => "", "B6" => "", "B7" => "", "B8" => "",
    "C1" => "", "C2" => "", "C3" => "", "C4" => "", "C5" => "", "C6" => "", "C7" => "", "C8" => "",
    "D1" => "", "D2" => "", "D3" => "", "D4" => "", "D5" => "", "D6" => "", "D7" => "", "D8" => "",
    "E1" => "", "E2" => "", "E3" => "", "E4" => "", "E5" => "", "E6" => "", "E7" => "", "E8" => "",
    "F1" => "", "F2" => "", "F3" => "", "F4" => "", "F5" => "", "F6" => "", "F7" => "", "F8" => "",
    "G1" => "", "G2" => "", "G3" => "", "G4" => "", "G5" => "", "G6" => "", "G7" => "", "G8" => "",
    "H1" => "", "H2" => "", "H3" => "", "H4" => "", "H5" => "", "H6" => "", "H7" => "", "H8" => ""
];

// Make a copy of the player board for the computer,
// to avoid making the same associative array again
$computerBoard = $playerBoard;

// How many spots does the submarine occupy on the board?
$submarineLength = 5;

// Place the Player submarine randomly on the board
$playerBoard["D1"] = "S";
$playerBoard["D2"] = "S";
$playerBoard["D3"] = "S";
$playerBoard["D4"] = "S";
$playerBoard["D5"] = "S";

// Place the Computer's submarine randomly on the board
$computerBoard["A7"] = "S";
$computerBoard["B7"] = "S";
$computerBoard["C7"] = "S";
$computerBoard["D7"] = "S";
$computerBoard["E7"] = "S";

// Random submarine placement for
// the player and computer coming soon...

// Grab from POST the Player's missile launched...
// Determine if the Player hit the Computer's submarine...
// Otherwise, it's a "miss"

session_start();

// Grab from the Session the ongoing game information...

// At some point, the session will indicate the winner,
// at which point we will update the view to reflect that

require 'index-view.php';
