<?php
$host = "localhost";
$user = "root";
$pwd  = "";
$db   = "4068db";

$conn = mysqli_connect($host, $user, $pwd, $db);

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลไม่ได้: " . mysqli_connect_error());
}
?>
