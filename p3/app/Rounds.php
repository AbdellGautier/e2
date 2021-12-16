<?php

namespace App;

class Rounds
{
    # Properties
    public $rounds = [];

    # Methods
    public function __construct($dataSource)
    {
        $json = file_get_contents($dataSource);
        $this->rounds = json_decode($json, true);
    }

    public function getAll()
    {
        return $this->rounds;
    }

    public function getById(int $id)
    {
        return $this->rounds[$id] ?? null;
    }

    public function getBySku(string $sku)
    {
        $productId = array_search($sku, array_column($this->rounds, 'sku', 'id'));
        return $this->getById($productId);
    }
}