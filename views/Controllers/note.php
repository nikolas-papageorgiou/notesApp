<?php
//The problem is where should we make the connection with the database.
//This is an issue when we introduced Containes concept. For now we just
//Make the connection in the controller that will need the connection
$config = require 'config.php';
$heading = 'Note';
$db = new Database($config['dbconfig']);

$note =$db->query("select * from posts where id = ?",[$_GET['id']])->findOrFail(PDO::FETCH_ASSOC);
//In this point we must add authorization check.

//To do: the current user is hardcoded. Must be dynamic. This section is responsible for authorization
//This code authorizates that the current user created the giver
$currentUser=2;
authorize($note['user_id']===$currentUser);

require "/Programs/xampp/htdocs/notesApp/views/note.view.php";