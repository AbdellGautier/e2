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

        # Set up all the variables we need to make a connection
        $host = $this->app->env('DB_HOST');
        $database = $this->app->env('DB_NAME');
        $username = $this->app->env('DB_USERNAME');
        $password = $this->app->env('DB_PASSWORD');

        # DSN (Data Source Name) string
        # contains the information required to connect to the database
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

        # Driver-specific connection options
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            # Create a PDO instance representing a connection to a database
            $pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        $sqlTemplate = "INSERT INTO reviews (sku, name, review, submitted_date) 
        VALUES (:sku, :name, :review, :submitted_date)";

        $values = [
            'sku' => $sku,
            'name' => $name,
            'review' => $review,
            'submitted_date' => date('Y-m-d H:i:s'),
        ];

        $statement = $pdo->prepare($sqlTemplate);
        $statement->execute($values);

        return $this->app->redirect("/product?sku=" . $sku, ["reviewSaved" => true]);
    }
}
