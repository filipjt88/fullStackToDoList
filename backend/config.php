<?php
// config.php
$host = 'localhost';
$dbname = 'todo_app'; // Ime baze podataka mora biti tačno
$user = 'root';
$pass = '';

try {
    // Proveri da li si ispravno naveo ime baze podataka u DSN-u
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

