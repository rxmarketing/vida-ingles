<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 19/03/2017
 * Time: 09:17 PM
 */
include('../../inc/db_ceteci_conn.php');
$stmt = "INSERT INTO modulo_subcategorias (
                                    modulo_subcat_nombre
                                    ,modulo_categoria_id
                                    ,modulo_subcat_fecha_creada
                                    )
                                    VALUES (
                                        '" . $_POST["mod_subcat_name"] . "'
                                        ,'" . $_POST["mod_cat_id"] . "'
                                        ,NOW()
                                    )
						";
if (mysqli_query($db_conx, $stmt)) {
    echo "Data inserted successfully!";
};