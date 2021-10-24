<?php

session_start();

$computerBoard = [];
$playerBoard = [];
$winner = "";

// Check if this is the first time playing the game
if (empty($_SESSION["computerBoard"]) ||
    empty($_SESSION["playerBoard"]) ||
    !empty($_SESSION["PlayAgain"])) {

    // Clear the Play Again flag
    $_SESSION["PlayAgain"] = null;

    // Will hold the Computer's submarine board spaces and moves. This
    // is where the player interact by selecting and launching missiles to.
    $computerBoard = [
        "A1" => "", "A2" => "", "A3" => "", "A4" => "", "A5" => "", "A6" => "", "A7" => "", "A8" => "",
        "B1" => "", "B2" => "", "B3" => "", "B4" => "", "B5" => "", "B6" => "", "B7" => "", "B8" => "",
        "C1" => "", "C2" => "", "C3" => "", "C4" => "", "C5" => "", "C6" => "", "C7" => "", "C8" => "",
        "D1" => "", "D2" => "", "D3" => "", "D4" => "", "D5" => "", "D6" => "", "D7" => "", "D8" => "",
        "E1" => "", "E2" => "", "E3" => "", "E4" => "", "E5" => "", "E6" => "", "E7" => "", "E8" => "",
        "F1" => "", "F2" => "", "F3" => "", "F4" => "", "F5" => "", "F6" => "", "F7" => "", "F8" => "",
        "G1" => "", "G2" => "", "G3" => "", "G4" => "", "G5" => "", "G6" => "", "G7" => "", "G8" => "",
        "H1" => "", "H2" => "", "H3" => "", "H4" => "", "H5" => "", "H6" => "", "H7" => "", "H8" => ""
    ];

    // Make a copy of the computer board for the player,
    // to avoid making the same associative array again
    $playerBoard = $computerBoard;

    // How many spots does a submarine occupy on each board?
    $submarineSpots = 5;

    // ---------------------------------------------------------
    // Temporary Code - Replace with random submarine placement
    // ---------------------------------------------------------
    $computerBoard = placeSubmarine($computerBoard, $submarineSpots);

    // ---------------------------------------------------------
    // Temporary Code - Replace with random submarine placement
    // ---------------------------------------------------------
    $playerBoard = placeSubmarine($playerBoard, $submarineSpots);

    // Place the initial state of the game in the session
    $_SESSION["computerBoard"] = $computerBoard;
    $_SESSION["playerBoard"] = $playerBoard;
    $_SESSION["submarineSpots"] = $submarineSpots;

    // Grab from the Session the ongoing game information...

    // At some point, the session will indicate the winner,
    // at which point we will update the view to reflect that
} else {
    // Get the current state of the game from the session
    $computerBoard = $_SESSION["computerBoard"];
    $playerBoard = $_SESSION["playerBoard"];
    $winner = $_SESSION["winner"];
}

function placeSubmarine($board, $submarineSpots) {
    // These are our only two options in 
    // how to place a submarine on the board
    $submarineOrientationOptions = ["horizontal", "vertical"];

    // Randomly, get the orientation for this instance
    $submarineOrientation = array_rand(array_flip($submarineOrientationOptions), 1);

    if ($submarineOrientation == "horizontal") {
        // We will need to position the submarine
        // following a similar pattern as in: 
        // A1, B1, C1, D1, E1

        // Number index stays the same
        // The Letter column is what changes
    } else {
        // We will need to position the submarine
        // following a similar pattern as in: 
        // D2, D3, D4, D5, D6

        // Number index is what changes
        // The Letter column stays the same
    }

    // **************************************
    // **************************************
    // Temporary location of both subs,
    // Until I finish this function
    // **************************************
    // **************************************
    $board["D1"] = "S";
    $board["D2"] = "S";
    $board["D3"] = "S";
    $board["D4"] = "S";
    $board["D5"] = "S";

    return $board;
}

require 'index-view.php';
