<!doctype html>
<html lang='en'>

<head>
    <title>Rock, Paper, Scissors</title>
    <meta charset='utf-8'>
</head>

<body>

    <h1>Rock Paper Scissors Game Simulator</h1>

    <h2>Mechanics</h2>
    <ul>
        <li>Player A and Player B randomly “throw” either Rock, Paper or Scissors.
        <li>A tie is declared if both players throw the same move.
        <li>Otherwise: Rock beats Scissors, Scissors beats Paper, Paper beats Rock.</li>
    </ul>

    <h2>Results</h2>
    <ul>
        <li>Player A threw: <?php echo $playerMove; ?></li>
        <li>Computer threw: <?php echo $computerMove; ?></li>
        <li>
            Player A outcome: <?php echo $outcome; ?>
        </li>
    </ul>

</body>

</html>