<?php
    session_start();
    // เช็ค Login หากไม่มี session ให้เด้งกลับหน้าแรก
    if (!isset($_SESSION['aid'])) {
        echo "<script>alert('กรุณาเข้าสู่ระบบก่อนนะคะ'); window.location='index.php';</script>";
        exit();
    }
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - Sweet Edition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #fdf2f8; }
        
        /* Sidebar Styles */
        .sidebar { min-height: 100vh; background: #ffffff; border-right: 2px dashed #f9a8d4; }
        .sidebar h4 { color: #db2777; font-weight: 500; }
        .sidebar a { 
            color: #64748b; text-decoration: none; padding: 12px 25px; 
            display: block; margin: 5px 15px; border-radius: 15px; transition: 0.3s;
        }
        .sidebar a:hover { background: #fdf2f8; color: #db2777; transform: translateX(5px); }
        .sidebar a.active { background: #f9a8d4; color: white; box-shadow: 0 4px 15px rgba(249, 168, 212, 0.4); }

        .content-area { padding: 40px; }
        
        /* Table & Cards */
        .card { border: none; border-radius: 25px; overflow: hidden; box-shadow: 0 5px 15px rgba(219, 39, 119, 0.05); }
        .table thead { background-color: #fce7f3; color: #db2777; }
        .table-hover tbody tr:hover { background-color: #fff1f2; }
        
        /* Status Badges */
        .status-badge { border-radius: 50px; padding: 5px 15px; font-size: 0.85rem; border: none; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-0 shadow-sm">
            <div class="p-4 text-center">
                <h4><i class="bi bi-stars"></i> Admin Panel</h4>
                <hr style="border-top: 2px dashed #f9a8d4; opacity: 0.3;">
            </div>
            <div class="nav flex-column">
                <a href="index2.php"><i class="bi bi-house-heart me-2"></i> หน้าหลัก</a>
                <a href="products.php"><i class="bi bi-bag-heart me-2"></i> จัดการสินค้า</a>
                <a href="orders.php" class="active"><i class="bi bi-calendar-check me-2"></i> ออเดอร์ลูกค้า</a>
                <a href="customers.php"><i class="bi bi-person-hearts me-2"></i> ข้อมูลลูกค้า</a>
                <hr style="border-top: 2px dashed #f9a8d4; opacity: 0.3;">
                <a href="logout.php" class="text-danger"><i class="bi bi-door-open me-2"></i> ออกจากระบบ</a>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="content-area">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 style="color: #be185d;"><i class="bi bi-cart-check me-2"></i>จัดการออเดอร์</h2>
                    <div class="text-muted small">
                         แอดมิน: <span class="fw-bold" style="color: #db2777;"><?php echo $_SESSION['aname']; ?></span> 🌸
                    </div>
                </div>

                <div class="card bg-white shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4" width="15%">เลขที่ออเดอร์</th>
                                    <th width="20%">ชื่อลูกค้า</th>
                                    <th width="20%">วันที่สั่งซื้อ</th>
                                    <th width="15%">ยอดรวม</th>
                                    <th width="15%">สถานะ</th>
                                    <th class="text-center" width="15%">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-clipboard-x display-4 d-block mb-3 opacity-25"></i>
                                            <p class="mb-0">ยังไม่มีรายการสั่งซื้อเข้ามาในขณะนี้...</p>
                                            <small>เมื่อมีลูกค้าสั่งซื้อ รายการจะมาปรากฏที่นี่นะคะ ✨</small>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mt-4 text-center text-muted small">
                    © 2024 Sweet Shop Management System
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>