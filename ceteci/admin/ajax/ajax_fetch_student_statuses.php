<?php 
	include('../../inc/db_ceteci_conn.php');
	$output = "";
	$stmt = "SELECT * FROM estudiante_estatuses";
	if(!$sql = $db_conx->prepare($stmt)){
		echo "There was an error.";
		echo "Prepare statement failed! (" . $db_conx->errno . ") " . $db_conx->error;
		exit;
	}
	$sql->execute();
	if(!$resultado = $sql->get_result()){
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
	if($rowCount > 0){
		while($row = $resultado->fetch_assoc()){
			
			
			$output .= '
			
				<tr>
					<td>'.$row["estud_estatus_id"].'</td>
					<td class="estatus_nombre" data-id1="'.$row["estud_estatus_id"].'" contenteditable>'.$row["estud_estatus_nombre"].'</td>
					<td><button name="btn_delete" id="btn_delete" data-id100=""'.$row["estud_estatus_id"].'">x</button></td>
				</tr>
			
			';
		}// ENDS while 
		$output .= '
			<tr>
				<td></td>
				<td id="estatus_nombre" contenteditable></td>
				<td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
			</tr>
		</tbody>
		';
	}
	else
	{
		$output .= '<tr>
				<td colspan="3">Data not found</td>
			</tr>
			<tr>
				<td></td>
				<td id="estatus_nombre" contenteditable></td>
				<td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
			</tr>
		</tbody>';
	}
	$output .= '</table></div>';
	
	echo $output;
	
	
?>