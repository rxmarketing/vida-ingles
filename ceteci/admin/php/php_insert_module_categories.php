<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 19/03/2017
 * Time: 05:14 PM
 */
include('../../inc/db_ceteci_conn.php');
$stmt = "INSERT INTO modulo_categorias (
                                    modulo_cat_nombre
                                    ,modulo_cat_fecha_creada
                                    )
                                    VALUES (
                                        '" . $_POST["mod_cat_name"] . "',
                                        NOW()
                                    )
						";
if (mysqli_query($db_conx, $stmt)) {
    echo "Data inserted successfully!";
};