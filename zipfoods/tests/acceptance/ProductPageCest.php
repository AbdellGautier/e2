<?php

class ProductPageCest
{
    /**
     * Test that we can load the product page and see the expected content
     */
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage("/product?sku=driscolls-strawberries");

        # Assert the correct title is set on the page
        $I->seeInTitle("Driscoll’s Strawberries");

        # Assert the existence of certain text on the page
        $I->see("Driscoll’s Strawberries");

        # Assert the existence of a certain element on the page
        $I->seeElement(".product-thumb");

        # Assert the existence of text within a specific element on the page
        $I->see("$4.99", ".product-price");
    }

    /**
     * Ensure that if a product is not found that we have the right behavior
     */
    public function notFound(AcceptanceTester $I)
    {
        $I->amOnPage("/product?sku=invalid-product-524-sku-73281412-3");

        $I->seeInTitle("Product Not Found");

        $I->see("Product Not Found", "h2");

        $I->seeElement("[test=products-link]");
    }

    public function reviewAProductTest(AcceptanceTester $I)
    {
        $I->amOnPage("/product?sku=driscolls-strawberries");

        $name = "Bob";
        $I->fillField("[test=reviewer-name-input]", $name);

        $review = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.";
        $I->fillField("[test=review-textarea]", $review);

        $I->click("[test=review-submit-button]");

        $I->seeElement("[test=review-confirmation]");

        // Confirm we see the review on the page
        $I->see($name, "[test=review-name]");
        $I->see($review, "[test=review-content]");
    }

    /**
     * Checks review form validations
     */
    public function reviewFormValidations(AcceptanceTester $I)
    {
        $I->amOnPage("/product?sku=driscolls-strawberries");

        $name = "";
        $I->fillField("[test=review-textarea]", $name);

        $review = "Lorem ipsum dolor sit amet.";
        $I->fillField("[test=review-textarea]", $review);

        $I->click("[test=review-submit-button]");

        $I->see("Please correct the errors below", "[test=error-message]");
        $I->see("The value for name can not be blank");
        $I->see("The value for review must be at least 200 character(s) long");
    }
}
