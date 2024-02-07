<?php
//The problem is where should we make the connection with the database.
//This is an issue when we introduced Containes concept. For now we just
//Make the connection in the controller that will need the connection
$config = require 'config.php';
$heading = 'Note';
$db = new Database($config['dbconfig']);

//Here we execute the queries. First, get the string query from URI. In this case we get the user_id 
//from the URL. For the time being we will bypass it by hardcode the user_id
// $id = $_GET['user_id'];

$note =$db->query("select * from posts where id = ?",[$_GET['id']])->fetch(PDO::FETCH_ASSOC);
//In this point we must add authorization check.
if(! $note){
    abort();
}
//To do: the current user is hardcoded. Must be dynamic after authorization
$currentUser=2;
if($note['user_id']!==$currentUser){
    abort(Response::FORBIDDEN);
}
require "/Programs/xampp/htdocs/notesApp/views/note.view.php";