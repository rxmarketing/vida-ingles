<?php
	
	/*Checamos credenciales duplicados
	---------------------------------------------------------------------*/
	$cred_msg = "";
	if (isset($_POST['cred'])) {
		sleep(2);
		
		/* Connect to db
		-------------------------------------------------------------------*/
		require_once ('../inc/db_ceteci_conn.php');
		
		
		/* get matricula input and store it in the variable $credential
		-------------------------------------------------------------------*/
		$credential = preg_replace('#[^a-z0-9]#i', '', $_POST['cred']);
		
		
		/* query the estudiantes table if there is a match
		-------------------------------------------------------------------*/
		$consulta = $db_conx->prepare("SELECT estud_id FROM estudiantes WHERE estud_matricula=? LIMIT 1");
		if(!$consulta){
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			exit; 
		}
		$consulta->bind_param("s",$credential);
		$consulta->execute();
		$result = $consulta->get_result();
		
		/* store result count in variable $cred_check
		-----------------------------------------------------------------------------------*/
		$cred_check = $result->num_rows;
		
		
		/* if user typed less than 5 character or more than eleven, if so, say it
		-----------------------------------------------------------------------------------*/
		if (strlen($credential) < 5 || strlen($credential) > 11) {
			echo '<span class="text-danger"><b>Credencial debe ser de 5 a 11 caracteres</b></span>';
			exit();
		}
		
		/* if there is a match, tell him so.
		-----------------------------------------------------------------------------------*/
		if ($cred_check > 1) {
			echo '<span class="text-danger"><strong>Número de credencial duplicado</strong></span>';
			exit();
		}
	}
?>