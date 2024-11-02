<?php
require 'config.php';

if(!empty($_POST['id'])) {
    $id = $_POST['id'];

    $statement = $pdo->prepare("DELETE FROM tasks WHERE id =:id");
    $statement->execute(['id' => $id]);
    echo "Task deleted successfully";
} else {
    echo "Invalid task ID";
}
