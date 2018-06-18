<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'verificadora.php';

$app = new \Slim\App;


$app->get('/', function (Request $request, Response $response) {    
    $response->getBody()->write("Buenas Tardes este es el metodo get <br>");
    return $response;
})->add(\Verificadora::class.'::TraerLosCds');

$app->post('/', function (Request $request, Response $response) {    
    $response->getBody()->write("Buenas Tardes este es el metodo post <br>");
    return $response;
})->add(\Verificadora::class.':AgregarCd');

$app->put('/', function (Request $request, Response $response) {    
    $response->getBody()->write("Buenas Tardes este es el metodo put <br>");
    return $response;
});

$app->delete('/', function (Request $request, Response $response) {    
    $response->getBody()->write("Buenas Tardes este es el metodo delete <br>");
    return $response;
})->add(\Verificadora::class.':EliminarCd')->add(\Verificadora::class.':EsSuperAdmin');

$app->add(\Verificadora::class.':VerificarUsuario');

$app->run();