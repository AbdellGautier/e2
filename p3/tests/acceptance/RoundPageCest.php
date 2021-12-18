<?php

use Codeception\Util\Locator;

class RoundPageCest
{
    /**
     * Test that we can load the Game History page and see the expected content
     */
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/history");

        # Assert ability to view the round details
        $I->click("[test=lnkRound]");

        # Assert the existence of the page heading
        $I->see("Game Information", "h5");
    }

    /**
     * Test that we can use the Game History page and see the expected results
     */
    public function pageWorks(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/history");

        # Assert ability to view the round details
        $I->click('[test=lnkRound]', Locator::firstElement('[test=lnkRound]'));

        # Assert the existence of the page heading
        $I->see("Game Information", "h5");

        # Assert that we can go back to the History page
        $I->click("[test=btnGameHistory]");

        # Assert the existence of the History page heading
        $I->see("Game History");
    }
}
