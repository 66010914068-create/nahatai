<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ณหทัย โกสิลา (ออม)</title>
</head>

<body>
<h1>ณหทัย โกสิลา (ออม)</h1>

<table border="1" cellpadding="6" cellspacing="0">
<tr>
    <th>Order ID</th>
    <th>สินค้า</th>
    <th>ประเภทสินค้า</th>
    <th>วันที่</th>
    <th>ประเทศ</th>
    <th>จำนวนเงิน</th>
    <th>รูป</th>
</tr>    

<?php
include_once("connectdb.php");

$sql = "
SELECT * 
FROM popsupermarket 
WHERE p_country = 'Canada' 
AND p_category = 'Vegetables'
ORDER BY p_product_name ASC
";

$rs = mysqli_query($conn, $sql);
$total = 0;

while ($data = mysqli_fetch_assoc($rs)) {
    $total += $data['p_amount'];
?>
<tr>
   <td align="center" style="color:blue;">
       <?php echo $data['p_order_id']; ?>
   </td>

   <td style="color:red;">
       <?php echo $data['p_product_name']; ?>
   </td>

   <td style="color:green;">
       <?php echo $data['p_category']; ?>
   </td>

   <td>
       <?php echo $data['p_date']; ?>
   </td>

   <td style="color:red;">
       <?php echo $data['p_country']; ?>
   </td>

   <td align="right" style="color:green;">
       <?php echo number_format($data['p_amount'],0); ?>
   </td>

   <td align="center">
       <img src="<?php echo $data['p_product_name']; ?>.jpg" width="50">
   </td>
</tr> 
<?php } ?>

<tr>
   <td colspan="5" align="right"><strong>รวมทั้งหมด</strong></td>
   <td align="right"><strong><?php echo number_format($total,0); ?></strong></td>
   <td></td>
</tr>

</table>

</body>
</html>
