<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require __DIR__.'/./vendor/autoload.php';
require __DIR__.'/./src/config/db.php';

$app = new \Slim\App;
$middleware = require_once __DIR__.'/src/config/middleware.php';

$middleware($app);

 

require __DIR__.'/./src/routes/users.php';

 
