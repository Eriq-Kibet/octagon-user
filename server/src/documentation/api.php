<?php
require("../../vendor/autoload.php");
$openapi = \OpenApi\Generator::scan(['/server/src/routes']);
header('Content-Type: application/json');
echo $openapi->toJSON();