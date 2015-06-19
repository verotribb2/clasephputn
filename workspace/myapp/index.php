<?php

require 'vendor/autoload.php';

use \Slim\Slim;
use myapp\Classes\DB\DB as DB;

$app = new Slim();
$db = new DB();

$app->get('/productos/(:idp)', function($idp=false){
    global $db;
    
    $sql = "SELECT * FROM productos";
    
    if ($idp){
        $sql .= ' WHERE id=' . $idp;
    }
    
    $prod = $db->getInstance()->consultar($sql);
    
    echo json_encode($prod->results());
    
});

$app->get('/categorias/',function(){
    global $db;
    
    $sql = "SELECT * FROM categorias";
    
    $prod = $db->getInstance()->consultar($sql);
    
    echo json_encode($prod->results());
});

$app->response->headers->set('Content-Type','application/json');
$app->run();
