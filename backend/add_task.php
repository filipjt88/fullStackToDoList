<?php

// Add task
require('config.php');
if(!empty($_POST['task_name'])) {
    $task_name = $_POST['task_name'];
    $statement = $pdo->prepare("INSERT INTO tasks (task_name) VALUES (:taskName)");
    $statement->execute(['task_name' => $task_name]);
    echo "Task added successfully!";
} else {
    echo "task name canoot be empty!";
}