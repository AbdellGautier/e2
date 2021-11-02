<?php

require 'Number.php';
require 'EvenNumber.php';
require 'Debug.php';

use HES\Number;
use HES\EvenNumber;
use HES\Debug;

$example1 = new Number(9);
$example2 = new EvenNumber(20);

// var_dump($example1->isValid()); // true
// var_dump($example2->isValid()); // true

// $debug = new Debug();
// $debug->dump("Hello World");

Debug::dump([1, 2, 3, ["Chocolate", "Vanilla", "Strawberry"]]);