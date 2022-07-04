<?php
/**
 * @OA\Info(title="My First API", version="0.1")
 */

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \OpenApi\Generator as openApi;


class UserController{
    public function index(Request $request, Response $reponse, array $arg){
        
        echo 'Welcome to octagon users API'; 
    }
    public function api(){
        $openapi = openApi::scan(['/server/src/routes/users']);
        header('Content-Type: application/json');
        echo $openapi->toJSON();
    }

    /**
 * @OA\Get(
 *     path="../../src/routes/users/users",
 *     @OA\Response(response="200", description="An example resource")
 * )
 */
    function users(Request $request, Response $reponse, array $args){
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
    }
};


// var_dump($UserController);


$app->get('/api', UserController::class. ':index');


$app->get('/apii', UserController::class. ':api');

//get all users
$app->get('/api/users', UserController::class. ':users');

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