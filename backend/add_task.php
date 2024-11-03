<?php

// Add task
require('config.php');

if(!empty($_POST['task_name'])) {
    $task_name = $_POST['task_name'];
    $statement = $pdo->prepare("INSERT INTO tasks (task_name) VALUES (:taskName)");
    $statement->execute(['taskName' => $taskName]);
    echo "Task added successfully!";
} else {
    echo "task name canoot be empty!";
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = trim($_POST['task_name']);

    if (!empty($task_name)) {
        // Priprema i izvršenje upita
        $stmt = $pdo->prepare("INSERT INTO tasks (task_name) VALUES (:task_name)");
        $stmt->bindParam(':task_name', $task_name);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Task added successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add task.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Task name cannot be empty.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}



