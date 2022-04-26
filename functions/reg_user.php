<?php

$name = trim($_POST['name']);
$password = trim($_POST['password']);

if(mb_strlen($name) < 2 || mb_strlen($name) > 30){
    header('Location: /?reg_error');
    exit();
};

if(mb_strlen($password) < 5 || mb_strlen($password) > 10){
    header('Location: /?reg_error');
    exit();
};

$password = md5($password."qwerty123");

$mysql = new mysqli('localhost', 'root', '', 'hw30');

$mysql->query("INSERT INTO `users` (`name`, `password`) VALUES ('$name', '$password')"); 

$mysql->close();

header('Location: /');

?>