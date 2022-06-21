<?php
class db
{
    
    public function connect()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__."./../../../server"); 
        $dotenv->load();
        
        $host = $_ENV['HOST'];
        $user = $_ENV['USER_NAME'];
        $pass = $_ENV['PASSWORD'];
        $dbname = $_ENV['DB_NAME'];

        //connect database using php pdo wrapper 
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        if(!$pdo){
            die('Unable To Connect to Sql Server');
        }else{
        echo "Connection Successful";
        return $pdo;
        }
    }
}
