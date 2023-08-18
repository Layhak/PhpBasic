<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this->routes;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);


                // apply the middleware
//                if ($route['middleware'] === 'guest') {
//                    (new Guest)->handle();
//                }
//                if ($route['middleware'] === 'auth') {
//                    (new Auth)->handle();
//                }
                return require base_path('Http/controllers/'.$route['controller']);
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