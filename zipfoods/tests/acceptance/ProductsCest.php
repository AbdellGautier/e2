<?php

class ProductsCest
{
    /**
     * Test that we can load the product page and see the expected content
     */
    public function pageLoads(AcceptanceTester $I)
    {
        // # Act
        $I->amOnPage("/products");

        $productCount = count($I->grabMultiple('.product-link'));
        $I->assertGreaterThanOrEqual(10, $productCount);
    }

    /**
     * Add new product & confirmations
     */
    public function newProduct(AcceptanceTester $I)
    {
        $I->amOnPage("/products/new");

        $name = "Signature Peaches";
        $I->fillField("[name=name]", $name);

        $sku = "signature-peaches";
        $I->fillField("[name=sku]", $sku);

        $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.";
        $I->fillField("[name=description]", $description);

        $price = "2.99";
        $I->fillField("[name=price]", $price);

        $available = "250";
        $I->fillField("[name=available]", $available);

        $weight = "1";
        $I->fillField("[name=weight]", $weight);

        $I->click("[test=add-product-submit-button]");

        $I->see("Thank you, the new product was added!", "[test=new-confirmation]");

        $I->amOnPage("/products");
        $I->see($name);
    }

    /**
     * New Product Form validations
     */
    public function newProductValidations(AcceptanceTester $I)
    {
        // Test first with all form fields empty
        $I->amOnPage("/products/new");

        $I->click("[test=add-product-submit-button]");

        $I->see("The value for name can not be blank");
        $I->see("The value for sku can not be blank");
        $I->see("The value for description can not be blank");
        $I->see("The value for price can not be blank");
        $I->see("The value for available can not be blank");
        $I->see("The value for weight can not be blank");

        // Now test all form validation types
        $I->amOnPage("/products/new");

        $name = ".";
        $I->fillField("[name=name]", $name);

        $sku = "$*&$#^#^";
        $I->fillField("[name=sku]", $sku);

        $description = "1234567";
        $I->fillField("[name=description]", $description);

        $price = "Sale price";
        $I->fillField("[name=price]", $price);

        $available = "Invalid Text";
        $I->fillField("[name=available]", $available);

        $weight = "Not a valid weight";
        $I->fillField("[name=weight]", $weight);

        $I->click("[test=add-product-submit-button]");

        $I->see("The value for sku can only contain letters, numbers, dashes, and/or underscores");
        $I->see("The value for price can only contain numerical values");
        $I->see("The value for available can only contain digits");
        $I->see("The value for weight can only contain numerical values");
    }
}
