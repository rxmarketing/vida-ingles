<?php

require "classes/Database.php";


//$affectedRows = $conx->exec('INSERT INTO maestro_estatuses (maes_estatus_nombre, maes_estatus_fecha_creada) VALUES ("Baja Temporal", NOW())');
//
//echo $affectedRows;

function maesStatus()
{
    $conxx = new \database\Database;
    $conx = $conxx->get_conx();
    $output = null;

}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Exam</title>
</head>
<body>
<select name="" id="">
    <?php echo maesStatus(); ?>
</select>
</body>
</html>

