<?php

namespace Tests\Functional;

use Dotenv\Util\Regex;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

class BaseTestCase extends TestCase
{
    public function runApp($requestMethod, $requestUri, $requestData = null)
    {   // Create a Mock Environment  for testing with
        $environment = Environment ::mock(
            [
            "REQUEST_METHOD" => $requestMethod,
            "REQUEST_URI" => $requestUri
            ]
            );
        // Set up a request obect based on the environment    
        $request = Request :: createFromEnvironment($environment);
        
        // Add request data
        if(isset($requestData)){
            $request = $request->withParsedBody($requestData);
        }

        // setup response object
        $reponse = new Response();
        $app = new App();
        require __DIR__. "./../../src/routes/users.php";

        // Process the application
        $reponse = $app->process($request, $reponse);

        // Return the response
        return $reponse;
    }
}