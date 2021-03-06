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

    public function new()
    {
        $productSaved = $this->app->old("productSaved");
        $sku = $this->app->old("sku");

        return $this->app->view("Products/new", [
            "productSaved" => $productSaved,
            "sku" => $sku
        ]);
    }

    public function saveProduct()
    {
        $this->app->validate([
            'name' => 'required',
            'sku' => 'required|alphaNumericDash',
            'description' => 'required',
            'price' => 'required|numeric',
            'available' => 'required|digit',
            'weight' => 'required|numeric'
        ]);

        // If the above validation checks fail
        // The user is redirected back to where they came from (/product)
        // None of the code that follows will be executed

        $name = $this->app->input("name");
        $sku = $this->app->input("sku");
        $description = $this->app->input("description");
        $price = $this->app->input("price");
        $available = $this->app->input("available");
        $weight = $this->app->input("weight");
        $perishable = ($this->app->input("perishable") == true) ? 1: 0; // Convert to DB value

        $this->app->db()->insert("products", [
            "name" => $name,
            "sku" => $sku,
            "description" => $description,
            "price" => $price,
            "available" => $available,
            "weight" => $weight,
            "perishable" => $perishable
        ]);

        return $this->app->redirect("/products/new", [
            "productSaved" => true,
            "sku" => $this->app->input('sku')
        ]);
    }
}
