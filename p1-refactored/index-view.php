<!doctype html>
<html lang='en'>

<head>
    <title>War (card game) Simulator</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="header-bg">
        <h1>War (card game) Simulator</h1>

        <div class="row">
            <div class="col">
                <h2>Mechanics</h2>

                <ul>
                    <li>Each player starts with half the deck (26 cards), shuffled in a random order.</li>
                    <li>For each round, a card is picked from the “top” of each player’s cards.</li>
                    <li>Whoevers card is highest wins that round and keeps both cards.</li>
                    <li>If the two cards are of the same value, it’s a tie and those cards are discarded.</li>
                    <li>The player who ends up with 0 cards is the loser.</li>
                </ul>
            </div>
            <div class="col">
                <h2>Results</h2>

                <ul>
                    <li class="results-item">Rounds played: 
                        <span class="rounds">
                            <?php echo count($rounds) ?>
                        </span>
                    </li>
                    <li class="results-item">Winner:
                        <span class="winner">
                            <?php echo $winner ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-bg">
        <h2>Rounds</h2>

        <section>
            <header class="header">
                <div class="col center">Round #</div>
                <div class="col center">Player 1 Card</div>
                <div class="col center">Player 2 Card</div>
                <div class="col center">Winner</div>
                <div class="col center">Player 1 Cards Left</div>
                <div class="col center">Player 2 Cards Left</div>
            </header>
            <?php foreach($rounds as $round) { ?>
            <div class="row">
                <div class="col center"><?php echo $round["Round"]; ?></div>
                <div class="col center">
                    <div class="card <?php echo $round["P1DrawColor"]; ?>">
                        <?php echo $round["P1DrawRank"]." ".$round["P1DrawSuitSymbol"]; ?>
                    </div>
                </div>
                <div class="col center">
                    <div class="card <?php echo $round["P2DrawColor"]; ?>">
                        <?php echo $round["P2DrawRank"]." ".$round["P2DrawSuitSymbol"]; ?>
                    </div>
                </div>
                <div class="col center"><?php echo $round["RoundWinner"]; ?></div>
                <div class="col center"><?php echo $round["P1CardsCount"]; ?></div>
                <div class="col center"><?php echo $round["P2CardsCount"]; ?></div>
            </div>
            <?php } ?>
        </section>
    </div>
</body>

</html>