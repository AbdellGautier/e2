<?php
session_start();

// Protect against deliberate calls directly to this page
if ($_SESSION["gameInfo"] != null) {
    $answer = $_POST['answer'];

    $haveAnswer = true;

    if ($answer == "") {
        $haveAnswer = false;
    } else if ($answer == $_SESSION["gameInfo"]["word"]) {
        $correct = true;
    } else {
        $correct = false;
    }

    $_SESSION["results"] = [
        "haveAnswer" => $haveAnswer,
        "correctWord" => $_SESSION["gameInfo"]["word"],
        "correct" => $correct
    ];
}

header('Location: index.php');