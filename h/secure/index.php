<?php
session_start();
?>

<!doctype html>
<html lang="th">

<head>
<meta charset="utf-8">
<title>Login | ณหทัย โกสิลา</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #cfd9ff, #e8ddff);
    min-height: 100vh;
}

/* กล่อง Login */
.login-card{
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    padding: 40px;
}

/* ปุ่ม */
.btn-custom{
    background: linear-gradient(135deg, #6f7cff, #8f6cff);
    border: none;
    color: white;
}

.btn-custom:hover{
    opacity: 0.9;
}

/* หัวข้อ */
.login-title{
    color: #5a5fd8;
    font-weight: 600;
}

</style>

</head>

<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="login-card">

                <h3 class="text-center mb-4 login-title">
                    🔐 Admin Login
                </h3>

                <p class="text-center text-muted mb-4">
                    ระบบหลังบ้าน : ณหทัย โกสิลา (ออม)
                </p>

                <form method="post">

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text"
                               name="auser"
                               class="form-control"
                               placeholder="กรอกชื่อผู้ใช้"
                               required autofocus>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password"
                               name="apwd"
                               class="form-control"
                               placeholder="กรอกรหัสผ่าน"
                               required>
                    </div>

                    <!-- Button -->
                    <div class="d-grid">
                        <button type="submit"
                                name="Submit"
                                class="btn btn-custom btn-lg">
                            เข้าสู่ระบบ
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>


<?php

if(isset($_POST['Submit'])){

    include_once("connectdb.php");

    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    $sql = "SELECT * FROM admin 
            WHERE a_username='$user' 
            AND a_password='$pwd' 
            LIMIT 1";

    $rs = mysqli_query($conn,$sql);

    if(mysqli_num_rows($rs)==1){

        $data = mysqli_fetch_assoc($rs);

        $_SESSION['aid']   = $data['a_id'];
        $_SESSION['aname'] = $data['a_name'];

        echo "<script>
                window.location='index2.php';
              </script>";

    }else{

        echo "<script>
                alert('❌ Username หรือ Password ไม่ถูกต้อง');
              </script>";
    }

}
?>

</body>
</html>
