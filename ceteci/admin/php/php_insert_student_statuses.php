<?php
include('../../inc/db_cetec_mysqliconn.php');
	$stmt = "INSERT INTO estudiante_estatuses (
													estud_estatus_nombre
													,estud_estatus_fecha_creada
													)
													VALUES (
														'".$_POST["stud_status_name"]."',
														NOW()
													)
						";
	if(mysqli_query($db_conx, $stmt)){
		echo "Data inserted successfully!";
	};
?>