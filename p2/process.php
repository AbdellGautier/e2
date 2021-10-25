<?php

session_start();

// Do we have posted data?
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['btnPlayAgain'])) {
        // -------------------------------------------------
        // Indicate that we want to play again
        // -------------------------------------------------
        $_SESSION["playAgain"] = true;

        // Clear any lingering session values
        $_SESSION["playerBoard"] = null;
        $_SESSION["computerBoard"] = null;
        $_SESSION["winner"] = "";
    } elseif (
        isset($_POST['btnLaunchMissile']) &&
        !empty($_SESSION["playerBoard"]) &&
        !empty($_SESSION["computerBoard"]) &&
        !empty($_POST['CB'])
    ) {
        // -------------------------------------------------
        // Game in progress, proceed to determine next steps
        // -------------------------------------------------

        // Get the Player's missile launch target
        $pMissileSentTo = $_POST['CB'];

        // Grab the two participant boards
        $playerBoard = $_SESSION["playerBoard"];
        $computerBoard = $_SESSION["computerBoard"];
        $submarineSpots = $_SESSION["submarineSpots"];

        // Did the player hit a submarine spot in the computer's board?
        $computerBoard = updateBoard($computerBoard, $pMissileSentTo);

        // Obtain the player's empty or submarine-present spots
        $playerBoardFreeSpots = array_filter($playerBoard, function ($var) {
            return ($var == "" || $var == "S");
        });

        // Obtain the computer's desired player spot to attack
        $cMissileSentTo = getComputerMissileTarget($playerBoardFreeSpots);

        // Did the computer hit a submarine spot in the player's board?
        $playerBoard = updateBoard($playerBoard, $cMissileSentTo);

        // Will hold who won, or if it's tied
        $winner = "";

        // Determine if we have a winner or a tie
        if (
            count(array_keys($computerBoard, "H")) == $submarineSpots &&
            count(array_keys($playerBoard, "H")) == $submarineSpots
        ) {
            $winner = "Tie";
        } elseif (count(array_keys($computerBoard, "H")) == $submarineSpots) {
            $winner = "Player";
        } elseif (count(array_keys($playerBoard, "H")) == $submarineSpots) {
            $winner = "Computer";
        }

        // Update the session with both boards
        // Grab the two participant boards
        $_SESSION["playerBoard"] = $playerBoard;
        $_SESSION["computerBoard"] = $computerBoard;
        $_SESSION["winner"] = $winner;
    }
}

// Determines the computer's choice (spot)
// for attacking the Player's board.
function getComputerMissileTarget($playerBoardFreeSpots)
{
    $sendMissileToSpot = array_rand($playerBoardFreeSpots, 1);

    return $sendMissileToSpot;
}

// Update the player's or computer's board, 
// based on the missile target specified.
function updateBoard($board, $missileSentTo)
{
    // Did it hit a submarine spot in the board?
    if ($board[$missileSentTo] == "S") {
        // Indicate that this spot is a hit
        $board[$missileSentTo] = "H";
    } else {
        // Indicate that this spot is a miss
        $board[$missileSentTo] = "M";
    }

    return $board;
}

header('Location: index.php');
