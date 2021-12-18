<?php

class NotFoundPageCest
{
    /**
     * Test that we can load the Page Not Found page and see the expected content
     */
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/incredibly-rare-page-that-does-not-exist");

        # Assert the correct page title
        $I->seeInTitle("Submarine Attack - Page Not Found");

        # Assert the existence of the Instructions heading
        $I->see("Page Not Found");

        # Assert that we have a link back to the site's home page
        $I->seeElement("[test=lnkHomePage]");
    }

    /**
     * Test that we can use the Page Not Found page and see the expected results
     */
    public function pageWorks(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/incredibly-rare-page-that-does-not-exist");

        # Assert ability to click back to the Home Page
        $I->click("[test=lnkHomePage]");

        # Assert that we see valid Home Page contents
        $I->seeInTitle("Submarine Attack");
        $I->seeElement("#btnPlayGame");
        $I->seeElement("#btnGameHistory");
    }
}
