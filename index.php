<?php
require 'functions.php';
require 'router.php';
//require 'Database.php';
// Connect to our MySql database and execute query.
$config = require 'config.php';

$db = new Database($config['database']);
$id=$_GET['id'];
//dd($_GET);
$query ="select * from posts where id = :id";
$posts= $db->query($query,['id'=>$id])->fetch();
dd($posts);

foreach ($posts as $post){
    echo "<li>".$post['title']."</li>";
}

