<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 2 - Submarine Attack</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a class="title">&nbsp;&nbsp;Submarine Attack</a>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s5 center">
                    <form method="POST" action="process.php">
                        <div class="center">
                            <div class="row">
                                <div class="col s12">
                                    <?php if ($winner == "Player") { ?>
                                        <h5 class="bold">Computer Submarine Region <span class="winner">Winner</span></h5>
                                    <?php } elseif ($winner == "Tie") { ?>
                                        <h5 class="bold">Computer Submarine Region <span class="tie">Tie</span></h5>
                                    <?php } else { ?>
                                        <h5 class="bold">Computer Submarine Region</h5>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s3"></div>
                                <?php foreach (range('A', 'H') as $letter) { ?>
                                    <div class="col s1"><?php echo $letter; ?></div>
                                <?php } ?>
                            </div>
                            <?php for ($i = 1; $i <= 8; $i++) { ?>
                                <div class="row">
                                    <div class="col s3"><?php echo $i; ?></div>
                                    <?php foreach (range('A', 'H') as $letter) { ?>
                                        <?php if ($computerBoard[$letter . $i] == "H") { ?>
                                            <div class="col s1 submarine-hit">
                                                <label><input type="radio" name="CB" disabled="disabled"><span></span></label>
                                            </div>
                                        <?php } else if ($computerBoard[$letter . $i] == "M") { ?>
                                            <div class="col s1 miss">
                                                <label><input type="radio" name="CB" disabled="disabled"><span></span></label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col s1">
                                                <label><input type="radio" name="CB" value="<?php echo $letter . $i; ?>"><span></span></label>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col s12 center">
                                <?php if (strlen($winner) > 0) { ?>
                                    <button class="pushable" name="btnPlayAgain">
                                        <span class="shadow"></span>
                                        <span class="edge"></span>
                                        <span class="front">
                                            <i class="material-icons">refresh</i><br>Play Again
                                        </span>
                                    </button>
                                <?php } else { ?>
                                    <button class="pushable" name="btnLaunchMissile">
                                        <span class="shadow"></span>
                                        <span class="edge"></span>
                                        <span class="front">
                                            <i class="material-icons">arrow_upward</i><br>Launch Missile
                                        </span>
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s2">
                    <div class="vertical-line"></div>
                </div>
                <div class="col s5 center">
                    <div class="center">
                        <div class="row">
                            <div class="col s12">
                                <?php if ($winner == "Computer") { ?>
                                    <h5 class="bold">Player Submarine Region <span class="winner">Winner</span></h5>
                                <?php } elseif ($winner == "Tie") { ?>
                                    <h5 class="bold">Player Submarine Region <span class="tie">Tie</span></h5>
                                <?php } else { ?>
                                    <h5 class="bold">Player Submarine Region</h5>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col s3"></div>
                            <?php foreach (range('A', 'H') as $letter) { ?>
                                <div class="col s1"><?php echo $letter; ?></div>
                            <?php } ?>
                        </div>
                        <?php for ($i = 1; $i <= 8; $i++) { ?>
                            <div class="row">
                                <div class="col s3"><?php echo $i; ?></div>
                                <?php foreach (range('A', 'H') as $letter) { ?>
                                    <?php if ($playerBoard[$letter . $i] == "S") { ?>
                                        <div class="col s1 submarine-present">
                                            <label><input type="radio" name="PB" disabled="disabled"><span></span></label>
                                        </div>
                                    <?php } elseif ($playerBoard[$letter . $i] == "H") { ?>
                                        <div class="col s1 submarine-hit">
                                            <label><input type="radio" name="PB" disabled="disabled"><span></span></label>
                                        </div>
                                    <?php } else if ($playerBoard[$letter . $i] == "M") { ?>
                                        <div class="col s1 miss">
                                            <label><input type="radio" name="PB" disabled="disabled"><span></span></label>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col s1">
                                            <label><input type="radio" name="PB" disabled="disabled"><span></span></label>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s12">
                </div>
            </div>
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">How to Play?</h5>
                    <p class="grey-text text-lighten-4">
                        <ol>
                            <li>Both, the player and computer each have one submarine</li>
                            <li>Player selects a location on the computer board (left) and launch the missile</li>
                            <li>If Player hit the computer's submarine, the board will indicate it, otherwise it will be a missed shot.</li>
                            <li>The computer will try to hit the player's submarine as well</li>
                            <li>The one who hits the entire submarine will win!</li>
                        </ol>
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Resources utilized:</h5>
                    <ul>
                        <li><a  class="grey-text text-lighten-3 underline"
                                href="https://en.wikipedia.org/wiki/Battleship_(game)"
                                target="_blank">Inspired by the Battleship game</a></li>
                        <li><a  class="grey-text text-lighten-3 underline"
                                href="https://materializecss.com/"
                                target="_blank">Materialize CSS</a></li>
                        <li><a  class="grey-text text-lighten-3 underline"
                                href="https://www.joshwcomeau.com/animation/3d-button/"
                                target="_blank">Big 3D Button</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>