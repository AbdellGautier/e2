<?php

namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{

    private $productsObj;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->productsObj = new Products($this->app->path("/database/products.json"));
    }

    public function index()
    {
        $products = $this->productsObj->getAll();

        return $this->app->view("Products/index", ["products" => $products]);
    }

    public function show()
    {
        $sku = $this->app->param("sku");

        if (is_null($sku)) {
            $this->app->redirect("/products");
        }

        $product = $this->productsObj->getBySku($sku);

        if (is_null($product)) {
            return $this->app->view('Products/missing');
        }

        $reviewSaved = $this->app->old("reviewSaved");

        return $this->app->view("Products/show", [
            "product" => $product,
            "reviewSaved" => $reviewSaved
        ]);
    }

    public function missing()
    {
        return $this->app->view("Products/missing");
    }

    public function saveReview()
    {
        $this->app->validate([
            'sku' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200'
        ]);

        // If the above validation checks fail
        // The user is redirected back to where they came from (/product)
        // None of the code that follows will be executed

        $sku = $this->app->input("sku");
        $name = $this->app->input("name");
        $review = $this->app->input("review");

        // Todo: Persist review to the database

        return $this->app->redirect("/product?sku=" . $sku, ["reviewSaved" => true]);
    }
}
