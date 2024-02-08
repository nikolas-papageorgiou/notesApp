<?php

class Validator{

    //This function return a bool if the $string is between min and max in length
    public static function bodyRestrictions($string,$min=1,$max=INF){
        $value = strlen(trim($string));
    
        return $value>$min && $value<$max;
    }   
}
?>