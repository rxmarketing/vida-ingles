<?php

function output($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die();
}

require 'classes/Db.php';

$conx = new \db\Db;

//$getRow = $conx->getRow("SELECT * FROM maestro_estatuses WHERE maes_estatus_id = ?", [1]);

$getRows = $conx->getRows("SELECT * FROM maestro_estatuses");
foreach ($getRows as $row) {
    echo $row['maes_estatus_id'];
}


//$status = "Suspendido";

//$insertRow = $conx->insertRow("INSERT INTO maestro_estatuses (maes_estatus_nombre, maes_estatus_fecha_creada) VALUES (?, NOW())", [$status]);

//$updateRow = $conx->updateRow("UPDATE maestro_estatuses SET maes_estatus_nombre = ? WHERE maes_estatus_id = ?", [$status, "6"]);

//$deleteRow = $conx->deleteRow("DELETE FROM maestro_estatuses WHERE maes_estatus_id = ?", []);


//output($getRows);


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Select</title>
</head>
<body>
</body>
</html>
