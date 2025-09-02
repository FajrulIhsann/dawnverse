<?php 
$hostname = "localhost:3306";
$username = "root";
$password = "casaos";
$db_name = "todolist_db";

$db = new mysqli($hostname, $username, $password, $db_name);
$conn = mysqli_connect($hostname, $username, $password, $db_name);

if($db->connect_error){
    die("error");
}

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
