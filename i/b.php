<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ณหทัย โกสิลา(ออม)</title>

<style>
body{
    font-family:tahoma;
    margin:30px;
}

table{
    border-collapse:collapse;
    width:90%;
    margin-top:20px;
}

th,td{
    border:1px solid black;
    padding:8px;
    text-align:center;
}

h1{
    margin-bottom:20px;
}
</style>

</head>

<body>

<h1>ข้อมูลจังหวัด - ณหทัย โกสิลา(ออม)</h1>

<form method="post" enctype="multipart/form-data">

ชื่อจังหวัด :
<input type="text" name="pname" required>
<br><br>

เลือกภาค :
<select name="rid" required>

<option value="">-- เลือกภาค --</option>

<?php
include "connectDB.php";

$sql = "SELECT * FROM regions ORDER BY r_name ASC";
$rs = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($rs)){
    echo "<option value='{$row['r_id']}'>{$row['r_name']}</option>";
}
?>

</select>

<br><br>

เลือกรูปภาพ :
<input type="file" name="pimage" accept="image/*" required>

<br><br>

<button type="submit" name="save">บันทึก</button>

</form>

<hr>

<?php
// ================== บันทึกข้อมูล ==================

if(isset($_POST['save'])){

    $pname = $_POST['pname'];
    $rid   = $_POST['rid'];

    $file = $_FILES['pimage'];
    $ext = pathinfo($file['name'],PATHINFO_EXTENSION);

    // สร้างโฟลเดอร์ images ถ้ายังไม่มี
    if(!is_dir("images")){
        mkdir("images",0777,true);
    }

    // insert ก่อน เพื่อเอา id
    $sql = "INSERT INTO provinces(p_name,r_id,p_ext)
            VALUES('$pname','$rid','$ext')";

    if(mysqli_query($conn,$sql)){

        $pid = mysqli_insert_id($conn);

        // ย้ายไฟล์
        move_uploaded_file(
            $file['tmp_name'],
            "images/$pid.$ext"
        );

        echo "<p style='color:green'>บันทึกข้อมูลเรียบร้อย</p>";

    }else{
        echo "<p style='color:red'>บันทึกไม่สำเร็จ</p>";
    }

}
?>

<!-- ================= ตาราง ================= -->

<table>

<tr>
    <th>รหัส</th>
    <th>จังหวัด</th>
    <th>รูปภาพ</th>
    <th>ภาค</th>
</tr>

<?php

$sql = "SELECT * FROM provinces p
        INNER JOIN regions r
        ON p.r_id = r.r_id
        ORDER BY p.p_id ASC";

$rs = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($rs)){
?>

<tr>

<td><?=$row['p_id'];?></td>

<td><?=$row['p_name'];?></td>

<td>
<img src="images/<?=$row['p_id'];?>.<?=$row['p_ext'];?>" width="100">
</td>

<td><?=$row['r_name'];?></td>

</tr>

<?php } ?>

</table>

</body>
</html>
