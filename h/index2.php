<?php
session_start();
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
    <title>Admin Dashboard - Sweet Edition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body { 
            font-family: 'Kanit', sans-serif; 
            background-color: #fdf2f8; /* สีชมพูอ่อนมากๆ */
        }
        
        /* Sidebar สไตล์พาสเทล */
        .sidebar { 
            min-height: 100vh; 
            background: #ffffff; 
            border-right: 2px dashed #f9a8d4; /* เส้นประเพิ่มความกุ๊กกิ๊ก */
        }
        
        .sidebar h4 { color: #db2777; font-weight: 500; }
        
        .sidebar a { 
            color: #64748b; 
            text-decoration: none; 
            padding: 12px 25px; 
            display: block; 
            margin: 5px 15px;
            border-radius: 15px;
            transition: 0.3s;
        }
        
        .sidebar a:hover { 
            background: #fdf2f8; 
            color: #db2777; 
            transform: translateX(5px);
        }
        
        .sidebar a.active { 
            background: #f9a8d4; 
            color: white; 
            box-shadow: 0 4px 15px rgba(249, 168, 212, 0.4);
        }

        /* Content Area */
        .content-area { padding: 40px; }
        
        .user-badge { 
            background: #ffffff; 
            padding: 8px 20px; 
            border-radius: 20px; 
            border: 2px solid #fbcfe8;
            color: #be185d;
        }

        /* การ์ดแบบนุ่มนวล */
        .card { 
            border: none; 
            border-radius: 25px; 
            transition: transform 0.3s;
            overflow: hidden;
        }
        
        .card:hover { 
            transform: translateY(-10px);
        }
        
        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .bg-pastel-blue { background-color: #e0f2fe; color: #0ea5e9; }
        .bg-pastel-pink { background-color: #fdf2f8; color: #db2777; }
        .bg-pastel-purple { background-color: #f3e8ff; color: #a855f7; }

        hr { border-top: 2px dashed #f9a8d4; opacity: 0.3; }
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
                <a href="index2.php" class="active"><i class="bi bi-house-heart me-2"></i> หน้าหลัก</a>
                <a href="products.php"><i class="bi bi-bag-heart me-2"></i> จัดการสินค้า</a>
                <a href="orders.php"><i class="bi bi-calendar-check me-2"></i> ออเดอร์ลูกค้า</a>
                <a href="customers.php"><i class="bi bi-person-hearts me-2"></i> ข้อมูลลูกค้า</a>
                <hr>
                <a href="logout.php" class="text-danger"><i class="bi bi-door-open me-2"></i> ออกจากระบบ</a>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="content-area">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 style="color: #be185d;">ยินดีต้อนรับกลับนะคะ ✨</h2>
                    <div class="user-badge shadow-sm">
                        <i class="bi bi-stars text-warning"></i> 
                        แอดมิน: <strong><?php echo $_SESSION['aname']; ?></strong>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm p-4">
                            <div class="icon-circle bg-pastel-blue">
                                <i class="bi bi-box2-heart fs-2"></i>
                            </div>
                            <h5 class="text-secondary">สินค้าทั้งหมด</h5>
                            <h2 class="fw-bold" style="color: #0ea5e9;">120</h2>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm p-4">
                            <div class="icon-circle bg-pastel-pink">
                                <i class="bi bi-cart-check fs-2"></i>
                            </div>
                            <h5 class="text-secondary">ออเดอร์วันนี้</h5>
                            <h2 class="fw-bold" style="color: #db2777;">15</h2>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm p-4">
                            <div class="icon-circle bg-pastel-purple">
                                <i class="bi bi-people fs-2"></i>
                            </div>
                            <h5 class="text-secondary">สมาชิกของเรา</h5>
                            <h2 class="fw-bold" style="color: #a855f7;">450</h2>
                        </div>
                    </div>
                </div>

                <div class="card p-4 shadow-sm mt-3" style="background: rgba(255,255,255,0.6); border: 2px dashed #f9a8d4;">
                    <p class="mb-0 text-center text-muted">วันนี้มีเรื่องน่ายินดีอะไรบ้างคะ? เริ่มจัดการระบบได้เลย! 🌸</p>
                </div>

            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>