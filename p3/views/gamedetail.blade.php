@extends('templates/master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s5 center">
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
                                        <label><input type="radio" name="CB"  disabled="disabled" value="<?php echo $letter . $i; ?>"><span></span></label>
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
        <div class="row">
            <div class="col s12 center">
                <button class="pushable" onclick="location.href='/games';">
                    <span class="shadow"></span>
                    <span class="edge-alternate"></span>
                    <span class="front-alternate">
                        <i class="material-icons">arrow_back</i><br>Go Back to Games Played
                    </span>
                </button>
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
                <h5 class="white-text">Game Information</h5>
                <p class="grey-text text-lighten-4">
                    <ul>
                        <li><span class="grey-text text-lighten-1">Player Nickname:</span> <span class="bold">{{ $playerNickname }}</span></li>
                        <li><span class="grey-text text-lighten-1">Difficulty:</span> <span class="bold">{{ $difficulty }}</span></li>
                        <li><span class="grey-text text-lighten-1">Winner:</span> <span class="bold">{{ $winner }}</span></li>
                        <li><span class="grey-text text-lighten-1">Game started on:</span> <span class="bold">{{ date('m/d/y  H:i:s A', strtotime($startedOn)) }}</span></li>
                        <li><span class="grey-text text-lighten-1">Game ended on:</span> <span class="bold">{{ date('m/d/y  H:i:s A', strtotime($endedOn)) }}</span></li>
                    </ul>
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Resources utilized:</h5>
                <ul>
                    <li><a  class="grey-text text-lighten-3 underline"
                            href="https://en.wikipedia.org/wiki/Battleship_(game)"
                            target="_blank">Inspiration - Battleship game</a></li>
                    <li><a  class="grey-text text-lighten-3 underline"
                            href="https://materializecss.com/"
                            target="_blank">CSS - Materialize</a></li>
                    <li><a  class="grey-text text-lighten-3 underline"
                            href="https://cssgradient.io/"
                            target="_blank">CSS - Gradients</a></li>
                    <li><a  class="grey-text text-lighten-3 underline"
                            href="https://codepen.io/ryandsouza13/pen/yEBJQV"
                            target="_blank">CSS - 3D Text</a></li>
                    <li><a  class="grey-text text-lighten-3 underline"
                            href="https://www.joshwcomeau.com/animation/3d-button/"
                            target="_blank">CSS - 3D Button</a></li>
                    <li><a  class="grey-text text-lighten-3 underline"
                            href="https://www.florin-pop.com/blog/2019/03/css-pulse-effect/"
                            target="_blank">CSS - Pulsating Labels</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection