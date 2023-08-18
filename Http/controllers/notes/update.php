<?php
use Core\App;
use Core\Database;
use Core\Validator;

$db=App::resolve(Database::class);
$currentUserId = 1;
//$id=$_GET['id'];
//find the corresponding note
$note = $db->query('select * from notes where  id = :id', [
    'id' => $_POST['id']
])->findOrFail();

//authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);
//validate the form
$errors=[];
$body = $_POST['body'];
if (!Validator::string($body,1,1000)){
    $errors['body']='A body of notes require no more than 1,000 characters';
}
//if no validation errors, update the record in the notes database table.
if (count($errors)){
    return view('notes/edit.view.php',[
        'heading'=>'Edit Noted',
        'errors'=>$errors,
        'note'=>$note
    ]);
}

$db->query('update notes set body = :body where id = :id',[
    'id'=> $_POST['id'],
    'body'=>$body
]);
//redirect the user
header('location: /notes');