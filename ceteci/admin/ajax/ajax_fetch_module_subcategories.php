<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 19/03/2017
 * Time: 04:50 PM
 */
include('../../inc/db_cetec_mysqliconn.php');
$output = "";
$stmt = "SELECT * FROM modulo_subcategorias";
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
					<th>Subcategoría</th>
					<th>Categoría Id</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>';
if ($rowCount > 0) {

    /*  Display all records in table rows
    ------------------------------------------------------------------------------------------------------------*/
    while ($row = $resultado->fetch_assoc()) {
        $output .= '
                    <tr>
                        <td>' . $row["modulo_subcat_id"] . '</td>
                        <td class="mod_subcat_nombre" data-id1="' . $row["modulo_subcat_id"] . '" contenteditable>' . $row["modulo_subcat_nombre"] . '</td>
                        <td class="mod_cat_id" data-id2="' . $row["modulo_categoria_id"] . '" contenteditable>' . $row["modulo_categoria_id"] . '</td>
                        <td><button name="btn_delete" id="btn_delete" data-id100="' . $row["modulo_subcat_id"] . '">x</button></td>
                    </tr>
			    ';
    }// ENDS while

    /* Add new record row
    -----------------------------------------------------------------------------------------------------------*/
    $output .= '
			<tr>
				<td></td>
				<td id="mod_subcat_nombre" contenteditable></td>
				<td id="mod_cat_id" contenteditable></td>
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
				<td id="mod_subcat_nombre" contenteditable></td>
				<td id="mod_cat_id" contenteditable></td>
				<td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
			</tr>
		</tbody>';
}
$output .= '</table></div>';

echo $output;