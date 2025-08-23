<?php
session_start();
include 'database.php';

if (!isset($_SESSION['isLogin'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$id = intval($_GET['id']);

// Pastikan hanya tugas milik user sendiri yang bisa dihapus
mysqli_query($conn, "DELETE FROM todos WHERE id = $id AND user_id = $user_id");

header("Location: ../todolist.php");

?>