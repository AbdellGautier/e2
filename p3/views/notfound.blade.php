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
                            <form method="POST" action="/history">
                                <button class="pushable" type="submit">
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
            <div class="col s12">
                <h5 class="white-text">Instructions</h5>
                <p class="grey-text text-lighten-4">
                <ol>
                    <li>Click on the Go Back to Game History button to see the games played.</li>
                </ol>
                </p>
            </div>
        </div>
    </div>
@endsection
