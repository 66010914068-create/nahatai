<?php
include_once("connectdb.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM regions WHERE r_id='$id'";
    mysqli_query($conn, $sql) or die("ลบไม่ได้");

    // กลับไปหน้า a.php
    header("Location: a.php");
    exit();
}
?>
