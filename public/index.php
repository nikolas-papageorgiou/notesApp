<?php

const BASE_PATH = __DIR__ . "/../";
//The following functions will be available to all the rest pages that follows, which means to all pages.
require BASE_PATH.'functions.php';



spl_autoload_register(function ($class){
require base_path('Core/'.$class.'.php');
});


require base_path('Core/router.php');



?>