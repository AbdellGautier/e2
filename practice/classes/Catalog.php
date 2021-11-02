<?php

class Catalog
{
    # Properties
    public $products = [];

    # Methods
    public function __construct(string $jsonSource)
    {
        # Load the JSON string of data
        $json = file_get_contents($jsonSource);

        # Convert the JSON string into an array
        $this->products = json_decode($json, true);
    }

    public function getById(int $id)
    {
        return $this->products[$id] ?? null;
    }

    public function getAll()
    {
        return $this->products;
    }

    public function searchByName(string $term)
    {
        $results = [];
        foreach ($this->products as $product) {
            if (strstr(strtolower($product['name']), strtolower($term))) {
                $results[] = $product;
            }
        }

        return $results;
    }
}
