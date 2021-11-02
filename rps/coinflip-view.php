<!doctype html>
<html lang='en'>

<head>
    <title>Coin Flip - MyGame Child Class</title>
    <meta charset='utf-8'>
</head>

<body>

    <h1>Coin Flip Game - MyGame Child Class</h1>

    <h2>Mechanics</h2>
    <ul>
        <li>Player randomly picks a coin side - heads or tails.</li>
        <li>A coin is randomly “flipped”, “landing” on either heads or tails.</li>
        <li>If the coin landed on the same side Player chose, they win.</li>
        <li>Otherwise, the Computer wins.</li>
    </ul>

    <h2>Results</h2>
    <ul>
        <li>Player picks: <?php echo $playerSideSelected; ?></li>
        <li>Outcome: <?php echo $outcome; ?></li>
    </ul>

</body>

</html>