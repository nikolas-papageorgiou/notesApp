<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

//Here we add the first binding in the container
$container->bind('Core\Database',function(){
    $config = require base_path('config.php');
    return new Database($config['dbconfig']);
});

$db = $container->resolve('Core\Database');

App::setContainer($container);