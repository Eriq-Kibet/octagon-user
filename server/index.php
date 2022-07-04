<?php

require __DIR__.'/./vendor/autoload.php';
require __DIR__.'/./src/config/db.php';

$config = ['settings' => [
    'displayErrorDetails' => true,
]];
$app = new Slim\App($config);

// $middleware = require_once __DIR__.'/src/config/middleware.php';

// $middleware($app);

 

require __DIR__.'/./src/routes/users.php';

 
