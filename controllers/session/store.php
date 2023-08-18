<?php
//login the user if the credentials match

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = "Please provide the valid email";
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a valid password";
}
if (!empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email=:email', [
    'email' => $email,
])->find();
if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);
        header('location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No Matching account found.'
    ]
]);


