<?php
session_start();
include 'database.php';

if (!isset($_SESSION['isLogin'])) {
    header("Location: ../index.php");
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM todos WHERE id = $id");
$todo = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <h1 class="text-2xl font-bold mb-4">Edit Tugas</h1>
    <form action="update.php" method="post" class="space-y-4">
        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
        <input type="text" name="task" value="<?= htmlspecialchars($todo['task']) ?>" class="p-2 border w-full rounded">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</body>
</html>