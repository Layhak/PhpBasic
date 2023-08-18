<?php
//login the user if the credentials match

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {

    return view('session/create.view.php', [
        'errors' => $form->errors()
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


