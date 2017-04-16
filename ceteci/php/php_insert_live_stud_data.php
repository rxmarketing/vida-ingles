<?php
include('../inc/db_cetec_mysqliconn.php');
	$stmt = "INSERT INTO estudiantes (
										escuela_id
										,grupo_id
										,estud_pnombre
										,estud_snombre
										,estud_papellido
										,estud_sapellido
										,genero_id
										,estud_fecha_inicio
										,estud_fecha_creada
										,estud_fecha_modificacion
									)
									VALUES (
										'".$_POST["s_escuela"]."', 
										'".$_POST["s_grupo"]."', 
										'".$_POST["p_nombre"]."', 
										'".$_POST["s_nombre"]."', 
										'".$_POST["p_apellido"]."', 
										'".$_POST["s_apellido"]."', 
										'".$_POST["s_genero"]."', 
										'".$_POST["s_fechainicio"]."',
										NOW(),
										CURRENT_TIMESTAMP
										
									)
	";
	if(mysqli_query($db_conx, $stmt)){
		echo "Data inserted successfully!";
		};
?>