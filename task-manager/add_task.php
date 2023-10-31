<?php

$db_host = "localhost";
$db_user = "your_username";
$db_pass = "your_password";
$db_name = "task_manager";


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function createTask($task_name, $status) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tasks (task_name, status) VALUES (?, ?)");
    $stmt->bind_param("ss", $task_name, $status);
    $stmt->execute();
    $stmt->close();
}


function getAllTasks() {
    global $conn;
    $result = $conn->query("SELECT * FROM tasks");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateTask($task_id, $new_status, $new_description) {
    global $conn;
    $stmt = $conn->prepare("UPDATE tasks SET status = ?, task_name = ? WHERE id = ?");
    $stmt->bind_param("ssi", $new_status, $new_description, $task_id);
    $stmt->execute();
    $stmt->close();
}


function deleteTask($task_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $stmt->close();
}
