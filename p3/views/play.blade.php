@extends('templates/master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s5 center">
                <form method="POST" action="/launchmissile">
                    <div class="center">
                        <div class="row">
                            <div class="col s12">
                                <?php if ($winner == "Player") { ?>
                                    <h2 class="bold winner">Computer Submarine Region (Winner: Player)</h2>
                                <?php } elseif ($winner == "Tie") { ?>
                                    <h2 class="bold tie">Computer Submarine Region (Tie: Player)</h2>
                                <?php } else { ?>
                                    <h2 class="bold">Computer Submarine Region</h2>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s3"></div>
                            <?php foreach (range('A', 'H') as $letter) { ?>
                                <div class="col s1 option"><?php echo $letter; ?></div>
                            <?php } ?>
                        </div>
                        <?php for ($i = 1; $i <= 8; $i++) { ?>
                            <div class="row">
                                <div class="col s3"><?php echo $i; ?></div>
                                <?php foreach (range('A', 'H') as $letter) { ?>
                                    <?php if ($computerBoard[$letter . $i] == "H") { ?>
                                        <div class="col s1 option sub-hit">
                                            <label><input type="radio" name="CB" disabled="disabled"><span></span></label>
                                        </div>
                                    <?php } else if ($computerBoard[$letter . $i] == "M") { ?>
                                        <div class="col s1 option miss">
                                            <label><input type="radio" name="CB" disabled="disabled"><span></span></label>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col s1 option">
                                            <label><input type="radio" name="CB" value="<?php echo $letter . $i; ?>"><span></span></label>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            <?php if (!empty($winner)) { ?>
                                <button class="pushable" name="btnPlayAgain">
                                    <span class="shadow"></span>
                                    <span class="edge"></span>
                                    <span class="front">
                                        <i class="material-icons">refresh</i><br>Play Again
                                    </span>
                                </button>
                            <?php } else { ?>
                                <button class="pushable" name="btnLaunchMissile" onclick="return validateMissileLaunch();">
                                    <span class="shadow"></span>
                                    <span class="edge"></span>
                                    <span class="front">
                                        <i class="material-icons">arrow_upward</i><br>Launch Missile
                                    </span>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            &nbsp;
                        </div>
                    </div>
                </form>
                <form method="POST" action="/abandon">
                    <div class="row">
                        <div class="col s12 center">
                            @if (!empty($winner))
                                <button type="submit" class="pushable">
                                    <span class="shadow"></span>
                                    <span class="edge-alternate"></span>
                                    <span class="front-alternate">
                                        <i class="material-icons">arrow_upward</i><br>Exit Game
                                    </span>
                                </button>
                            @else
                                <button type="submit" class="pushable">
                                    <span class="shadow"></span>
                                    <span class="edge-alternate"></span>
                                    <span class="front-alternate">
                                        <i class="material-icons">flag</i><br>Abandon Game
                                    </span>
                                </button>
                            @endif
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
                                <h2 class="bold winner">Player Submarine Region (Winner: Computer)</h2>
                            <?php } elseif ($winner == "Tie") { ?>
                                <h2 class="bold tie">Player Submarine Region (Tie: Computer)</h2>
                            <?php } else { ?>
                                <h2 class="bold">Player Submarine Region</h2>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col s3"></div>
                        <?php foreach (range('A', 'H') as $letter) { ?>
                            <div class="col s1 option"><?php echo $letter; ?></div>
                        <?php } ?>
                    </div>
                    <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <div class="row">
                            <div class="col s3"><?php echo $i; ?></div>
                            <?php foreach (range('A', 'H') as $letter) { ?>
                                <?php if ($playerBoard[$letter . $i] == "S") { ?>
                                    <div class="col s1 option sub-present">
                                        <label><input class="no-pointer" type="radio" name="PB" disabled="disabled"><span></span></label>
                                    </div>
                                <?php } elseif ($playerBoard[$letter . $i] == "H") { ?>
                                    <div class="col s1 option sub-hit">
                                        <label><input class="no-pointer" type="radio" name="PB" disabled="disabled"><span></span></label>
                                    </div>
                                <?php } else if ($playerBoard[$letter . $i] == "M") { ?>
                                    <div class="col s1 option miss">
                                        <label><input class="no-pointer" type="radio" name="PB" disabled="disabled"><span></span></label>
                                    </div>
                                <?php } else { ?>
                                    <div class="col s1 option">
                                        <label><input class="no-pointer" type="radio" name="PB" disabled="disabled"><span></span></label>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("footer")
    <div class="container">
        <div class="row">
            <div class="col s12">
            </div>
        </div>
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Instructions</h5>
                <p class="grey-text text-lighten-4">
                    <ol>
                        <li>Player and computer each have one submarine, randomly placed.</li>
                        <li>Select a location on the computer's board (left) and launch the missile</li>
                        <li>If you hit the computer's submarine, a red mark will appear</li>
                        <li>The computer will try to hit your submarine (right) as well</li>
                        <li>The one who hits the entire submarine first win!</li>
                    </ol>
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Game Information</h5>
                <p class="grey-text text-lighten-4">
                    <ul>
                        <li><span class="grey-text text-lighten-1">Player Nickname:</span> <span class="bold">{{ $playerNickname }}</span></li>
                        <li><span class="grey-text text-lighten-1">Difficulty:</span> <span class="bold">{{ $difficulty }}</span></li>
                        <li><span class="grey-text text-lighten-1">Game started on:</span> <span class="bold">{{ date('m/d/y  H:i:s A', strtotime($startedOn)) }}</span></li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
@endsection