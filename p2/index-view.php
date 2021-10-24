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
            <a href="#" class="title">&nbsp;&nbsp;Submarine Attack</a>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s6">
                    <form method="POST" action="process.php">
                        <div class="center">
                            <div class="row">
                                <div class="col s12">
                                    <h5>Computer Submarine Board</h5>
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
                                        <?php if ($playerBoard[$letter . $i] == "H") { ?>
                                            <div class="col s1 submarine-hit">
                                                <label><input type="radio" name="PB" value="<?php echo $letter . $i; ?>"><span></span></label>
                                            </div>
                                        <?php } else if ($playerBoard[$letter . $i] == "M") { ?>
                                            <div class="col s1 miss">
                                                <span>Miss</span>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col s1">
                                                <label><input type="radio" name="PB" value="<?php echo $letter . $i; ?>"><span></span></label>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col s12 center">
                                <button class="pushable">
                                    <span class="shadow"></span>
                                    <span class="edge"></span>
                                    <span class="front">
                                        <i class="material-icons">arrow_upward</i><br>Launch Missile
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s6 right-align" style="padding-top: 10px">
                    <div class="center">
                        <div class="row">
                            <div class="col s12">
                                <h5>Your Submarine Board</h5>
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
                                    <?php if ($computerBoard[$letter . $i] == "S") { ?>
                                        <div class="col s1 submarine-present">
                                            <label><input type="radio" name="PB" value="<?php echo $letter . $i; ?>"><span></span></label>
                                        </div>
                                    <?php } elseif ($computerBoard[$letter . $i] == "H") { ?>
                                        <div class="col s1 submarine-hit">
                                            <label><input type="radio" name="PB" value="<?php echo $letter . $i; ?>"><span></span></label>
                                        </div>
                                    <?php } else if ($playerBoard[$letter . $i] == "M") { ?>
                                        <div class="col s1 miss">
                                            <span>Miss</span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col s1">
                                            <label><input type="radio" name="PB" value="<?php echo $letter . $i; ?>"><span></span></label>
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
                <div class="col l6 s12">
                    <h5 class="white-text">Project 2 - DGMD E-2</h5>
                    <p class="grey-text text-lighten-4">
                        Project 2 game assignment for the Web Programming for Beginners using PHP course at the Harvard Extension School.
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
        <div class="footer-copyright">
            <div class="container">
                Thanks Professor Buck =)
            </div>
        </div>
    </footer>
</body>
</html>