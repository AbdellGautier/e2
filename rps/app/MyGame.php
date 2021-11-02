<?php

namespace App;

require './vendor/autoload.php';

use RPS\Game;

class MyGame extends Game
{
    protected $moves = ['heads', 'tails'];

    /**
     * Compares $playerMove against $computerMove and
     * determines whether player tied, won, or lost
     */
    protected function determineOutcome($playerMove, $computerMove)
    {
        // Obtain which way the coin landed face up
        $coinLandedFaceUp = $this->moves[array_rand($this->moves, 1)];

        // Properly set the computer move below.
        // ---------------------------------------------------------------
        // Too much to refactor if I want to override the superclass'
        // play method, which by design allow both players to have
        // the same coin side in this game. It wouldn't be ok.
        //
        // If I try to override the superclass's play() method, I will have
        // to persist the results in here as well, as the persistResults()
        // method is the superclass Game is private.
        if ($playerMove == "heads") {
            $computerMove = "tails";
        } else {
            $computerMove = "heads";
        }

        // To circumvent the tighly couple behavior (persistence/session) of
        // play() in the superclass we use "outcome" property, which is what
        // this function returns to indicate what happened in the game.
        if ($playerMove == $coinLandedFaceUp) {
            return 'The coin landed on ' . $playerMove . ', Player wins!';
        } else {
            return 'The coin landed on ' . $computerMove . ', Computer wins!';
        }
    }
}
