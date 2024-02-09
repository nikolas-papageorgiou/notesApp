<?php
namespace Core;
class Router{

    protected $routes =[];    

    protected function abort($status_code=404){
        http_response_code($status_code);
        require '/Programs/xampp/htdocs/notesApp/views/'.$status_code.'.php';
        die();
    }


    public function add($method,$uri,$controller){
        $this->routes[]=[
        'uri'=>$uri,
        'controller'=>$controller,
        'method'=>$method    
        ];
    }

    public function get ($uri,$controller) {
        //we cache the information pass in an array called $routes
        $this->add('GET',$uri,$controller);
    }

    public function post($uri,$controller){
        $this->add('POST',$uri,$controller);

    }
    public function delete($uri,$controller){
        $this->add('DELETE',$uri,$controller);

    }

    public function patch($uri,$controller){
        $this->add('PATCH',$uri,$controller);

    }
    public function put($uri,$controller){
        $this->add('PUT',$uri,$controller);

    }

    public function route($uri,$method){

        
        foreach($this->routes as $route){
           
            if($route['uri']===$uri['path'] && $route['method']===strtoupper($method)){

                
                return require $route['controller'];
            }
        }

        //abort. no match found
        $this->abort();
    }
}






// //parse_url splits the URI ito URL and string query.
// //This function return an associative array.
// $uri = parse_url($_SERVER['REQUEST_URI']);
// require 'Response.php';
// $routes=require base_path('routes.php');

// function routeToController($uri,$routes){
//     foreach($routes as $key=>$value){
//         if($key===$uri['path']){
//             require $routes[$key];
//             die();
//         }
//     }
    
// }


// function abort($status_code=404){
//     http_response_code($status_code);
//     require '/Programs/xampp/htdocs/notesApp/views/'.$status_code.'.php';
//     die();
// }

// routeToController($uri,$routes);

// //In the abort function we can pass other errors. For example 403 or 422.
// //We have to make the appropriate pages to do this. In this project we won't
// abort();