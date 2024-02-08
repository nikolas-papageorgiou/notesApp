<?php

//parse_url splits the URI ito URL and string query.This function return an associative array
$uri = parse_url($_SERVER['REQUEST_URI']);
require 'Response.php';
$routes=require 'routes.php';

function routeToController($uri,$routes){
    foreach($routes as $key=>$value){
        if($key===$uri['path']){
            require $routes[$key];
            die();
        }
    }
    
}


function abort($status_code=404){
    http_response_code($status_code);
    require '/Programs/xampp/htdocs/notesApp/views/'.$status_code.'.php';
    die();
}

routeToController($uri,$routes);

//In the abort function we can pass other errors. For example 403 or 422.
//We have to make the appropriate pages to do this. In this project we won't
abort();