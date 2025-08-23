<?php 
    include "service/database.php";
    $loginMsg = "";
    session_start();
    if(isset($_POST['loginSubmit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";

        $result = $db->query($sql);

        if($result->num_rows > 0) {
          $isi = $result->fetch_assoc();
          $_SESSION["user_id"] = $isi["id"];
          $_SESSION["username"] = $isi["username"];
          $_SESSION["isLogin"] = true;
          header("location: todolist.php");
        }else{
          $loginMsg = "akun tidak ditemukan";
        }
    }

    if(isset($_SESSION["isLogin"]) == true){
      header("location: todolist.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Fajrulweb</title>
</head>
<body style="background-color:#1c0d2e;" >

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="login.php" method="POST">
      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-300">Username</label>
        <div class="mt-2">
          <input type="text" name="username" id="username" required class="block w-full rounded-md bg-gray-200 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-700 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-300">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-500 hover:text-indigo-400">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-gray-200 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-700 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <button type="submit" name="loginSubmit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
      <i class="text-red-500"> <?= $loginMsg ?> </i>
    </form>
    <p class="mt-10 text-center text-sm/6 text-gray-100">
      Don't have any account?
      <a href="register.php" class="font-semibold text-indigo-500 hover:text-indigo-400">Create Account</a>
    </p>
  </div>
</div>
</body>
</html>