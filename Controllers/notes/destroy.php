<?php
use Core\Database;
//The problem is where should we make the connection with the database.
//This is an issue when we introduced Containes concept. For now we just
//Make the connection in the controller that will need the connection
$config = require base_path('config.php');
$db = new Database($config['dbconfig']);
$currentUser=2;

    //form was submitted. delete the current note.
    $note =$db->query("select * from posts where id = ?",[$_POST['id']])->findOrFail(PDO::FETCH_ASSOC);
    authorize($note['user_id']===$currentUser);
    
    $db->query('DELETE from posts where id=:id',[
        'id'=>$_POST['id'],

    ]);

    header('location: /index.php/notes');
    exit();

