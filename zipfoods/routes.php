<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/contact' => ['AppController', 'contact'],
    '/about' => ['AppController', 'about'],
    '/products' => ['ProductsController', 'index'],
    '/product' => ['ProductsController', 'show'],
    '/products/new' => ['ProductsController', 'new'],
    '/products/save-review' => ['ProductsController', 'saveReview'],
    '/products/save-product' => ['ProductsController', 'saveProduct'],
    '/missing' => ['ProductsController', 'missing'],
    '/practice' => ['AppController', 'practice']
];