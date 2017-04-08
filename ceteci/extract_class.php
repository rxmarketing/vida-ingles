<?php
require "classes/Database.php";

$pdo = new dbconn\Database();


$getRows = $pdo->getRows("SELECT * FROM maestro_estatuses");
$list = null;
foreach ($getRows as $row) {
    //echo $row['maes_estatus_nombre'];
    $list .= '<option value="' . $row['maes_estatus_id'] . '">' . $row['maes_estatus_nombre'] . '</option>';
}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Extract class sample</title>
</head>
<body>
<form action="">
	<select name="" id="">
      <?php echo $list; ?>
	</select>
</form>
</body>
</html>
