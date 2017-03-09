<?php
	include('inc/db_ceteci_conn.php');
	
	$stmt = "SELECT cef_id, modulo_nivel_id FROM modulo_subcategorias WHERE modulo_subcat_id = '1' LIMIT 1";
	if(!$sql = $db_conx->query($stmt)) {
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
		exit;
	} 
	$rowCount = $sql->num_rows;
	if($rowCount === 0) {
		
		echo 'No data!';
		exit;
		} else {
		while($row = $sql->fetch_assoc()){
			$modCefId = $row['cef_id'];
			$modLevelId = $row['modulo_nivel_id'];
			//echo 'MODULE CEF ID: '.$modCefId. ' MODULE LEVEL ID: '.$modLevelId;
		}
	}
	
	
	
?>