<?php
	include_once("../inc/checar_sesion.php");
	// AJAX CALLS THIS CODE TO EXECUTE
	if(isset($_POST["email"])){
		$e = mysqli_real_escape_string($db_conx,$_POST['email']);
		$sql = "SELECT userid, username FROM usuarios WHERE email='$e' AND activated='1' LIMIT 1";
		$query = mysqli_query($db_conx, $sql);
		$numrows = mysqli_num_rows($query);
		if($numrows > 0) {
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
				$aid = $row["userid"];
				$ausername = $row["username"];
			} // Ends while
			$emailcut = substr($e, 0, 4);
			$randNum = rand(10000,99999);
			$tempPass = "$emailcut$randNum";
			$hashTempPass = hash('SHA512',$tempPass);
			$sql = "UPDATE usuarios SET temp_pass='$hashTempPass' WHERE username='$ausername' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			if (!$query) {
				$error = '<small><span class="bg-danger text-danger">Error guardando contraseña temporal: '. mysqli_error($db_conx).'</span></small>';
				echo $error;
				exit();
				} else {
				$to = "$e";
				$from = "auto_responder@vidaingles.com";
				$subject ="Vida Ingles Contrasena Temporal";
				$msg = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Contrase&ntilde;a temporal Vida Ingles</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background-color:#442145 ; font-size:20px; color:#CCC;"><a href="http://vidaingles.com"><img src="http://vidaingles.com/i/logo50x50.png" width="36" height="30" alt="Vida Ingl&eacute;s" style="border:none; float:left;"></a>&nbsp;Contrase&ntilde;a temporal</div><div style="padding:24px; font-size:17px;background-color:#eee;"><h2>Hola '.$ausername.'</h2><p>Este es un mensaje autogenerado. Si no solicitaste una contrase&ntilde;a temporal, por favor ignora este mensaje.</p><p>Has indicado que has olvidado tu contrase&ntilde;a para inicio de sesi&oacute;n. Hemos  generado una contrase&ntilde;a temporal para que puedas iniciar sesi&oacute;n, luego, una vez iniciado sesi&oacute;n podr&aacute;s cambiar la contrase&ntilde;a a una de tu elecci&oacute;n.</p><p>Despu&eacute;s de hacer clic a bot&oacute;n de abajo tu contrase&ntilde;a temporal ser&aacute;:<br /> <b>'.$tempPass.'</b></p><p><a href="http://vidaingles.com/forgotpass.php?u='.$ausername.'&p='.$hashTempPass.'"><button style="background-color:#502F51 ;color:#fff;padding:8px;font-size:18px;border-radius:5px;">Clic aqu&iacute; para inicar sesi&oacute;n con tu contrase&ntilde;a temporal</button></a></p><p>Si no haces clic al bot&oacute;n, ningun cambio se har&aacute; a tu cuenta. Para cambiar tu contrase&ntilde;a de inicio de sesi&oacute;n a esta contrase&ntilde;a temporal debes hacer clic al bot&oacute;n de arriba.</p></body></html>';
				$headers ="From: $from\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$sendemail = mail($to,$subject,$msg,$headers);
				if (!$sendemail) { 
				$error = '<small><span class="bg-danger text-danger">Error envidando email: '. mysqli_error($db_conx).'</span></small>';
				echo $error;
				exit();
				}
				echo "generatetemppass_success";
				exit();
			}// Ends if mail()
			} else {
			echo "Este correo electrónico no existe en nuestro sistema.";
		} // Ends if numrows
		exit();
	}// Ends if isset()
?>