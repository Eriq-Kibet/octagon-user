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
//Sign in User
$app->post('/api/signin', function (Request $request, Response $reponse, array $args) {
    $input = $request->getParsedBody();
    $phonenumber = $input['phonenumber'];
    $password = $input['password'];
    if(!empty($phonenumber && !empty($password))){ // check if phonenumber and password are empty
        try {
            //get db object
            $db = new db();
            //conncect
            $pdo = $db->connect();
    
            $sql = "SELECT * FROM users WHERE phonenumber = $phonenumber AND password = '$password'";
    
            $stmt = $pdo->query($sql);
            $user = $stmt->fetchAll(PDO::FETCH_OBJ);
            // Check if user in not null
            if (!empty($user)){
                // Genaerate Token
                $token = base64_encode(random_bytes(64));
            echo '{"success": {"text": "'. $user.' has been loggen in succcessfully"},{"token":'.$token.'}}';
            }else{
                echo '{"fail": {"text": "You have entered a wrong password/username"}}';
            }
            $pdo = null;
        } catch (\PDOException $e) {
            echo '{"error": {"text": ' . $e->getMessage() .  '}}';
        }
    }else{
        echo '{"fail": {"text": "username or password has not been entered"}}';
    }
    
});

//Add a User to the DB
$app->post('/api/signup', function (Request $request, Response $reponse, array $args) {
    $input = $request->getParsedBody();
    $firstname = $input['firstname'];
    $lastname = $input['lastname'];
    $phonenumber = $input['phonenumber'];
    $password = $input['password'];
    if(!empty($firstname && !empty($lastname && !empty($phonenumber && !empty($password))))){ // check if values are null
        try {
            //get db object
            $db = new db();
            //conncect
            $pdo = $db->connect();
            
            $sql2 = "SELECT * FROM users WHERE phonenumber = $phonenumber";
    
            $stmt = $pdo->query($sql2);
            $user = $stmt->fetchAll(PDO::FETCH_OBJ);
            // Check if phonenumber exists
            if(empty($user)){
            $sql = "INSERT INTO users (phonenumber,password,firstname, lastname) VALUES (?,?,?,?)";
    
            $pdo->prepare($sql)->execute([$phonenumber, $password, $firstname, $lastname]);
    
            echo '{"success": {"text": "User '. $firstname .' has been succcessfully added"}}';
            $pdo = null;
            }else{echo '{"fail": {"text": "'. $phonenumber .' is already registered, use another number"}}';}

        } catch (\PDOException $e) {
            echo '{"error": {"text": ' . $e->getMessage() .  '}}';
        }
    }else{
        echo '{"fail": {"text": "Enter all values"}}'; 
    }
    
});

$app->run();