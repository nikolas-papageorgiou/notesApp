<?php

const BASE_PATH = __DIR__ . "/../";
//The following functions will be available to all the rest pages that follows, which means to all pages.
require BASE_PATH.'/Core/functions.php';




spl_autoload_register(function ($class){
   
    $class=str_replace( '\\','/',$class);
 
    require base_path("{$class}.php");
});

//Require bootstrap.php

require base_path('bootstrap.php');



$router = new \Core\Router();
$method = isset($_POST['_method'])? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

 
 $routes=require base_path('routes.php');

 $uri = parse_url($_SERVER['REQUEST_URI']);
 
 $router->route($uri,$method);
?>