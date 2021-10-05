<!doctype html>
<html lang='en'>

<head>
    <title>War (card game) Simulator</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>War (card game) Simulator</h1>

    <h2>Mechanics</h2>

    <ul>
        <li>Each player starts with half the deck (26 cards), shuffled in a random order.</li>
        <li>For each round, a card is picked from the “top” of each player’s cards.</li>
        <li>Whoevers card is highest wins that round and keeps both cards.</li>
        <li>If the two cards are of the same value, it’s a tie and those cards are discarded.</li>
        <li>The player who ends up with 0 cards is the loser.</li>
    </ul>

    <h2>Results</h2>

    <ul>
        <li>Rounds played: <?php echo count($rounds) ?></li>
        <li>Winner:
            <span class="winner">
                <?php echo $winner ?>
            </span>
        </li>
    </ul>

    <h2>Rounds</h2>

    <section>
        <header>
            <div class="col">Round #</div>
            <div class="col">Player 1 Card</div>
            <div class="col">Player 2 Card</div>
            <div class="col">Winner</div>
            <div class="col">Player 1 Cards Left</div>
            <div class="col">Player 2 Cards Left</div>
        </header>
        <?php foreach($rounds as $round) { ?>
        <div class="row">
            <div class="col"><?php echo $round["Round"]; ?></div>
            <div class="col">
                <div class="card <?php echo $round["P1DrawColor"]; ?>">
                    <?php echo $round["P1DrawRank"]; ?>
                </div>
            </div>
            <div class="col">
            <div class="card <?php echo $round["P2DrawColor"]; ?>">
                    <?php echo $round["P2DrawRank"]; ?>
                </div>
            </div>
            <div class="col"><?php echo $round["RoundWinner"]; ?></div>
            <div class="col"><?php echo $round["P1CardsCount"]; ?></div>
            <div class="col"><?php echo $round["P2CardsCount"]; ?></div>
        </div>
        <?php } ?>
    </section>
</body>

</html>