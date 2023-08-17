<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db=App::resolve(Database::class);

$errors = [];

$body = $_POST['body'];
if (!Validator::string($body, 1, 1000)) {
    $errors['body'] = 'A body of no more than 1000 characters  is require';
}
if (!empty($errors)) return view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
]);

$db->query("INSERT INTO notes SET body=:body,user_id=:user_id;", [
    'body' => $body,
    'user_id' => 1
]);
header('location: /notes');
die();

