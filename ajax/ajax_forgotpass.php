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
				$headers ="From: $from\n";
				$headers .= "MIMEVersion: 1.0\n";
				$headers .= "Contenttype: text/html; charset=iso88591 \n";
				$subject ="Vida Inglés Contraseña Temporal";
				$msg = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Contraseña temporal Vida Ingles</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background-color:#442145 ; font-size:20px; color:#CCC;"><a href="http://vidaingles.com"><img src="http://vidaingles.com/i/logo50x50.png" width="36" height="30" alt="Vida Inglés" style="border:none; float:left;"></a>&nbsp;Contraseña temporal</div><div style="padding:24px; font-size:17px;background-color:#eee;"><h2>Hola '.$ausername.'</h2><p>Este es un mensaje autogenerado. Si no solicitaste una contraseña temporal, por favor ignora este mensaje.</p><p>Has indicado que has olvidado tu contraseña para inicio de sesión. Hemos  generado una contraseña temporal para que puedas iniciar sesión, luego, una vez iniciado sesión podrás cambiar la contraseña a una de tu elección.</p><p>Después de hacer clic a botón de abajo tu contraseña temporal será:<br /> <b>'.$tempPass.'</b></p><p><a href="http://www.vidaingles.com/forgotpass.php?u='.$ausername.'&p='.$hashTempPass.'"><button style="background-color:#502F51 ;color:#fff;padding:8px;font-size:18px;border-radius:5px;">Clic aquí para inicar sesión con tu contraseña temporal</button></a></p><p>Si no haces clic al botón, ningun cambio se hará a tu cuenta. Para cambiar tu contraseña de inicio de sesión a esta contraseña temporal debes hacer clic al botón de arriba.</p><p>James Segovia<br ><small>Atencion al cliente.</small></p><p><a href="http://vidaingles.com">Vida Ingles</a></p><div style="font-size: 12px;text-align: center;"><a href="http://vidaingles.com">Inicio</a> | <a href="http://vidaingles.com/lecciones">Lecciones</a> | <a href="http://vidaingles.com/ejercicios">Ejercicios</a> | <a href="htpp://vidaingles.com/cursos">Cursos</a> | <a href="http://vidaingles.com/canciones">Canciones</a> | <a href="http://vidaingles.com/verbos">Verbos</a> | <a href="http://vidaingles.com/estructuras">Estructuras</a></div></div></body></html>';
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