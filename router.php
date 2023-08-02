<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function abort($code=404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

//if ($uri === '/'){
//    require 'controllers/index.php';
//}else if($uri === '/about'){
//    require  'controllers/about.php';
//}else if ($uri ==='/contact'){
//    require  'controllers/contact.php';
//}else if($uri ==='/ourMission') {
//    require 'controllers/ourMission.php';
//}

$route = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/ourMission' => 'controllers/ourMission.php'
];

function routeToController($uri, $route)
{
//    if(array_key_exists($uri,$route)){
//        require $route[$uri];
//    }else{
//        abort();
//    }
    return array_key_exists($uri, $route) ? require $route[$uri] : abort();
}

routeToController($uri, $route);