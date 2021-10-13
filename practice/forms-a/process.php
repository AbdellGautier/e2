<?php

$answer = $_POST['answer'];

$haveAnswer = true;

if ($answer == "") {
    $haveAnswer = false;
} else if ($answer == 'pumpkin') {
    $correct = true;
} else {
    $correct = false;
}

require 'process-view.php';