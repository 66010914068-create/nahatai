<?php
session_start();

// ป้องกันเข้าโดยไม่ Login
if(!isset($_SESSION['aid'])){
    header("location: login.php");
    exit();
}

$aname = $_SESSION['aname'];
?>

<!doctype html>
<html lang="th">

<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

body{
    font-family: 'Poppins', sans-serif;
    background: #f5f7fb;
}

/* Sidebar */
.sidebar{
    background: linear-gradient(180deg, #6f7cff, #8f6cff);
    min-height: 100vh;
    color: white;
    padding: 20px;
}

/* Logo */
.logo{
    font-size: 22px;
    font-weight: 600;
}

/* Menu */
.menu a{
    display: block;
    color: white;
    text-decoration: none;
    padding: 12px 15px;
    border-radius: 10px;
    margin-bottom: 8px;
    transition: 0.3s;
}

.menu a:hover{
    background: rgba(255,255,255,0.2);
}

/* Content */
.content{
    padding: 30px;
}

/* Card */
.dashboard-card{
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

</style>

</head>

<body>

<div class="container-fluid">
<div class="row">

    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 sidebar">

        <div class="mb-4 text-center logo">
            🛠 Admin Panel
        </div>

        <div class="text-center mb-4">
            👋 สวัสดี<br>
            <strong><?php echo $aname; ?></strong>
        </div>

        <div class="menu">

            <a href="index2.php">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="products.php">
                <i class="bi bi-box-seam"></i> จัดการสินค้า
            </a>

            <a href="orders.php">
                <i class="bi bi-cart-check"></i> จัดการออเดอร์
            </a>

            <a href="customers.php">
                <i class="bi bi-people"></i> จัดการลูกค้า
            </a>

            <a href="logout.php" class="text-warning">
                <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
            </a>

        </div>

    </div>


    <!-- Main Content -->
    <div class="col-md-9 col-lg-10 content">

        <h3 class="mb-4">
            📊 Dashboard
        </h3>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card dashboard-card p-3 text-center">

                    <h5>สินค้า</h5>
                    <p class="text-muted">จัดการข้อมูลสินค้า</p>

                    <a href="products.php" class="btn btn-primary btn-sm">
                        จัดการ
                    </a>

                </div>
            </div>


            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card dashboard-card p-3 text-center">

                    <h5>ออเดอร์</h5>
                    <p class="text-muted">ตรวจสอบคำสั่งซื้อ</p>

                    <a href="orders.php" class="btn btn-success btn-sm">
                        ดูรายการ
                    </a>

                </div>
            </div>


            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card dashboard-card p-3 text-center">

                    <h5>ลูกค้า</h5>
                    <p class="text-muted">จัดการข้อมูลลูกค้า</p>

                    <a href="customers.php" class="btn btn-warning btn-sm">
                        ดูข้อมูล
                    </a>

                </div>
            </div>

        </div>


    </div>

</div>
</div>

</body>
</html>
