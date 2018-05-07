<?php
$user = "root";
$pass = "";
$db = new PDO('mysql:host=localhost;dbname=todo-list', $user, $pass);
$db->exec("set names utf8");
?>

