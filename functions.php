<?php

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

?>
