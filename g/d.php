<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ณหทัย โกสิลา (ออม)</title>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<h1>ณหทัย โกสิลา (ออม)</h1>

<?php
include_once("connectdb.php");

$sql = "SELECT p_country, SUM(p_amount) AS total 
        FROM popsupermarket 
        GROUP BY p_country
        ORDER BY total DESC";

$rs = mysqli_query($conn, $sql);

$countries = [];
$totals = [];
$total_all = 0;

while ($row = mysqli_fetch_assoc($rs)) {
    $countries[] = $row['p_country'];
    $totals[] = $row['total'];
    $total_all += $row['total'];
}
?>

<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>รายงานยอดขาย</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">ณหทัย โกสิลา (ออม)</h1>
        <p class="text-muted">รายงานสรุปยอดขายแยกตามประเทศ</p>
    </div>

    <div class="row g-4">

        <!-- ตาราง -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">
                    ตารางยอดขาย
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th>ประเทศ</th>
                                <th class="text-end">ยอดขาย (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=0; $i<count($countries); $i++) { ?>
                            <tr>
                                <td><?= $countries[$i]; ?></td>
                                <td class="text-end text-success fw-semibold">
                                    <?= number_format($totals[$i],0); ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="fw-bold">
                                <td class="text-center">รวมทั้งหมด</td>
                                <td class="text-end"><?= number_format($total_all,0); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- กราฟ -->
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header fw-bold">
                    เปรียบเทียบยอดขาย (Bar Chart)
                </div>
                <div class="card-body">
                    <canvas id="barChart" height="55"></canvas>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header fw-bold">
                    สัดส่วนยอดขาย (Pie Chart)
                </div>
                <div class="card-body">
                    <canvas id="pieChart" height="55"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
const labels = <?= json_encode($countries); ?>;
const data = <?= json_encode($totals); ?>;

// Bar Chart
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'ยอดขายรวม',
            data: data,
            borderRadius: 6
        }]
    }
});

// Pie Chart
new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            data: data
        }]
    }
});
</script>

</body>
</html>
