@extends('templates/master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 center">
                <div class="row">
                    <div class="col s12">
                        <h2 class="bold">Can you sink the enemy submarines first?</h2>
                    </div>
                </div>
                <form method="POST" action="/play">
                <div class="row">
                    <div class="col s3"></div>
                    <div class="col s6">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="Player_Nickname" name="Player_Nickname" type="text" maxlength="25" class="validate" required>
                                <label for="Player_Nickname">Player Nickname (for scores)</label>
                                <span class="helper-text" data-error="Please specify your Nickname (for scorekeeping)."></span>
                            </div>
                            <div class="input-field col s6 valign-wrapper">
                                <a class="underline" href="javascript:void(0)" onclick="getFunkyNickname();">&larr;&nbsp;Give me a funky nickname!</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <label>
                                    <input name="Difficulty" type="radio" value="Easy" checked />
                                    <span>Easy - <span class="difficulty-hint">1 Large Submarine</span></span>
                                </label>
                            </div>
                            <div class="col s6">
                                <label>
                                    <input name="Difficulty" type="radio" value="Hard" />
                                    <span>Hard - <span class="difficulty-hint">1 Tiny Submarine Capsule</span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col s3"></div>
                </div>
                @if ($app->errorsExist())
                    <br>
                    <span>Fix the issue(s) highlighted below:</span>
                    <ul class='hard'>
                        @foreach ($app->errors() as $error)
                            <li><i class="material-icons icon-valign">error</i>&nbsp;{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="row">
                    <div class="col s12 center">
                        &nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center">
                        &nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center">
                        <?php if (strlen($winner) > 0) { ?>
                        <button class="pushable" name="btnRecords">
                            <span class="shadow"></span>
                            <span class="edge"></span>
                            <span class="front">
                                <i class="material-icons">refresh</i><br>Play Again
                            </span>
                        </button>
                        <?php } else { ?>
                        <button class="pushable" name="btnLaunchMissile"
                            onclick="return validateGameLaunch();">
                            <span class="shadow"></span>
                            <span class="edge"></span>
                            <span class="front">
                                <i class="material-icons">videogame_asset</i><br>Play Game
                            </span>
                        </button>
                        <?php } ?>
                    </div>
                </div>
                </form>
                <div class="row">
                    <div class="col s12 center">
                        &nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center">
                        <button type="submit" class="pushable" onclick="location.href='/games';">
                            <span class="shadow"></span>
                            <span class="edge-alternate"></span>
                            <span class="front-alternate">
                                <i class="material-icons">schedule</i><br>View Games Played
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
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
                <h5 class="white-text">Resources utilized:</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3 underline" href="https://en.wikipedia.org/wiki/Battleship_(game)"
                            target="_blank">Inspiration - Battleship game</a></li>
                    <li><a class="grey-text text-lighten-3 underline" href="https://materializecss.com/" target="_blank">CSS
                            - Materialize</a></li>
                    <li><a class="grey-text text-lighten-3 underline" href="https://cssgradient.io/" target="_blank">CSS -
                            Gradients</a></li>
                    <li><a class="grey-text text-lighten-3 underline" href="https://codepen.io/ryandsouza13/pen/yEBJQV"
                            target="_blank">CSS - 3D Text</a></li>
                    <li><a class="grey-text text-lighten-3 underline"
                            href="https://www.joshwcomeau.com/animation/3d-button/" target="_blank">CSS - 3D Button</a></li>
                    <li><a class="grey-text text-lighten-3 underline"
                            href="https://www.florin-pop.com/blog/2019/03/css-pulse-effect/" target="_blank">CSS - Pulsating
                            Labels</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
