<?php

namespace App\Controllers;

class AppController extends Controller
{
    public function index()
    {
        return $this->app->view('index', ["winner" => ""]);
    }

    public function notfound()
    {
        return $this->app->view('notfound');
    }

    public function games()
    {
        $games = $this->app->db()->all('rounds');

        return $this->app->view('games', ["games" => $games]);
    }

    public function gamedetail()
    {
        // Ensure that we get the QueryString game id value
        if (!empty($this->app->param("gid"))) {

            // Get the detailed game information
            $gameDetails = $this->app->db()->findByColumn("rounds", "id", "=", $this->app->param("gid"));

            // Did we obtain an existing game?
            if (empty($gameDetails)) {
                return $this->app->view('notfound');
            } else {
                // Unserialize the boards arrays
                // --------------------------------------------------
                // Its not a good practice to store the arrays in the
                // db, but it made my life easier for this assignment
                // =)
                // --------------------------------------------------
                $computerBoard = unserialize($gameDetails[0]["computer_board"]);
                $playerBoard = unserialize($gameDetails[0]["player_board"]);
                $winner = $gameDetails[0]["winner"];

                return $this->app->view('gamedetail', [
                    'computerBoard' => $computerBoard,
                    'playerBoard' => $playerBoard,
                    'winner' => $winner
                ]);
            }
        }
    }

    public function play()
    {
        $this->app->validate([
            'Player_Nickname' => 'required|minLength:3|maxLength:25',
            'Difficulty' => 'required'
        ]);

        $_SESSION["player_nickname"] = $this->app->input("Player_Nickname");
        $_SESSION["difficulty"] = $this->app->input("Difficulty");

        // Keep track of when the game started
        $_SESSION["started_on"] = date('Y-m-d H:i:s');

        $computerBoard = [];
        $playerBoard = [];
        $winner = "";

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
        $submarineSpots = 5; // Default - For easy difficulty

        if ($_SESSION["difficulty"] == "Hard") {
            $submarineSpots = 1;
        }

        // Place the computer submarine on the computer board
        $computerBoard = $this->placeSubmarine($computerBoard, $submarineSpots);

        // Place the player submarine on the player board
        $playerBoard = $this->placeSubmarine($playerBoard, $submarineSpots);

        // Place the initial state of the game in the session
        $_SESSION["computerBoard"] = $computerBoard;
        $_SESSION["playerBoard"] = $playerBoard;
        $_SESSION["submarineSpots"] = $submarineSpots;

        return $this->app->view('play', [
            'computerBoard' => $computerBoard,
            'playerBoard' => $playerBoard,
            'winner' => $winner
        ]);
    }

    public function launchmissile()
    {
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

                // Start a new game
                $this->app->redirect("/play");
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
                $computerBoard = $this->updateBoard($computerBoard, $pMissileSentTo);

                // Obtain the player's empty or submarine-present spots
                $playerBoardFreeSpots = array_filter($playerBoard, function ($var) {
                    return ($var == "" || $var == "S");
                });

                // Obtain the computer's desired player spot to attack
                $cMissileSentTo = $this->getComputerMissileTarget($playerBoardFreeSpots);

                // Did the computer hit a submarine spot in the player's board?
                $playerBoard = $this->updateBoard($playerBoard, $cMissileSentTo);

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

                // Do we have finished the game?
                // If so, save the current state of this game
                if ($winner != "") {
                    // Save the full snapshot of the game ending to the db
                    $this->app->db()->insert('rounds', [
                        'player_nickname' => $_SESSION["player_nickname"],
                        'difficulty' => $_SESSION["difficulty"],
                        'winner' => $winner,
                        'player_board' => serialize($playerBoard),
                        'computer_board' => serialize($computerBoard),
                        'started_on' => $_SESSION["started_on"],
                        'ended_on' => date('Y-m-d H:i:s')
                    ]);
                }

                // Update the session with both boards
                // Grab the two participant boards
                $_SESSION["playerBoard"] = $playerBoard;
                $_SESSION["computerBoard"] = $computerBoard;
                $_SESSION["winner"] = $winner;
            }

            return $this->app->view('play', [
                'computerBoard' => $computerBoard,
                'playerBoard' => $playerBoard,
                'winner' => $winner
            ]);
        }
    }

    // -----------------------------------------
    // Randomly place a submarine on a board.
    // The submarine could be placed vertically
    // or horizontally in a random location.
    // -----------------------------------------
    private function placeSubmarine($board, $submarineSpots)
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

    // ----------------------------------------
    // Determines the computer's choice (spot)
    // for attacking the Player's board.
    // ----------------------------------------
    private function getComputerMissileTarget($playerBoardFreeSpots)
    {
        $sendMissileToSpot = array_rand($playerBoardFreeSpots, 1);

        return $sendMissileToSpot;
    }

    // ----------------------------------------
    // Update the player's or computer's board, 
    // based on the missile target specified.
    // ----------------------------------------
    private function updateBoard($board, $missileSentTo)
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
}
