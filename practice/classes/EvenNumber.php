<?php

namespace HES;

class EvenNumber extends Number
{
    public $num;

    public function __construct($num)
    {
        $this->num = $num;
    }

    public function getHalf()
    {
        return $this->num / 2;
    }

    public function isValid()
    {
        parent::test();
        return parent::isValid() and $this->num % 2 == 0;
    }
}
