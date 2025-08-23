<?php 
include "service/database.php";
session_start();
if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("location: index.php");
}

if(isset($_SESSION["isLogin"]) == false){
    header("location: login.php");
}
$user = $_SESSION['username']; // pastikan sudah login
// Ambil data to-do user
$todos = mysqli_query($conn, "SELECT * FROM todos WHERE user_id = {$_SESSION['user_id']} ORDER BY created_at DESC");

if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT username FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id); // "i" for integer type
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        // Handle case where user is not logged in or session variable is not set
        $conn->close();
        exit();
    }

if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
    } 

    // Close statement and connection
    $stmt->close();
    $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="js/index.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/cd82257939.js" crossorigin="anonymous"></script>
    <title>YourToDoList</title>
</head>
<body class="bg-gray-200 min-h-screen">
    <?php include "layout/nav-2.php"?>
    <div class=" min-h-screen flex flex-row p-6">
        <!-- Profile Section -->
        <div class="w-1/3 bg-white rounded-lg shadow-md hidden md:block" >
           <div class="text-center bg-[#1a0730] p-3 rounded-t-lg">
                <img src="https://randomuser.me/api/portraits/lego/8.jpg" class="w-20 h-20 rounded-full mx-auto mb-4 outline-8 outline-[#2f1f45]">
                <h2 class="text-xl font-bold text-white"><?= $user ?></h2>
            </div>
        </div>

        <!-- To-do List Area -->
        <div class="w-3/3 p-8 md:w-2/3">
            <h1 class="text-2xl font-bold mb-4">Daftar Tugas</h1>

            <!-- Form Tambah -->
            <form action="service/tambah.php" method="post" class="flex mb-6">
                <input type="text" name="task" required placeholder="Tambahkan tugas baru..." class="flex-grow p-2 rounded-l-md border border-gray-300 bg-white">
                <button type="submit" class="cursor-pointer bg-[#1c0d2e] text-white px-4 py-2 rounded-r-md">Tambah</button>
            </form>

            <!-- Daftar Tugas -->
            <ul class="space-y-3">
                <?php while ($row = mysqli_fetch_assoc($todos)) : ?>
                    <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                    <form action="service/checkToggle.php" method="post" class="flex items-center gap-2" name="checkbox">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="checkbox" class="cursor-pointer hover:scale-125 transition-all transition-discrete" name="status" onchange="this.form.submit()" <?= $row['status'] === 'done' ? 'checked' : '' ?>>
                         <span class="transition-all duration-300 <?= $row['status'] === 'done' ? 'line-through text-gray-500' : '' ?>">
                               <?= htmlspecialchars($row['task']) ?>
                          </span>
                    </form>
                        <div class="flex gap-2">
                            <?php if ($row['status'] !== 'done') : ?>
                            <a href="service/edit.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:scale-125 transition-all transition-discrete"><i class="fa-solid fa-pen-to-square"></i></a>
                            <?php endif; ?>
                            <a href="service/hapus.php?id=<?= $row['id'] ?>" class="text-red-500 hover:scale-125 transition-all transition-discrete" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

    
</body>
</html>