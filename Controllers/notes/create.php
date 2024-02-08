<?php
$heading = 'Create new note';
$config = require base_path('config.php');
$db = new Database($config['dbconfig']);

require base_path('Core/Validator.php');

$errors=[];
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




if(!Validator::bodyRestrictions($_POST['body'],1,1000)){
    $errors['body']='The body must contain no more that 1000 characters.';
}


if(empty($errors)){
    $db->query('INSERT INTO posts(body,user_id) VALUES(:body,:user_id)',[
        'body'=>trim($_POST['body']),
        'user_id'=>2
    ]);
}

}

view("notes/create.view.php",[
    'heading'=>'Create new note',
    'errors'=>$errors
]);