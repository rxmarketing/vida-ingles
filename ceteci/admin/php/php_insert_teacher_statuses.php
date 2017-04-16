<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 19/03/2017
 * Time: 04:32 PM
 */
include('../../inc/db_cetec_mysqliconn.php');
$stmt = "INSERT INTO maestro_estatuses (
													maes_estatus_nombre
													,maes_estatus_fecha_creada
													)
													VALUES (
														'" . $_POST["maes_status_name"] . "',
														NOW()
													)
						";
if (mysqli_query($db_conx, $stmt)) {
    echo "Data inserted successfully!";
};
