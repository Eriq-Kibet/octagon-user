<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;


$app = new \Slim\App;

$app->get('/api', function (Request $request, Response $reponse) {
    echo 'Welcome to octagon user API';
});
$app->run();