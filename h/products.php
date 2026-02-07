<?php
    include_once("check_login.php"); 
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - Sweet Edition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #fdf2f8; }
        
        /* Sidebar สไตล์นุ่มนวล */
        .sidebar { min-height: 100vh; background: #ffffff; border-right: 2px dashed #f9a8d4; }
        .sidebar h4 { color: #db2777; font-weight: 500; }
        .sidebar a { 
            color: #64748b; text-decoration: none; padding: 12px 25px; 
            display: block; margin: 5px 15px; border-radius: 15px; transition: 0.3s;
        }
        .sidebar a:hover { background: #fdf2f8; color: #db2777; transform: translateX(5px); }
        .sidebar a.active { background: #f9a8d4; color: white; box-shadow: 0 4px 15px rgba(249, 168, 212, 0.4); }

        .content-area { padding: 40px; }
        
        /* Card และ Table */
        .card { border: none; border-radius: 25px; overflow: hidden; box-shadow: 0 5px 15px rgba(219, 39, 119, 0.05); }
        .table { margin-bottom: 0; }
        .table thead { background-color: #fce7f3; color: #db2777; }
        .table-hover tbody tr:hover { background-color: #fff1f2; }
        
        /* ปุ่มแบบมน */
        .btn-add { 
            background-color: #db2777; color: white; border-radius: 50px; 
            padding: 10px 25px; border: none; transition: 0.3s;
        }
        .btn-add:hover { background-color: #be185d; color: white; transform: scale(1.05); box-shadow: 0 5px 15px rgba(219, 39, 119, 0.2); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-0">
            <div class="p-4 text-center">
                <h4><i class="bi bi-stars"></i> Admin Panel</h4>
                <hr style="border-top: 2px dashed #f9a8d4; opacity: 0.3;">
            </div>
            <div class="nav flex-column">
                <a href="index2.php"><i class="bi bi-house-heart me-2"></i> หน้าหลัก</a>
                <a href="products.php" class="active"><i class="bi bi-bag-heart me-2"></i> จัดการสินค้า</a>
                <a href="orders.php"><i class="bi bi-calendar-check me-2"></i> ออเดอร์ลูกค้า</a>
                <a href="customers.php"><i class="bi bi-person-hearts me-2"></i> ข้อมูลลูกค้า</a>
                <hr style="border-top: 2px dashed #f9a8d4; opacity: 0.3;">
                <a href="logout.php" class="text-danger"><i class="bi bi-door-open me-2"></i> ออกจากระบบ</a>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="content-area">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 style="color: #be185d;"><i class="bi bi-box-seam me-2"></i> จัดการรายการสินค้า</h2>
                    <button class="btn btn-add shadow-sm"><i class="bi bi-plus-circle me-2"></i>เพิ่มสินค้าใหม่</button>
                </div>

                <div class="card bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th class="ps-4" width="10%">รูปภาพ</th>
                                    <th width="30%">ชื่อสินค้า</th>
                                    <th width="15%">หมวดหมู่</th>
                                    <th width="15%">ราคา</th>
                                    <th width="15%">คลังสินค้า</th>
                                    <th class="text-center" width="15%">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox-fill display-4 d-block mb-3 opacity-25"></i>
                                            <p class="mb-0">ยังไม่มีรายการสินค้าในขณะนี้...</p>
                                            <small>เริ่มเพิ่มสินค้าชิ้นแรกโดยกดปุ่ม "เพิ่มสินค้าใหม่" ด้านบนนะคะ ✨</small>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <div class="small text-muted">
                        แอดมิน: <span class="fw-bold" style="color: #db2777;"><?php echo $_SESSION['aname']; ?></span>
                    </div>
                    <div class="small text-muted">
                        © 2024 Sweet Shop Management
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>