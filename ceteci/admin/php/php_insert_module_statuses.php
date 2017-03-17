<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/03/2017
 * Time: 09:27 PM
 */

include('../../inc/db_ceteci_conn.php');
$stmt = "INSERT INTO modulo_estatuses (modulo_estatus_nombre, modulo_estatus_desc, modulo_estatus_fecha_creada
													)
													VALUES (
														'" . $_POST["mod_status_name"] . "',
														'" . $_POST["mod_status_desc"] . "',
														NOW()
													)
						";
if (mysqli_query($db_conx, $stmt)) {
    echo "Data inserted successfully!";
};