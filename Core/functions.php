<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

//if ($_SERVER['REQUEST_URI']=== '/'){
//    echo "bg-gray-900 text-white";
//}else{
//    echo "text-gray-300 hover:bg-gray-700 hover:text-white";
//}
function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}


function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
    session_regenerate_id(true);
}
function logout(){
    $_SESSION = [];
    session_destroy();
    $param=session_get_cookie_params();
    setcookie('PHPSESSID','',time()-3600,$param['path'],$param['domain'],$param['secure'],$param['httponly']);
}