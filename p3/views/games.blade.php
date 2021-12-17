@extends('templates/master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 center">
                <div class="center">
                    <div class="row">
                        <div class="col s12">
                            <h2 class="bold">Games History</h2>
                        </div>
                    </div>
                    @if (empty($games) != true)
                        <div class="row">
                            <div class="col s3 bold left-align">Player Nickname</div>
                            <div class="col s1 bold">Difficulty</div>
                            <div class="col s2 bold">Winner</div>
                            <div class="col s2 bold">View Game</div>
                            <div class="col s2 bold">Started On</div>
                            <div class="col s2 bold">Ended On</div>
                        </div>
                        @foreach ($games as $game)
                            <div class="row">
                                <div class="col s12">
                                    <div class="divider"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s3 left-align">{{ $game['player_nickname'] }}</div>
                                <div class="col s1">
                                    @if ($game['difficulty'] == 'Easy')
                                        <span class="easy smaller">
                                            <i class="material-icons icon-valign">child_care</i>&nbsp;{{ $game['difficulty'] }}
                                        </span>
                                    @else
                                        <span class="hard smaller">
                                            <i class="material-icons icon-valign">sick</i>&nbsp;{{ $game['difficulty'] }}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s2">
                                    @if ($game['winner'] == 'Player')
                                        <span class="player smaller">
                                            <i class="material-icons icon-valign">face</i>&nbsp;{{ $game['winner'] }}
                                        </span>
                                    @else
                                        <span class="computer smaller">
                                            <i class="material-icons icon-valign">smart_toy</i>&nbsp;{{ $game['winner'] }}
                                        </span>
                                    @endif
                                </div>
                                <div class="col s2"><a href="/gamedetail?gid={{ $game['id'] }}"
                                        class="underline">View Game</a></div>
                                <div class="col s2">{{ date('m/d/y  H:i A', strtotime($game['started_on'])) }}
                                </div>
                                <div class="col s2">{{ date('m/d/y  H:i A', strtotime($game['ended_on'])) }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="row">
                            <div class="col s12 center">No games played available yet.</div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <button type="submit" class="pushable" onclick="location.href='/';">
                        <span class="shadow"></span>
                        <span class="edge-alternate"></span>
                        <span class="front-alternate">
                            <i class="material-icons">arrow_back</i><br>Go Back
                        </span>
                    </button>
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
                    <li>This page shows all games played by everyone.</li>
                    <li>Click on "View Game" to see how the game ended.</li>
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
