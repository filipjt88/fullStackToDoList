<?php
require 'config.php';

if(!empty($_POST['id']) && !empty($_POST['task_name'])) {
    $id = $_POST['id'];
    $task_name = $_POST['task_name'];

    $statement = $pdo->prepare("UPDATE tasks task_name =:taskName WHERE id =:id");
    $statement->execute(['taskName' => $task_name, 'id' => $id]);
    echo "Task updated successfully";
} else {
    echo "Task name cannot be empty";
}
