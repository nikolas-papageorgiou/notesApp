<?php
$heading = 'Create new note';
$config = require 'config.php';

$db = new Database($config['dbconfig']);


//The controller, when called from index.php get data carried by $_GET super global.
//Then make a query to the db. The user_id for the time being is hardcoded. We have to 
//make it dynamic. The :body and :user_id are wildcards, because that's how prepared
//statements works. We pass the parameters for the wildcards as a second argument in 
//the query method. However, there is a security gap. XSS. To handle it we must insert 
//a build-in function called htmlspecialchars(). In this function we must insert as parameter
//a string. If a string contains malicious code it won't executed. This code will just be displayed
//THE CODE WILL NOT CHANGE THE SOURCE CODE. To catch the code just pass it into the 
//htmlspecialchars() function before displayed. Which means we catch it in the view page.
if($_SERVER['REQUEST_METHOD']==='POST'){

$errors=[];


if(strlen(trim($_POST['body']))===0){
    $errors['body']='Empty body is not allowed.';
}

if(strlen(trim($_POST['body']))>1000){
    $errors['body']='The body can not exceed 1000 characters.';
}
if(empty($errors)){
    $db->query('INSERT INTO posts(body,user_id) VALUES(:body,:user_id)',[
        'body'=>$_POST['body'],
        'user_id'=>2
    ]);
}




    
}
require "/Programs/xampp/htdocs/notesApp/views/note-create.view.php";