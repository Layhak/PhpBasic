<?php
//login the user if the credentials match

use Core\Authenticator;
use Http\Forms\LoginForm;


$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

//can do like this
// $auth = new Authenticator();
//if ($auth->attempt($email, $password))
//or like this
$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);
if (!$signedIn) {
    $form->error('email', 'No Matching account found for that address and password')
        ->throw();
}
redirect('/');


//$_SESSION['_flash']['errors']=$form->errors();






