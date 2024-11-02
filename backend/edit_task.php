<?php
require 'config.php';

if(!empty($_POST['id']) && !empty($_POST['task_name'])) {
    $id = $_POST['id'];
    $taskName = $_POST['task_name'];

    $statement = $pdo->prepare("UPDATE tasks task_name =:taskName WHERE id =:id");
    $statement->execute(['taskName' => $taskName, 'id' => $id]);
    echo "Task updated successfully";
} else {
    echo "Task name cannot be empty";
}
