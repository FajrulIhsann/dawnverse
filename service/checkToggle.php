<?php
session_start();
include 'database.php';

if (!isset($_SESSION['isLogin'])) {
    header("Location: ../index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$id = intval($_POST['id']);

// Cek status saat ini
$result = mysqli_query($conn, "SELECT status FROM todos WHERE id = $id AND user_id = $user_id");
$row = mysqli_fetch_assoc($result);

if ($row) {
    $newStatus = ($row['status'] === 'done') ? 'pending' : 'done';
    mysqli_query($conn, "UPDATE todos SET status = '$newStatus' WHERE id = $id AND user_id = $user_id");
}

header("Location: ../todolist.php");