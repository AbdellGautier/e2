<?php

namespace App;

class Games
{
    # Properties
    public $games = [];

    # Methods
    public function __construct($dataSource)
    {
        $json = file_get_contents($dataSource);
        $this->games = json_decode($json, true);
    }

    public function getAll()
    {
        return $this->games;
    }

    public function getById(int $id)
    {
        return $this->games[$id] ?? null;
    }
}