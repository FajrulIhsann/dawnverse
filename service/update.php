<?php
session_start();
include 'database.php';

if (!isset($_SESSION['isLogin'])) {
    header("Location: ../index.php");
    exit;
}

$id = intval($_POST['id']);
$task = mysqli_real_escape_string($conn, $_POST['task']);

mysqli_query($conn, "UPDATE todos SET task = '$task' WHERE id = $id");
header("Location: ../todolist.php"); // arahkan kembali ke to-do utama