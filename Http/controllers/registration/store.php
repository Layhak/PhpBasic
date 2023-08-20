<?php

use Core\App;
use Core\Database;
use Http\Forms\RegisterForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new RegisterForm();


if (!$form->validate($email,$password)){
    return view('registration/create.view.php',[
        'errors'=>$form->errors()
    ]);
}
$db=App::resolve(Database::class);

$user = $db->query('select * from users where email=:email',[
    'email'=>$email
])->find();

if($user){
    header('location: /sessions');
    exit();
}else{
    $db->query('insert into users set email=:email , password=:password',
    [
        'email'=>$email,
        'password'=>password_hash($password,PASSWORD_BCRYPT)
    ]);
    login([
        'email'=>$email
    ]);
    header('location: /');
    exit();
}
