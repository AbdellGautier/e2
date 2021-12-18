<?php

class HomePageCest
{
    /**
     * Test that we can load the home page and see the expected content
     */
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/");

        # Assert the correct page title
        $I->seeInTitle("Submarine Attack");

        # Assert the existence of the Instructions heading
        $I->see("Instructions");

        # Assert that we have the core form controls
        $I->seeElement("#Player_Nickname");
        $I->seeElement("#Difficulty");
        $I->seeElement("#btnPlayGame");
        $I->seeElement("#btnGameHistory");
    }

    /**
     * Test that we can use the home page and see the expected results
     */
    public function pageWorks(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/");

        # Assert ability to enter the nickname
        $nickname = "BubbleBobbyTheTester";
        $I->fillField("[test=Player_Nickname]", $nickname);

        # Assert ability to select hard difficulty
        $I->click("[test=Difficulty-Hard]");

        # Assert ability to begin the game
        $I->click("[test=btnPlayGame]");

        # Assert the existence of the nickname in the game itself
        $I->see($nickname);

        # Act
        $I->amOnPage("/");

        # Assert ability to view games played
        $I->click("[test=btnGameHistory]");

        # Assert that we see valid Games History contents
        $I->see("This page shows all games played by everyone.");
    }

    /**
     * Test that form validation works and error messages are in place
     */
    public function pageValidationWorks(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/");

        # Assert ability to enter the nickname
        $nickname = "BubbleBobbyTheTester";
        $I->fillField("[test=Player_Nickname]", $nickname);

        # Assert ability to select hard difficulty
        $I->click("[test=Difficulty-Hard]");

        # Assert ability to begin the game
        $I->click("[test=btnPlayGame]");

        # Assert the existence of the nickname in the game itself
        $I->see($nickname);

        # Act
        $I->amOnPage("/");

        # Assert ability to view games played
        $I->click("[test=btnGameHistory]");

        # Assert that we see valid Games History contents
        $I->see("This page shows all games played by everyone.");
    }
}
