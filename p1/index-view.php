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
        <li>Rounds played: <?php echo $roundsPlayed ?></li>
        <li>Winner:
            <span class="winner">
                <?php echo $winner ?>
            </span>
        </li>
    </ul>

    <h2>Rounds</h2>

    <ul class="container">
        <li>Round #</li>
        <li>Player 1 Card</li>
        <li>Player 2 Card</li>
        <li>Winner</li>
        <li>Player 1 Cards Left</li>
        <li>Player 2 Cards Left</li>
    </ul>
    <ul class="container">
        <li>1</li>
        <li>
            <div class="card red">5 ♠</div>
        </li>
        <li>
            <div class="card">3 ♣</div>
        </li>
        <li>Player 1</li>
        <li>25</li>
        <li>21</li>
    </ul>
    <ul class="container">
        <li>2</li>
        <li>
            <div class="card red">Q ♦</div>
        </li>
        <li>
            <div class="card">2 ♥</div>
        </li>
        <li>Player 2</li>
        <li>24</li>
        <li>22</li>
    </ul>
</body>

</html>