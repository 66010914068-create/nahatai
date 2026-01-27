<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณหทัย โกสิลา (ออม)</title>
</head>

<body><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณหทัย โกสิลา (ออม)</title>
</head>

<body>
<h1>ณหทัย โกสิลา(ออม)</h1>

<form method="post" action ="">
กรอกคะแนน <input type="number" name="a" autofocus required>
        <button type="submit" name="Submit"> OK</button>
    </form>
<hr>

<?php
if(isset($_POST['Submit'])){
	$score = $_POST['a'];
	if ($score < 0 || $score > 100) {
		echo "กรุณากรอกคะแนนระหว่าง 0 ถึง 100";
     } else {

		if ($score > 80) {
			$grade = "A";
     } else if ($score >= 75) {
    $grade = "B" ;
    } else if ($score >= 65) {
   $grade = "C" ;
   } else if ($score >= 50) {
   $grade = "D" ;
   } else if ($score <= 49){
   $grade = "F" ;
    }
      echo "<h3>คะแนน $score ได้เกรด $grade</h3>" ;
	}
}
?>

</body>
</html>