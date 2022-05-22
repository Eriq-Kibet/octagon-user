<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;


$app = new \Slim\App;

$app->get('/api', function (Request $request, Response $reponse) {
    $reponse->getBody()->write('Welcome to octagon users API');
});

//get all users
$app->get('/api/users', function (Request $request, Response $reponse, array $args) {

    $sql = "SELECT * FROM users ";

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

//Add a User to the DB
$app->post('/api/signup', function (Request $request, Response $reponse, array $args) {
    $input = $request->getParsedBody();
    $firstname = $input['firstname'];
    $lastname = $input['lastname'];
    $phonenumber = $input['phonenumber'];
    $password = $input['password'];
 
    try {
        //get db object
        $db = new db();
        //conncect
        $pdo = $db->connect();


        $sql = "INSERT INTO users (phonenumber,password,firstname, lastname) VALUES (?,?,?,?)";


        $pdo->prepare($sql)->execute([$phonenumber, $password, $firstname, $lastname]);

        echo '{"success": {"text": "User '. $firstname .' has been succcessfully added"}}';
        $pdo = null;
    } catch (\PDOException $e) {
        echo '{"error": {"text": ' . $e->getMessage() .  '}}';
    }
});
$app->run();