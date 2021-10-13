<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <style>
        .correct {
            color: #0a0;
        }

        .incorrect {
            color: #f00;
        }
    </style>
</head>

<body>
    <h1>Results</h1>

    <?php if ($haveAnswer == false) { ?>
        Please enter an answer
    <?php } else if($correct) { ?>
        <div class="correct">That's correct, wohooo! =)</div>
    <?php } else { ?>
        <div class="incorrect">Wrong answer, oopsie daisy!</div>
    <?php } ?>

    <a href="index.php">Play again --></a>
</body>

</html>