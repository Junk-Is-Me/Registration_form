<?php 

$name = trim($_POST['name']);
$password = trim($_POST['password']);

$password = md5($password."qwerty123");

$mysql = new mysqli('localhost', 'root', '', 'hw30');

$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'");

$user = $result->fetch_assoc();

if($user == NULL){
    header('Location: /?auth_error');
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

header('Location: /');

?>