<?php

// config

$host = 'localhost';
$db_name = 'todo_app';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;$db_name=$db_name", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die('Connection failed: ' . $error->getMessage());
}
