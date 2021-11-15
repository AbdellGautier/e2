@extends("templates/master")

@section("title")
    About
@endsection

@section("head")
    <link href="/css/about.css" rel="stylesheet">
@endsection

@section("content")
<h1>About</h1>

{{ $appDescription }}
@endsection