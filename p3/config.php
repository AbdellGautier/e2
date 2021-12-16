<?php

return [
    'app' => [
        'url' => $app->env('APP_URL', 'http://e2p3.abdellgautier.com'),
        'name' => $app->env('APP_NAME', 'Submarine Attack'),
        'timezone' => 'America/New_York',
        'email' => 'my@email.com'
    ],
    'database' => [
        'name' => 'myapp',
        'username' => 'root',
        'password' => '',
    ]
];
