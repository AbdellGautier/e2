<?php

$moves = ['rock', 'paper', 'scissors']; # Array of strings

$strawLengths = [2, 2, 2, 2, 2, 1];

$mixed = ['rock', 1, .04, true];

// echo $moves[0]; # 'rock'
// echo $moves[1];
// echo $moves[2];
// echo $moves[3];
// var_dump($moves);

$randomNumber = rand(0, 2);

$move = $moves[$randomNumber];

# Associative arrays
$coin_values = [
    'penny' => .01,
    'nickel' => .05,
    'dime' => .10,
    'quarter' => .25
];

$coin_counts = [
    'penny' => 100,
    'nickel' => 25,
    'dime' => 100,
    'quarter' => 34
];

$coins = [
    'penny' => [
        "count" => 100, "value" => .01
    ],
    'nickel' => [
        "count" => 25, "value" => .05
    ],
    'dime' => [
        "count" => 100, "value" => .10
    ],
    'quarter' => [
        "count" => 34, "value" => .25
    ],
    'halfDollar' => [
        "count" => 10, "value" => .50
    ]
];

$total = 0;

foreach ($coins as $coin => $info) {
    $total = $total + ($info["count"] * $info["value"]);
}

// var_dump($total);

$cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];

shuffle($cards);

$playerCards = [];
$computerCards = [];

// Assign the cards
for ($i = 0; $i < count($cards); $i++) {
    if ($i % 2 == 0) {
        // Assign player the evenly 
        // positioned cards from the shuffled deck
        array_push($playerCards, $cards[$i]);
    } else {
        // Assign the computer the oddly
        // positioned cards from the shuffled deck
        array_push($computerCards, $cards[$i]);
    }
}

echo "Shuffled Cards: ", implode(",", $cards);
echo "<br><br>";
echo "Player Cards: ", implode(",", $playerCards);
echo "<br>";
echo "Computer Cards: ", implode(",", $computerCards);
echo "<br><br>";

// Player and Computer draw a card
$playerDraw = array_pop($playerCards);
$computerDraw = array_pop($computerCards);

echo "Player First Draw: ", $playerDraw;
echo "<br>";
echo "Computer First Draw: ", $computerDraw;
echo "<br><br>";
echo "Player Cards: ", implode(",", $playerCards);
echo "<br>";
echo "Computer Cards: ", implode(",", $computerCards);
