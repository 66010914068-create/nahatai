<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณหทัย โกสิลา(ออม)</title>
</head>

<body>

<h1>งาน i</h1>
<h1>ณหทัย โกสิลา(ออม)</h1>

<!-- ฟอร์มเพิ่มข้อมูล -->
<form method="post">
    ชื่อภาค 
    <input type="text" name="rname" autofocus required>
    <button type="submit" name="submit">บันทึก</button>
</form>

<br><br>

<?php
include_once("connectDB.php");

/* บันทึกข้อมูล */
if (isset($_POST['submit'])) {

    $rname = $_POST['rname'];

    $sql_insert = "INSERT INTO regions (r_name) VALUES ('$rname')";

    if (mysqli_query($conn, $sql_insert)) {
        echo "<p style='color:green;'>บันทึกข้อมูลสำเร็จ</p>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- ตารางแสดงข้อมูล -->
<table border="1" width="400">
<tr>
    <th>รหัสภาค</th>
    <th>ชื่อภาค</th>
    <th>ลบ</th>
</tr>

<?php

$sql = "SELECT * FROM regions ORDER BY r_id ASC";
$rs = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($rs)) {
?>
<tr>
    <td><?php echo $data['r_id']; ?></td>
    <td><?php echo $data['r_name']; ?></td>
    <td align="center">

        <a href="delete_regions.php?id=<?php echo $data['r_id']; ?>"
   onclick="return confirm('ยืนยันการลบ?');">

   🗑️

</a>


    </td>
</tr>

<?php } ?>

</table>

</body>
</html>
