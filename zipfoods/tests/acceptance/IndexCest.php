<?php

class IndexCest
{
    /**
     * Test that we can load the product page and see the expected content
     */
    public function pageLoads(AcceptanceTester $I)
    {
        // # Act
        $I->amOnPage("/");

        $I->seeInTitle("ZipFoods");

        $I->seeElement("[id=logo]");

        $I->see("Welcome!");

        $I->seeElement("[test=products-link]");
    }
}
