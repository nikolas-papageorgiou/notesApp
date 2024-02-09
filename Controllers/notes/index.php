<?php
use Core\App;
// //The problem is where should we make the connection with the database.
// //This is an issue when we introduced Containes concept. For now we just
// //Make the connection in the controller that will need the connection
// $config = require base_path('config.php');
// $db = new Database($config['dbconfig']);

$db = App::resolve('Core\Database');


//Here we execute the queries. First, get the string query from URI. In this case we get the user_id 
//from the URL. For the time being we will bypass it by hardcode the user_id
// $id = $_GET['user_id'];

$notes =$db->query("select * from posts where user_id = ?",[2])->get(PDO::FETCH_ASSOC);


view("notes/index.view.php",[
    'heading'=>'My Notes',
    'notes'=>$notes
]);