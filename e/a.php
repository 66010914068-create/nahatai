<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ณหทัย โกสิลา(ออม) - ฟอร์มสมาชิก</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .color-preview {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 1px solid #ccc;
        vertical-align: middle;
        margin-left: 5px;
    }
</style>
</head>

<body>
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="h3 mb-0">ฟอร์มสมัครสมาชิก - ณหทัย โกสิลา(ออม)</h1>
        </div>
        <div class="card-body">
            <form method="post" action="">
                
                <div class="mb-3">
                    <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">เบอร์โทร</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{9,10}" title="กรุณากรอกเบอร์โทรศัพท์ 10 หลัก">
                </div>

                <div class="mb-3">
                    <label for="height" class="form-label">ความสูง (ซม.)</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="height" name="height" step="5" min="100" max="250" required>
                        <span class="input-group-text">ซม.</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label d-block">สีที่ชอบ</label>
                    <input type="color" class="form-control form-control-color" id="color" name="color" value="#000000" title="เลือกสีที่ชอบ">
                </div>

                <div class="mb-3">
                    <label for="major" class="form-label">สาขาวิชา</label>
                    <select class="form-select" id="major" name="major" required>
                        <option value="การบัญชี">การบัญชี</option>
                        <option value="การจัดการ">การจัดการ</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                        <option value="การเงิน">การเงิน</option>
                    </select>
                </div>
                
                <hr>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="Submit" class="btn btn-success me-md-2">✅ สมัครสมาชิก</button>
                    <button type="reset" class="btn btn-warning text-dark me-md-2">🔄 Reset</button>
                    <button type="button" class="btn btn-info text-dark me-md-2" onClick="window.location='http://www.msu.ac.th'; ">🌐 go to MSU</button>
                    <button type="button" class="btn btn-secondary" onClick="window.print();">🖨️ พิมพ์</button>
                </div>
            </form>
        </div>
    </div>
    
    <hr class="my-4">

    <div class="mt-4">
        <?php
        if(isset($_POST['Submit'])){
            $fullname = htmlspecialchars($_POST['fullname']);
            $phone = htmlspecialchars($_POST['phone']);
            $height = htmlspecialchars($_POST['height']);
            $color = htmlspecialchars($_POST['color']);
            $major = htmlspecialchars($_POST['major']);
            
         include_once("connectdb.php");

    $sql = "INSERT INTO register
            (r_id, r_name, r_phone, r_major, r_color, r_height)
            VALUES
            (NULL, '$fullname', '$phone', '$major', '$color', '$height')";

  $conn = mysqli_connect($host,$user,$pwd,$DB) or die ("เชื่อมต่อฐานข้อมูลไม่ได้");

    echo "<script>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "</script>";
}
?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>