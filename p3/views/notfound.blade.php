@extends('templates/master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 center">
                <div class="center">
                    <div class="row">
                        <div class="col s12">
                            <h2 class="bold">Game Not Found</h2>
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
                <div class="row">
                    <div class="col s12 center">
                        &nbsp;
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