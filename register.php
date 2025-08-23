<?php 
    include("service/database.php");
    $registerMsg = "";
    if(isset($_POST['registerSubmit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        try{
          $sql = "INSERT INTO users (username,password) VALUES ('$username', '$password')";
  
          if($db->query($sql)) {
              header("location: login.php");
          }else {
              echo "GAGAL";
          }

        }catch(mysqli_sql_exception){
          $registerMsg = "Username is already exist.";
        }
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
<body class="bg-[#1c0d2e]">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Create your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="register.php" method="POST">
      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-300">Username</label>
        <div class="mt-2">
          <input type="text" name="username" id="username" required class="block w-full rounded-md bg-gray-200 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          <i class="text-red-500"> <?php echo $registerMsg ?> </i>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-300 mt-6">Password</label>
        </div>
        <div class="mt-2">
          <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-gray-200 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <button type="submit" name="registerSubmit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-6">Create Account</button>
      </div>
    </form>
    <p class="mt-10 text-center text-sm/6 text-gray-100">
      Already have an account?
      <a href="login.php" class="font-semibold text-indigo-500 hover:text-indigo-400">Sign in</a>
    </p>
  </div>
</div>
</body>
</html>