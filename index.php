<?php 
session_start();
include("service/database.php");
if(isset($_SESSION['isLogin']) == true){
    $username = $_SESSION["username"];
}

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Fajrulweb</title>
</head>
<body>
    <?php 
    
    if(isset($_SESSION['isLogin']) == true) {
        include "layout/nav-2.php";
    }
    else {
        include("layout/nav-1.html");
    }

    ?>
    <div id="home-section" class="min-h-screen bg-[url(/assets/space-pixel.jpg)] bg-cover bg-no-repeat bg-fixed flex flex-col items-center justify-start pt-20 text-white">
    <!-- Judul -->
    <div id="main-title" class="rounded-2xl flex flex-row items-center justify-center md:bg-(--main-color)/90 font-semibold w-140 h-40 px-6">
        <h1 class="text-5xl">Dawnverse</h1>
    </div>

    <!-- Deskripsi -->
    <div id="main-desc" class="mt-6 bg-(--thirdly-color) px-6 py-3 rounded-md">
        <p class="text-lg ">Where I Keep and Share My Mini Projects</p>
    </div>

    <div class="flex mt-7 w-50 h-50 justify-center items-center">
        <a href="#product-section" md:href="#funfact-section"><i class="fa-solid fa-chevron-down text-5xl text-(--fourthly-color)/80  animate-[bounce_2s_ease-in-out_infinite]"></i></a>
    </div>
</div>

    <!-- funfact-section -->
    <div id="funfact-section" class="flex flex-row bg-(--main-color) md:flex hidden w-full h-70 items-center">
        <div class="w-1/3 h-50 font-semibold mx-6 rounded flex items-center shadow-xl/70 flex-col p-3 px-10 text-white hover:scale-105 transition ease-in-out">
            <h1 class="text-3xl">Who Am I?</h1>
            <p class="mt-5">I am a Senior Highschool student of SMAPA in Probolinggo City. A city in East Java. I'd like to learn coding, such as web development, Internet of Things (IoT), and much more.</p>
        </div>
        
        <div class="w-1/3 h-50 font-semibold mx-6 rounded flex items-center shadow-xl/70 flex-col p-3 px-10 text-white hover:scale-105 transition ease-in-out">
            <h1 class="text-3xl">Purpose</h1>
            <p class="mt-5">I want to make a website that contains my mini projects. And also for learning PHP programming language</p>
        </div>

        <div class="w-1/3 h-50 font-semibold mx-6 rounded flex items-center shadow-xl/70 flex-col p-3 px-10 text-white hover:scale-105 transition ease-in-out">
            <h1 class="text-3xl">Purpose</h1>
            <p class="mt-5">I want to make a website that contains my mini projects. And also for learning PHP programming language</p>
        </div>
    </div>

    <!-- product-section -->
<div id="product-section" class="min-h-screen bg-[url(/assets/tes.jpg)] bg-fixed bg-no-repeat bg-cover">
    <div class="min-h-screen bg-black/50 flex flex-col md:flex-row items-center justify-center pb-4">

        <!-- todolist-section -->
        <div id="todolist" class="w-100 h-120 mx-10 flex flex-col font-semibold">
            <div class="desc text-white border-md flex justify-center  p-5 bg-(--main-color)/90 backdrop-blur-sm rounded-xl">
                <div class="product-title mx-2 mr-5">
                    <h1 class="text-5xl">To</h1>
                    <h1 class="text-5xl">Do</h1>
                    <h1 class="text-5xl">List</h1>
                </div>

                <div class="product-desc flex items-center">
                    <p>A project that can helps you to write tasks in to-do-list. You can add, edit, and delete your tasks.</p>
                </div>
                
                
            </div>
            <div class="footer-desc mt-4 flex justify-center">
                <button onclick="window.location.href = 'todolist.php'" class="text-white bg-(--thirdly-color) hover:scale-110 transition hover:shadow-xl hover:shadow-indigo-500/50 ease-in-out rounded-md p-3 cursor-pointer text-xl">Try It now</button>
            </div>
        </div>

    </div>
</div>
    
<div class="bg-(--main-color) h-80 md:h-50 flex flex-row">
    <div id="first" class="text-white mx-10 my-5 p-3">
        <h1 class="font-bold text-2xl mb-5">Dawnverse</h1>
        <p>Indonesia,</p>
        <p>East Java</p>
    </div>
</div>
    
    <script src="https://kit.fontawesome.com/88acc56766.js" crossorigin="anonymous"></script>
</body>
</html>