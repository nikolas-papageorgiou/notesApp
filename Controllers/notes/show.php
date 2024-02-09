<?php
use Core\Database;
use Core\App;
// //The problem is where should we make the connection with the database.
// //This is an issue when we introduced Containes concept. For now we just
// //Make the connection in the controller that will need the connection
// $config = require base_path('config.php');
// $db = new Database($config['dbconfig']);

$db = App::resolve('Core\Database');

$currentUser=2;

$note =$db->query("select * from posts where id = ?",[$_GET['id']])->findOrFail(PDO::FETCH_ASSOC);

    //In this point we must add authorization check.
    //To do: the current user is hardcoded. Must be dynamic. This section is responsible for authorization
    //This code authorizates that the current user created the giver
   
    authorize($note['user_id']===$currentUser);
    
    
    view("notes/show.view.php",[
        'heading'=>'Note',
        'note'=>$note
    ]);

