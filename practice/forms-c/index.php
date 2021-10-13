<?php

session_start();

$words = [
    'evidence' => 'A discovery that helps solve a crime',
    'ponder' => 'To think carefully about something',
    'locate' => 'Discover the exact place or position of something or someone',
    'abridge' => 'to shorten by leaving out some parts',
    'regulate' => 'to make rules or laws that control something',
    'modest' => 'not overly proud or confident',
    'impromptu' => 'not prepared ahead of time',
    'stint' => 'a period of time spent at a particular activity',
    'tranquil' => 'free from disturbance or turmoil',
    'mutiny' => 'a turning of a group against a person in charge'
];

// Select a random word from the array
$word = array_rand($words);
$wordHint = $words[$word];

// Shuffle our selected word
$shuffledWord = str_shuffle($word);

$_SESSION["gameInfo"] = [
    "word" => $word,
    "wordHint" => $wordHint
];

if ($_SESSION["results"] != null) {
    // Since we got a submission,
    // configure the local variables for display
    $results = $_SESSION["results"];

    $haveAnswer = $results["haveAnswer"];
    $correctWord = $results["correctWord"];
    $correct = $results["correct"];
    
    $_SESSION["results"] = null;
}

require 'index-view.php';