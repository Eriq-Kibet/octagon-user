<?php
namespace app\userController;
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;
use db;
use PDO;

class UserController{
    public function index(Request $request, Response $reponse, array $arg){
        return $reponse;
        echo 'Welcome to octagon users API'; 
    }
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