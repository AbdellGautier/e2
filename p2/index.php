<?php

session_start();

$computerBoard = [];
$playerBoard = [];
$winner = "";

// Check if this is the first time playing the game
if (
    empty($_SESSION["computerBoard"]) ||
    empty($_SESSION["playerBoard"]) ||
    !empty($_SESSION["playAgain"])
) {

    // Clear the Play Again flag
    $_SESSION["playAgain"] = null;

    // ---------------------------------------------------------------------
    // Will hold the Computer's submarine board spaces and moves. This
    // is where the player interact by selecting and launching missiles to.
    // 
    // Guidance: Any key in here can have the following values:
    //           S = Submarine Present
    //           M = Miss
    //           H = Submarine Hit
    // ---------------------------------------------------------------------
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

    // Place the computer submarine on the computer board
    $computerBoard = placeSubmarine($computerBoard, $submarineSpots);

    // Place the player submarine on the player board
    $playerBoard = placeSubmarine($playerBoard, $submarineSpots);

    // Place the initial state of the game in the session
    $_SESSION["computerBoard"] = $computerBoard;
    $_SESSION["playerBoard"] = $playerBoard;
    $_SESSION["submarineSpots"] = $submarineSpots;
} else {
    // Get the current state of the game from the session
    $computerBoard = $_SESSION["computerBoard"];
    $playerBoard = $_SESSION["playerBoard"];
    
    // In case the user refresh the page
    $winner = $_SESSION["winner"] ?? "";
}

// -----------------------------------------
// Randomly place a submarine on a board.
// The submarine could be placed vertically
// or horizontally in a random location.
// -----------------------------------------
function placeSubmarine($board, $submarineSpots)
{
    // These are our only two options in 
    // how to place a submarine on the board
    $submarineOrientationOptions = ["horizontal", "vertical"];

    // Randomly, get the orientation for this instance
    $submarineOrientation = array_rand(array_flip($submarineOrientationOptions), 1);

    // Will hold all board's unique letters (columns)
    $allBoardLetters = [];

    // Iterate over the board array for unique letters extraction
    foreach ($board as $key => $value) {
        // Add the new character, if not already in our collection
        if (!in_array(substr($key, 0, 1), $allBoardLetters)) {
            // Add the new letter to our unique letters collection
            array_push($allBoardLetters, substr($key, 0, 1));
        }
    }

    // Will hold all board's numbers (rows)
    $allBoardNumbers = range(1, count($allBoardLetters));

    if ($submarineOrientation == "horizontal") {
        // --------------------------------------------
        // Position the submarine horizontally,
        // following a similar pattern as in: 
        // A1, B1, C1, D1, E1

        // Guidance: Number index stays the same,
        //           the Letter column is what changes
        // --------------------------------------------

        // Get a random letter - Only consider letters
        // that can accomodate the submarine size
        $validCharactersToStart = array_slice($allBoardLetters, 0, count($allBoardLetters) - $submarineSpots);

        // Select the starting letter position,
        // from the list of valid characters
        $startingLetter = array_rand(array_flip($validCharactersToStart), 1);

        // Select a random row number from the board
        $rowNumber = array_rand(array_flip($allBoardNumbers), 1);

        // Apply the spots where the submarine lies
        for ($i = 1; $i <= $submarineSpots; $i++) {
            $board[++$startingLetter . $rowNumber] = "S";
        }
    } else {
        // --------------------------------------------
        // Position the submarine vertically,
        // following a similar pattern as in: 
        // F4, F5, F6, F7, F8

        // Guidance: Number index is what changes,
        //           the Letter column stays the same
        // --------------------------------------------

        // Select a letter position,
        // from the list of valid letters
        $startingLetter = array_rand(array_flip($allBoardLetters), 1);

        // Get only the numbers that can accomodate the submarine size
        $validNumberToStart = array_slice($allBoardNumbers, 0, count($allBoardNumbers) - $submarineSpots);

        // Select a random row number from the valid ones
        $rowNumber = array_rand(array_flip($validNumberToStart), 1);

        // Apply the spots where the submarine lies
        for ($i = $rowNumber; $i < ($rowNumber + $submarineSpots); $i++) {
            $board[$startingLetter . $i] = "S";
        }
    }

    return $board;
}

require 'index-view.php';
