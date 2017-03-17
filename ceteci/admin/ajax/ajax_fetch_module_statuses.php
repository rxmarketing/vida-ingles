<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/03/2017
 * Time: 07:20 PM
 */
include('../../inc/db_ceteci_conn.php');
$output = "";
$stmt = "SELECT * FROM modulo_estatuses";
if (!$sql = $db_conx->prepare($stmt)) {
    echo "There was an error.";
    echo "Prepare statement failed! (" . $db_conx->errno . ") " . $db_conx->error;
    exit;
}
$sql->execute();
if (!$resultado = $sql->get_result()) {
    echo "There was an error.";
    echo "Could not get results (" . $db_conx->errno . ") " . $db_conx->error;
    exit;
}
$rowCount = $resultado->num_rows;


$output .= '
	<div class="table-fluid">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Estatus</th>
					<th>Descripción</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>';
if ($rowCount > 0) {
    while ($row = $resultado->fetch_assoc()) {


        $output .= '
			
				<tr>
					<td>' . $row["modulo_estatus_id"] . '</td>
					<td class="mod_estatus_nombre" data-id1="' . $row["modulo_estatus_id"] . '" contenteditable>' . $row["modulo_estatus_nombre"] . '</td>
					<td class="mod_estatus_desc" data-id2="' . $row["modulo_estatus_id"] . '" contenteditable>' . $row["modulo_estatus_desc"] . '</td>
 					<td><button name="btn_delete" id="btn_delete" data-id100="' . $row["modulo_estatus_id"] . '">x</button></td>
				</tr>
			
			';
    }// Ends while
    $output .= '<tr>
				<td></td>
				<td id="mod_estatus_nombre" contenteditable></td>
				<td id="mod_estatus_desc" contenteditable></td>
				<td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
			</tr>';
} else {
    $output .= '<tr>
				<td colspan="4">Data not found</td>
			</tr>
			<tr>
				<td></td>
				<td id="mod_estatus_nombre" contenteditable></td>
				<td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
			</tr>';
}
echo $output;
