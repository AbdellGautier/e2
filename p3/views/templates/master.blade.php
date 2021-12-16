<!doctype html>
<html lang='en'>
<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/app.css">
    <script type="text/javascript" src="scripts/index.js"></script>

    <link rel='shortcut icon' href='/favicon.ico'>

    @yield('head')

</head>
<body>

<header>
    <nav>
        <div class="nav-wrapper">
            <a class="title">{{ $app->config('app.name') }}</a>
        </div>
    </nav>
</header>

<main>
    @yield('content')
</main>

@yield('body')

<footer class="page-footer">
    @yield('footer')
</footer>

</body>
</html>