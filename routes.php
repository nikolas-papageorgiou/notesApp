<?php


// return [
//     '/index.php/'=>'/Programs/xampp/htdocs/notesApp/Controllers/index.php'
//     ,'/notesApp/'=>'/Programs/xampp/htdocs/notesApp/Controllers/index.php'
//     ,'/notesApp/index.php/'=>'/Programs/xampp/htdocs/notesApp/Controllers/index.php'
//     ,'/index.php/notes'=>'/Programs/xampp/htdocs/notesApp/Controllers/notes/index.php'
//     ,'/index.php/note'=>'/Programs/xampp/htdocs/notesApp/Controllers/notes/show.php'
//     ,'/index.php/about'=>'/Programs/xampp/htdocs/notesApp/Controllers/about.php'
//     ,'/index.php/contact'=>'/Programs/xampp/htdocs/notesApp/Controllers/contact.php'
//     ,'/index.php/notes/create'=>'/Programs/xampp/htdocs/notesApp/Controllers/notes/create.php'
// ];

    $router->get('/notesApp/','/Programs/xampp/htdocs/notesApp/Controllers/index.php');
    $router->get('/index.php/about','/Programs/xampp/htdocs/notesApp/Controllers/about.php');
    $router->get('/index.php/contact','/Programs/xampp/htdocs/notesApp/Controllers/contact.php');
    $router->get('/index.php/notes','/Programs/xampp/htdocs/notesApp/Controllers/notes/index.php');
    $router->get('/index.php/notes/create','/Programs/xampp/htdocs/notesApp/Controllers/notes/create.php');
    $router->get('/index.php/note','/Programs/xampp/htdocs/notesApp/Controllers/notes/show.php');
    $router->post('/index.php/notes/store','/Programs/xampp/htdocs/notesApp/Controllers/notes/store.php');
    $router->delete('/index.php/note','/Programs/xampp/htdocs/notesApp/Controllers/notes/destroy.php');
