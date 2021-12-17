<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/index' => ['AppController', 'index'],
    '/games' => ['AppController', 'games'],
    '/gamedetail' => ['AppController', 'gamedetail'],
    '/play' => ['AppController', 'play'],
    '/launchmissile' => ['AppController', 'launchmissile'],
    '/abandon' => ['AppController', 'index'],
    '/notfound' => ['AppController', 'notfound'],
];