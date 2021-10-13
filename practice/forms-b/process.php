<?php

session_start();

$answer = $_POST['answer'];

$haveAnswer = true;

if ($answer == "") {
    $haveAnswer = false;
} else if ($answer == 'pumpkin') {
    $correct = true;
} else {
    $correct = false;
}

$_SESSION["results"] = [
    "haveAnswer" => $haveAnswer,
    "correct" => $correct
];

header('Location: done.php');