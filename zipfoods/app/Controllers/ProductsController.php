<?php

namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $productsObj = new Products($this->app->path("/database/products.json"));
        $products = $productsObj->getAll();

        return $this->app->view("Products/index", ["products" => $products]);
    }
}
