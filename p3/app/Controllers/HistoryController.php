<?php

namespace App\Controllers;

class HistoryController extends Controller
{
    // Handles the History page
    public function history()
    {
        // Obtain the game history from the database
        $games = $this->app->db()->all('rounds');

        return $this->app->view('history', ["games" => $games]);
    }

    // Shows the round details
    public function round()
    {
        // Ensure that we get the QueryString round id value
        if (!empty($this->app->param("id"))) {

            // Get the detailed round information from the database
            $gameDetails = $this->app->db()->findByColumn("rounds", "id", "=", $this->app->param("id"));

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

                return $this->app->view('round', [
                    'playerNickname' => $gameDetails[0]["player_nickname"],
                    'winner' => $gameDetails[0]["winner"],
                    'difficulty' => $gameDetails[0]["difficulty"],
                    'computerBoard' => $computerBoard,
                    'playerBoard' => $playerBoard,
                    'startedOn' => $gameDetails[0]["started_on"],
                    'endedOn' => $gameDetails[0]["ended_on"],
                ]);
            }
        }
    }
}
