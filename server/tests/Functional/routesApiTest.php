<?php

namespace Tests\Functional;

class routesApiTest extends BaseTestCase
{
    public function welcome()
    {
        $response=$this->runApp('GET','/api');
        $this->assertEquals('Welcome to octagon users API' ,$response->getBody());
    }

    public function getUsers()
    {
        $response=$this->runApp('GET','/api/users');
        $this->assertEquals('[{"phonenumber":"0722798890","password":"admin123","firstname":"cool","lastname":"kid"}]', $response->getBody());
    }

    public function getsingleUsers()
    {
        $response=$this->runApp('GET','/api/users/0722798890');
        $this->assertEquals('[{"phonenumber":"0722798890","password":"admin123","firstname":"cool","lastname":"kid"}]', $response->getBody());
    }
    
    public function signinUser()
    {
        $response= $this->runApp('POST','/api/signin',['phonenumber'=>'0722798890',"password"=>"admin123"]);
        $this->assertEquals('{"success": {"text": cool has been loggen in succcessfully"},{"token":"ghjbfkjsfjk"}}' ,$response->getBody());
    }

    public function signupUser()
    {
        $response= $this->runApp('POST','/api/signup',['phonenumber'=>'0722798890',"password"=>"admin123","firstname"=>"cool","lastname"=>"kid"]);
        $this->assertEquals('{"success": {"text": "User cool has been succcessfully added"}}' ,$response->getBody());

    }
}