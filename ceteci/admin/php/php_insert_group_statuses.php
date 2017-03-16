<?php
include('../../inc/db_ceteci_conn.php');
$stmt = "INSERT INTO grupo_estatuses (grupo_estatus_nombre,grupo_estatus_fecha_creada
													)
													VALUES (
														'" . $_POST["grp_status_name"] . "',
														NOW()
													)
						";
if (mysqli_query($db_conx, $stmt)) {
    echo "Data inserted successfully!";
};