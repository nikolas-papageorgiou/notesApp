<?php
//This is the first option to connect to the namespace Core
use Core\Database;
use Core\Validator;
$heading = 'Create new note';
use Core\App;
// //The problem is where should we make the connection with the database.
// //This is an issue when we introduced Containes concept. For now we just
// //Make the connection in the controller that will need the connection
// $config = require base_path('config.php');
// $db = new Database($config['dbconfig']);

$db = App::resolve('Core\Database');


require base_path('Core/Validator.php');

$errors=[];

if(!Validator::bodyRestrictions($_POST['body'],1,1000)){
    $errors['body']='The body must contain no more that 1000 characters.';
}

//Validation issue
if(!empty($errors)){
    return view("notes/create.view.php",[
        'heading'=>'Create new note',
        'errors'=>$errors
    ]);
}
//No validation issue

if(empty($errors)){
    $db->query('INSERT INTO posts(body,user_id) VALUES(:body,:user_id)',[
        'body'=>trim($_POST['body']),
        'user_id'=>2
    ]);

    header('location: /index.php/notes');
    exit();
}