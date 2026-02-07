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
<title>จัดการลูกค้า | Admin</title>
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

.menu a:hover,
.menu .active{
    background: rgba(255,255,255,0.25);
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

            <a href="customers.php" class="active">
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
            👥 จัดการลูกค้า
        </h3>


        <div class="card dashboard-card p-4">

            <div class="d-flex justify-content-between mb-3">

                <h5 class="mb-0">รายชื่อลูกค้า</h5>

                <input type="text"
                       class="form-control w-25"
                       placeholder="🔍 ค้นหาลูกค้า">

            </div>


            <!-- Table -->
            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-primary text-center">

                        <tr>
                            <th>ID</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>Email</th>
                            <th>เบอร์โทร</th>
                            <th>วันที่สมัคร</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>

                    </thead>

                    <tbody class="text-center">

                        <!-- ตัวอย่างข้อมูล -->
                        <tr>

                            <td>1</td>
                            <td>สมชาย ใจดี</td>
                            <td>somchai@email.com</td>
                            <td>089-1234567</td>
                            <td>01/02/2026</td>

                            <td>
                                <span class="badge bg-success">
                                    ปกติ
                                </span>
                            </td>

                            <td>

                                <a href="#"
                                   class="btn btn-sm btn-info text-white">
                                    ดู
                                </a>

                                <a href="#"
                                   class="btn btn-sm btn-warning text-white">
                                    แก้ไข
                                </a>

                                <a href="#"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('ยืนยันการลบลูกค้า?')">
                                    ลบ
                                </a>

                            </td>

                        </tr>


                        <tr>

                            <td>2</td>
                            <td>สุดา รุ่งเรือง</td>
                            <td>suda@email.com</td>
                            <td>081-9876543</td>
                            <td>05/02/2026</td>

                            <td>
                                <span class="badge bg-secondary">
                                    ระงับ
                                </span>
                            </td>

                            <td>

                                <a href="#"
                                   class="btn btn-sm btn-info text-white">
                                    ดู
                                </a>

                                <a href="#"
                                   class="btn btn-sm btn-warning text-white">
                                    แก้ไข
                                </a>

                                <a href="#"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('ยืนยันการลบลูกค้า?')">
                                    ลบ
                                </a>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>


    </div>

</div>
</div>

</body>
</html>
