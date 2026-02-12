<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "4068db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// *** เพิ่ม 3 บรรทัดนี้เพื่อล้างปัญหา Collation และภาษาไทย ***
mysqli_set_charset($conn, "utf8mb4");
mysqli_query($conn, "SET NAMES utf8mb4");
mysqli_query($conn, "SET character_set_connection=utf8mb4");
?>
