<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/index' => ['AppController', 'index'],
    '/start' => ['AppController', 'startGame'],
    '/history' => ['HistoryController', 'history'],
    '/round' => ['HistoryController', 'round'],
    '/launch-missile' => ['AppController', 'launchMissile'],
    '/abandon' => ['AppController', 'index'],
    '/notfound' => ['AppController', 'notfound'],
];