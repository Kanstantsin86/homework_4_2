<?php
/*$servername = "http://university.netology.ru/u/litvink/";
$dbname = "todo-list";
$username = "litvink";
$password = "neto1742";*/
$servername = "localhost";
$dbname = "todo-list";
$username = "root";
$password = "";
$db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

