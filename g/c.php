<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ณหทัย โกสิลา (ออม)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">

    <h1 class="text-center mb-4">ณหทัย โกสิลา (ออม)</h1>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>สินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>วันที่</th>
                        <th>ประเทศ</th>
                        <th>จำนวนเงิน</th>
                        <th>รูป</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                include_once("connectdb.php");

                $sql = "
                    SELECT * 
                    FROM popsupermarket 
                    WHERE p_country = 'Sweden' 
                    AND p_category = 'Vegetables'
                    ORDER BY p_product_name ASC
                ";

                $rs = mysqli_query($conn, $sql);
                $total = 0;

                while ($data = mysqli_fetch_assoc($rs)) {
                    $total += $data['p_amount'];
                ?>
                    <tr>
                        <td><?= $data['p_order_id']; ?></td>
                        <td><?= $data['p_product_name']; ?></td>
                        <td><?= $data['p_category']; ?></td>
                        <td><?= $data['p_date']; ?></td>
                        <td><?= $data['p_country']; ?></td>
                        <td class="text-end"><?= number_format($data['p_amount'], 0); ?></td>
                        <td>
                            <img src="images/<?= $data['p_product_name']; ?>.jpg"
                                 class="img-thumbnail"
                                 width="60"
                                 alt="<?= $data['p_product_name']; ?>">
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
                <tfoot>
                    <tr class="table-secondary">
                        <td colspan="5" class="text-end fw-bold">รวมทั้งหมด</td>
                        <td class="text-end fw-bold">
                            <?= number_format($total, 0); ?>
                        </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
