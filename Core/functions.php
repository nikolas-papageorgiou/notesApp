<?php
use Core\Response;

function abort($status_code=404){
    http_response_code($status_code);
    require '/Programs/xampp/htdocs/notesApp/views/'.$status_code.'.php';
    die();
}
function dd($value){

    echo '<pre>';
        var_dump($value);
    echo '</pre>';
}

function authorize($condition,$status=Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH.$path;
}


function view($path,$attributes=[]){

    //Extract method takes an associative array an from the key value pairs
    //turns the keys into variables and the associated values to the corresponding value
    extract($attributes);
    require base_path('views/'.$path);
}


?>
