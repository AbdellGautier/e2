<?php

class PlayPageCest
{
    /**
     * Test that we can load the Play page and see the expected content
     */
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/");

        # Assert ability to enter the nickname
        $nickname = "MasterSubmarineSinker";
        $I->fillField("[test=Player_Nickname]", $nickname);

        # Assert ability to select easy difficulty
        $I->click("[test=Difficulty-Easy]");

        # Assert ability to begin the game
        $I->click("[test=btnPlayGame]");

        # Assert the existence of the nickname in the game itself
        $I->see($nickname);
        $I->see("Easy");

        # Assert the existence of the Launch Missile button
        $I->seeElement("[test=btnLaunchMissile]");
    }

    /**
     * Test that we can use the Play page and see the expected results
     */
    public function pageWorks(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/");

        # Assert ability to enter the nickname
        $nickname = "MasterSubmarineSinker";
        $I->fillField("[test=Player_Nickname]", $nickname);

        # Assert ability to select easy difficulty
        $I->click("[test=Difficulty-Easy]");

        # Assert ability to begin the game
        $I->click("[test=btnPlayGame]");

        # Assert the ability to launch a missile
        $I->click("[test=btnLaunchMissile]");
    }
}
