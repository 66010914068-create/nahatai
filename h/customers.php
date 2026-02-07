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
    <title>จัดการลูกค้า - Sweet Edition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #fdf2f8; }
        
        /* Sidebar (ชุดเดิมเพื่อความต่อเนื่อง) */
        .sidebar { min-height: 100vh; background: #ffffff; border-right: 2px dashed #f9a8d4; }
        .sidebar h4 { color: #db2777; font-weight: 500; }
        .sidebar a { 
            color: #64748b; text-decoration: none; padding: 12px 25px; 
            display: block; margin: 5px 15px; border-radius: 15px; transition: 0.3s;
        }
        .sidebar a:hover { background: #fdf2f8; color: #db2777; }
        .sidebar a.active { background: #f9a8d4; color: white; box-shadow: 0 4px 15px rgba(249, 168, 212, 0.4); }

        .content-area { padding: 40px; }
        
        /* Table & Cards */
        .card { border: none; border-radius: 25px; overflow: hidden; }
        .table thead { background-color: #f3e8ff; color: #a855f7; } /* โทนม่วงพาสเทลสำหรับหน้าลูกค้า */
        
        .btn-action { border-radius: 10px; border: none; padding: 5px 10px; transition: 0.2s; }
        .btn-edit { background-color: #e0f2fe; color: #0ea5e9; }
        .btn-delete { background-color: #fee2e2; color: #ef4444; }
        .btn-action:hover { opacity: 0.8; transform: scale(1.1); }

        .search-box { border-radius: 50px; border: 2px solid #f3e8ff; padding-left: 20px; }
        .search-box:focus { box-shadow: none; border-color: #a855f7; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-0 shadow-sm">
            <div class="p-4 text-center">
                <h4><i class="bi bi-stars"></i> Admin Panel</h4>
                <hr>
            </div>
            <div class="nav flex-column">
                <a href="index2.php"><i class="bi bi-house-heart me-2"></i> หน้าหลัก</a>
                <a href="products.php"><i class="bi bi-bag-heart me-2"></i> จัดการสินค้า</a>
                <a href="orders.php"><i class="bi bi-calendar-check me-2"></i> ออเดอร์ลูกค้า</a>
                <a href="customers.php" class="active"><i class="bi bi-person-hearts me-2"></i> ข้อมูลลูกค้า</a>
                <hr>
                <a href="logout.php" class="text-danger"><i class="bi bi-door-open me-2"></i> ออกจากระบบ</a>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="content-area">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 style="color: #7e22ce;"><i class="bi bi-people-fill me-2"></i>จัดการข้อมูลลูกค้า</h2>
                    <div class="user-badge" style="color: #a855f7;">
                        แอดมิน: <strong><?php echo $_SESSION['aname']; ?></strong> ✨
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="input-group shadow-sm" style="border-radius: 50px; overflow: hidden;">
                            <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-0 search-box" placeholder="ค้นหาชื่อลูกค้า...">
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4">ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>อีเมล / เบอร์โทรศัพท์</th>
                                    <th>วันที่สมัครสมาชิก</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td colspan="5" class="py-5 text-muted">
                                        <i class="bi bi-person-plus fs-1 d-block mb-2"></i>
                                        ยังไม่มีข้อมูลลูกค้าในขณะนี้
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>