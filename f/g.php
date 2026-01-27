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
แม่สูตรคูณ <input type="number" name="a" min="2" max="12" autofocus required>
        <button type="submit" name="Submit"> OK</button>
    </form>
<hr>

<?php
if(isset($_POST['Submit'])){
	
	$m = $_POST['a'];
	
	for($a = 1;$a<=12; $a++){
		$b = $m * $a ;
		echo "{$m}x{$a}={$b} <br>";
	}

}
?>

</body>
</html>