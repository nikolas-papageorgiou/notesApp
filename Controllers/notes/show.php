<?php
use Core\Database;
//The problem is where should we make the connection with the database.
//This is an issue when we introduced Containes concept. For now we just
//Make the connection in the controller that will need the connection
$config = require base_path('config.php');
$db = new Database($config['dbconfig']);
$currentUser=2;
//If request method is POST, then we assume that we need to make a delete query
//Otherwise, we just show to the notes of the user
if($_SERVER['REQUEST_METHOD']==='POST'){
    //form was submitted. delete the current note.
    $note =$db->query("select * from posts where id = ?",[$_GET['id']])->findOrFail(PDO::FETCH_ASSOC);
    authorize($note['user_id']===$currentUser);
    
    $db->query('DELETE from posts where id=:id',[
        'id'=>$_GET['id'],

    ]);

    header('location: /index.php/notes');
    exit();
}
else
{$note =$db->query("select * from posts where id = ?",[$_GET['id']])->findOrFail(PDO::FETCH_ASSOC);

    //In this point we must add authorization check.
    //To do: the current user is hardcoded. Must be dynamic. This section is responsible for authorization
    //This code authorizates that the current user created the giver
   
    authorize($note['user_id']===$currentUser);
    
    
    view("notes/show.view.php",[
        'heading'=>'Note',
        'note'=>$note
    ]);
}

