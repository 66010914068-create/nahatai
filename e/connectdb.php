<?php
// กำหนดค่าการเชื่อมต่อ
$servername = "localhost";
$username = "root";        
$password = "";            
$dbname = "4068db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?>