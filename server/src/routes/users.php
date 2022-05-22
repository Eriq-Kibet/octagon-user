<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;


$app = new \Slim\App;

$app->get('/api', function (Request $request, Response $reponse) {
    $reponse->getBody()->write('Welcome to octagon users API');
});

//get a single user
$app->get('/api/users/{id}', function (Request $request, Response $reponse, array $args) {
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM users where phonenumber = $id";

    try {
        $db = new db();
        $pdo = $db->connect();

        $stmt = $pdo->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);

        $pdo = null;


        echo json_encode($user);
    } catch (\PDOException $e) {
        echo '{"msg": {"resp": ' . $e->getMessage() . '}}';
    }
});
$app->run();