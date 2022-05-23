<?php

return function($app)
{   //JWT Authentication
    // $app->add(new \Tuupola\Middleware\JwtAuthentication([
    //     "ignore"=>["api/login","api/register"],
    //     "secret"=>"kshfnkjsfnjksfjksfk",
    //     "error"=> function($response,$arguments)
    //     {
    //         $data["success"]=false;
    //         $data["response"]=$arguments["message"];
    //         $data["status_code"]="401";

    //         return $response->withHeader("Content-type","application/json")
    //             ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    //     }

    // ]));

    // CORS for all Routes 
    $app->add(Function ($req,$res,$next){
        $response = $next($req,$res);
        $response->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
            ->withHeader('Access-Control-Allow-Credentials','true');
    });
};