<?php

$host = "localhost";
$port = "3306";
$dbname = "filmedb";
$user = "root";
$pass = "";

$connUrl = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

$pdo = new PDO(dsn: $connUrl, username: $user, password: $pass);

?>