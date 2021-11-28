<?php

namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $products = $this->app->db()->all("products");

        return $this->app->view("Products/index", ["products" => $products]);
    }

    public function show()
    {
        $sku = $this->app->param("sku");

        if (is_null($sku)) {
            $this->app->redirect("/products");
        }

        $productQuery = $this->app->db()->findByColumn("products", "sku", "=", $sku);

        if (empty($productQuery)) {
            return $this->app->view('Products/missing');
        } else {
            $product = $productQuery[0];
            $product_id = $product["id"];
        }

        $reviewSaved = $this->app->old("reviewSaved");

        $reviewsQuery = $this->app->db()->findByColumn("reviews", "product_id", "=", $product_id);

        if (empty($reviewsQuery)) {
            $reviews = [];
        } else {
            $reviews = $reviewsQuery;
        }

        return $this->app->view("Products/show", [
            "product" => $product,
            "reviews" => $reviews,
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
            'product_id' => 'required',
            'sku' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200'
        ]);

        // If the above validation checks fail
        // The user is redirected back to where they came from (/product)
        // None of the code that follows will be executed

        $product_id = $this->app->input("product_id");
        $sku = $this->app->input("sku");
        $name = $this->app->input("name");
        $review = $this->app->input("review");

        $this->app->db()->insert("reviews", [
            "product_id" => $product_id,
            "name" => $name,
            "review" => $review,
			'submitted_date' => date('Y-m-d H:i:s')
        ]);

        return $this->app->redirect("/product?sku=" . $sku, ["reviewSaved" => true]);
    }
}
