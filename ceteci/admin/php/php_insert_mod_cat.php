<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 19/03/2017
 * Time: 05:51 PM
 */
include('../../inc/db_cetec_mysqliconn.php');
$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];
$sql = "UPDATE modulo_categorias SET " . $column_name . "='" . $text . "' WHERE modulo_cat_id='" . $id . "'";
if (mysqli_query($db_conx, $sql)) {
    echo 'Data Updated';
}