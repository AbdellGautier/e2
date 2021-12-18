@extends('templates/master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s5 center">
                <div class="center">
                    <div class="row">
                        <div class="col s12">
                            @if ($winner == "Player")
                                <h2 class="bold winner">Computer Submarine Region (Winner: Player)</h2>
                            @elseif ($winner == "Tie")
                                <h2 class="bold tie">Computer Submarine Region (Tie: Player)</h2>
                            @else
                                <h2 class="bold">Computer Submarine Region</h2>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3"></div>
                        @foreach (range('A', 'H') as $letter)
                            <div class="col s1 option">{{ $letter }}</div>
                        @endforeach
                    </div>
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="row">
                            <div class="col s3">{{ $i }}</div>
                            @foreach (range('A', 'H') as $letter)
                                @if ($computerBoard[$letter . $i] == "H")
                                    <div class="col s1 option sub-hit">
                                        <label><input type="radio" name="CB" disabled="disabled"><span></span></label>
                                    </div>
                                @elseif ($computerBoard[$letter . $i] == "M")
                                    <div class="col s1 option miss">
                                        <label><input type="radio" name="CB" disabled="disabled"><span></span></label>
                                    </div>
                                @else
                                    <div class="col s1 option">
                                        <label><input type="radio" name="CB"  disabled="disabled" value="{{ $letter . $i }}"><span></span></label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endfor
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
                            @if ($winner == "Computer")
                                <h2 class="bold winner">Player Submarine Region (Winner: Computer)</h2>
                            @elseif ($winner == "Tie")
                                <h2 class="bold tie">Player Submarine Region (Tie: Computer)</h2>
                            @else
                                <h2 class="bold">Player Submarine Region</h2>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                    <div class="col s3"></div>
                        @foreach (range('A', 'H') as $letter)
                            <div class="col s1 option">{{ $letter }}</div>
                        @endforeach
                    </div>
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="row">
                            <div class="col s3">{{ $i }}</div>
                            @foreach (range('A', 'H') as $letter)
                                @if ($playerBoard[$letter . $i] == "S")
                                    <div class="col s1 option sub-present">
                                        <label><input class="no-pointer" type="radio" name="PB" disabled="disabled"><span></span></label>
                                    </div>
                                @elseif ($playerBoard[$letter . $i] == "H")
                                    <div class="col s1 option sub-hit">
                                        <label><input class="no-pointer" type="radio" name="PB" disabled="disabled"><span></span></label>
                                    </div>
                                @elseif ($playerBoard[$letter . $i] == "M")
                                    <div class="col s1 option miss">
                                        <label><input class="no-pointer" type="radio" name="PB" disabled="disabled"><span></span></label>
                                    </div>
                                @else
                                    <div class="col s1 option">
                                        <label><input class="no-pointer" type="radio" name="PB" disabled="disabled"><span></span></label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center">
                <form action="/history" method="post">
                    <button id="btnGameHistory" test="btnGameHistory" class="pushable">
                        <span class="shadow"></span>
                        <span class="edge-alternate"></span>
                        <span class="front-alternate">
                            <i class="material-icons">arrow_back</i><br>Go Back to Game History
                        </span>
                    </button>
                </form>
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
            <div class="col s12">
                <h5 class="white-text">Game Information</h5>
                <p class="grey-text text-lighten-4">
                    <ul>
                        <li><span class="grey-text text-lighten-1">Player Nickname:</span> <span class="bold">{{ $playerNickname }}</span></li>
                        <li><span class="grey-text text-lighten-1">Difficulty:</span> <span class="bold">{{ $difficulty }}</span></li>
                        <li><span class="grey-text text-lighten-1">Winner:</span> <span class="bold">{{ $winner }}</span></li>
                        <li><span class="grey-text text-lighten-1">Game started on:</span> <span class="bold">{{ date('m/d/y  h:i:s A', strtotime($startedOn)) }}</span></li>
                        <li><span class="grey-text text-lighten-1">Game ended on:</span> <span class="bold">{{ date('m/d/y  h:i:s A', strtotime($endedOn)) }}</span></li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
@endsection