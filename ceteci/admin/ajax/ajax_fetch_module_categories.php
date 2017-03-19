<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 19/03/2017
 * Time: 04:50 PM
 */
include('../../inc/db_ceteci_conn.php');
$output = "";
$stmt = "SELECT * FROM modulo_categorias";
if (!$sql = $db_conx->prepare($stmt)) {
    echo "There was an error.";
    echo "Prepare statement failed! (" . $db_conx->errno . ") " . $db_conx->error;
    exit;
}
$sql->execute();
if (!$resultado = $sql->get_result()) {
    echo "There is an error.";
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
					<th>Action</th>
				</tr>
			</thead>
			<tbody>';
if ($rowCount > 0) {
    while ($row = $resultado->fetch_assoc()) {


        $output .= '
			
				<tr>
					<td>' . $row["modulo_cat_id"] . '</td>
					<td class="cat_nombre" data-id1="' . $row["modulo_cat_id"] . '" contenteditable>' . $row["modulo_cat_nombre"] . '</td>
					<td><button name="btn_delete" id="btn_delete" data-id100="' . $row["modulo_cat_id"] . '">x</button></td>
				</tr>
			
			';
    }// ENDS while
    $output .= '
			<tr>
				<td></td>
				<td id="cat_nombre" contenteditable></td>
				<td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
			</tr>
		</tbody>
		';
} else {
    $output .= '<tr>
				<td colspan="3">Data not found</td>
			</tr>
			<tr>
				<td></td>
				<td id="cat_nombre" contenteditable></td>
				<td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
			</tr>
		</tbody>';
}
$output .= '</table></div>';

echo $output;