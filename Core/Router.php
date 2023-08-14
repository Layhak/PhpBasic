<?php

namespace Core;
class Router
{
    protected $routes = [];
    public  function  add($method,$uri,$controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }
    public function get($uri, $controller)
    {
        $this->add('GET',$uri,$controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST',$uri,$controller);
    }

    public function delete($uri, $controller)
    {
        $this->add('DELETE',$uri,$controller);
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH',$uri,$controller);
    }

    public function put($uri, $controller)
    {
        $this->add('PUT',$uri,$controller);
    }

    public function route($uri,$method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method']=== strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }
    protected
    function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}

//$route= require base_path('route.php');

//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//routeToController($uri, $route);
//
//function abort($code=Response::NOT_FOUND)
//{
//    http_response_code($code);
//    require base_path("views/{$code}.php");
//    die();
//}
//
////if ($uri === '/'){
////    require 'controllers/index.php';
////}else if($uri === '/about'){
////    require  'controllers/about.php';
////}else if ($uri ==='/contact'){
////    require  'controllers/contact.php';
////}else if($uri ==='/ourMission') {
////    require 'controllers/ourMission.php';
////}
//
//
//function routeToController($uri, $route)
//{
//    if(array_key_exists($uri,$route)){
//        require base_path($route[$uri]);
//    }else{
//        abort();
//    }
////    return array_key_exists($uri, $route) ? require base_path($route[$uri]) : abort();
//}
//
//