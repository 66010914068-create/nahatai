<?php
include_once("connectdb.php");

$sql = "SELECT * FROM regions";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จัดการภาค</title>

<style>
table{
    border-collapse: collapse;
    width: 60%;
}
th,td{
    border:1px solid black;
    padding:8px;
    text-align:center;
}
</style>

</head>
<body>

<h2>ข้อมูลภาค</h2>

<table>
<tr>
    <th>รหัส</th>
    <th>ชื่อภาค</th>
    <th>จัดการ</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?php echo $row['r_id']; ?></td>
    <td><?php echo $row['r_name']; ?></td>
    <td>
        <a href="delete_regions.php?id=<?php echo $row['r_id']; ?>"
           onclick="return confirm('ต้องการลบใช่หรือไม่?');">
           ลบ
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
