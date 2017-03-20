<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 19/03/2017
 * Time: 09:17 PM
 */
include('../../inc/db_ceteci_conn.php');
$modSubCatName = $_POST['mod_subcat_name'];
$modCatId = $_POST['mod_cat_id'];

$stmt = $db_conx->prepare("INSERT INTO modulo_subcategorias (modulo_subcat_nombre ,modulo_categoria_id,modulo_subcat_fecha_creada) 
                          VALUES ( ?,?,NOW())");
if (!$stmt) {
    echo "Fallo la preparacion )" . $db_conx->errno . ") " . $db_conx->error;
    exit;
}
$stmt->bind_param('sd', $modSubCatName, $modCatId);
$stmt->execute();
$affectedRows = $stmt->affected_rows;
if ($affectedRows > 0) {
    echo "Record inserted successfully!";
} else {
    echo "Sorry. Record could not be inserted!";
}