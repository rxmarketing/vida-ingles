<?php
// gather form data into variables
if(isset($_POST['msg_email'])) {
 	include_once("../inc/db_vidainglescore_conn.php");
 $msgUserid = preg_replace('#[^0-9]#','',$_POST['msg_userid']);
 $msgNombres = preg_replace('#[^a-z0-9 ]#i','',$_POST['msg_nombres']);
 $msgApellidos = preg_replace('#[^a-z0-9 ]#i','',$_POST['msg_apellidos']);
 $msgEmail = mysqli_real_escape_string($db_conx, $_POST['msg_email']);
 $msgCell = preg_replace('#[^0-9]#','',$_POST['msg_cel']);
 //$msgTel = preg_replace('#[^0-9]#i','',$_POST['msg_tel']);
 $msgAsunto = preg_replace('#[^0-9]#','',$_POST['msg_asunto']);
 $msgMensaje = mysqli_real_escape_string($db_conx, $_POST['msg_mensaje']);
 $msgIP = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
 if($msgNombres == "" || $msgApellidos == "" || $msgEmail == "" || $msgAsunto == "" || $msgMensaje == ""){
  echo "Los campos con asterisco son obligatorios!";
  exit();
 } else {
  // insert data into mensajes table
  $sql = "INSERT INTO mensajes (
   msg_userid
   ,msg_nombres
   ,msg_apellidos
   ,msg_email
   ,msg_celular
   ,asunto_id
   ,msg_mensaje
   ,msg_ip
   ,msg_datecreated
  )
  VALUES (
  '$msgUserid'
  ,'$msgNombres'
  ,'$msgApellidos'
  ,'$msgEmail'
  ,'$msgCell'
  ,'$msgAsunto'
  ,'$msgMensaje'
  ,'$msgIP'
  ,NOW()
  )";
  $query = mysqli_query($db_conx, $sql);
	
	$to = "ricardo@vidaingles.com";
  $from = "auto_responder@vidaingles.com";
  $headers ="From: $from\n";
  $headers .= "MIMEVersion: 1.0\n";
  $headers .= "Contenttype: text/html; charset=iso88591 \n";
  $subject ="Alguien te ha contactado Ricardo";
  $msg = '<h2>Ricardo</h2>
	<p>Este es un mensaje autogenerado. Alguien ha llenado el formulario de contacto en vidaingles.com:</p>
		Userid: '.$msgUserid.'<br />
		Nombre: '.$msgNombres.' '.$msgApellidos.'<br />
		Email: '.$msgEmail.' <br />
		Celular: '.$msgCell.'<br />
		Asunto: '.$msgAsunto.'<br />
		Mensaje: '.$msgMensaje.'<br />
		IP: '.$msgIP.'<br /><br />
		Fecha: <br /><br />
	<p>Actua ahora mismo</p>';
  mail($to,$subject,$msg,$headers);

	if (!$query) {
		$msg = '<small><span class="bg-danger text-danger">Error enviando mensaje: <br />' . mysqli_error($db_conx).'</span></small>';
	} else {
		$msg = 'mensaje_enviado';
	}
	echo $msg;
	}
 exit();
}
?>