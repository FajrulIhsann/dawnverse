<?php
session_start();
include 'database.php';

if (!isset($_SESSION['isLogin'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$task = trim($_POST['task']);

if (!empty($task)) {
    $stmt = mysqli_prepare($conn, "INSERT INTO todos (user_id, task) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "is", $user_id, $task);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: ../todolist.php");