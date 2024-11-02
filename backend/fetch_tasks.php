<?php
require 'config.php';
$statement = $pdo->prepare("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($tasks);
