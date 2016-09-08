<?php
// gather form data into variables
if(isset($_POST['msg_email'])) {
 	include_once("../inc/db_vidainglescore_conn.php");
 $msgUserid = preg_replace('#[^0-9]#','',$_POST['msg_userid']);
 $msgNombres = preg_replace('#[^a-z0-9]#i','',$_POST['msg_nombres']);
 $msgApellidos = preg_replace('#[^a-z0-9]#i','',$_POST['msg_apellidos']);
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
	$lastmsgid = mysqli_insert_id($db_conx);
	
	$sql = "SELECT mensajes.msg_userid, mensajes.msg_nombres, mensajes.msg_apellidos, mensajes.msg_email, mensajes.msg_celular, mensajes.asunto_id, mensajes.msg_mensaje, mensajes.msg_ip, mensajes.msg_datecreated, asuntos.asunto_nombre FROM mensajes INNER JOIN asuntos ON mensajes.asunto_id = asuntos.asunto_id WHERE msg_id = '$lastmsgid' LIMIT 1";
	$qry = mysqli_query($db_conx, $sql);
 while ($lastmsg = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
 $msgUserid = $lastmsg['msg_userid'];
 $msgNombres = $lastmsg['msg_nombres'];
 $msgApellidos = $lastmsg['msg_apellidos'];
 $msgEmail = $lastmsg['msg_email'];
 $msgCell = $lastmsg['msg_celular'];
 $msgAsuntoId = $lastmsg['asunto_id'];
 $msgAsuntoNombre = $lastmsg['asunto_nombre'];
 $msgMsg = $lastmsg['msg_mensaje'];
 $msgIP = $lastmsg['msg_ip'];
 $msgDate = $lastmsg['msg_datecreated'];
 }
	
	//$to = "ricardo@vidaingles.com";
  //$from = "auto_responder@vidaingles.com";
  //$headers ="From: $from\n";
  //$headers .= "MIMEVersion: 1.0\n";
  //$headers .= "Contenttype: text/html; charset=iso88591 \n";
  //$subject ="Alguien te ha contactado Ricardo";
  //$msg = '<!DOCTYPE html>  <html> <head>  <meta charset="UTF-8">  <title>Alguien ha contactado a Vida Ingles</title> </head>  <body style="margin:5px; font-family:Tahoma, Geneva, sans-serif;background-color:#A8A6AD;"> <div style="padding:10px; background:#333; font-size:20px; color:#CCC;"> <a href="http://vidaingles.com"><img src="http://vidaingles.com/i/logo50x50.png" width="36" height="30" alt="Vida Inglés" style="border:none; float:left;margin-right:10px;"></a> Alguien Te Ha Contactado! </div>  <div style="padding:24px; font-size:17px;"> <h2>Ricardo,</h2>  <small>Este es un mensaje autogenerado.</small>  <p>Alguien ha llenado el formulario de contacto en vidaingles.com/contacto</p> <p>Esta es la información:</p> <table> <tr> <td>Userid:</td><td> '.$msgUserid.'</td> </tr> <tr> <td>Nombre:</td><td>'.$msgNombres.' '.$msgApellidos.'</td> </tr> <tr> <td>Email:</td><td>'.$msgEmail.'</td> </tr> <tr> <td>Celular:</td><td>'.$msgCell.'</td> </tr> <tr> <td>Asunto:</td><td>'.$msgAsunto.'</td> </tr> <tr> <td>Mensaje:</td><td>'.$msgMensaje.'</td> </tr> <tr> <td>IP:</td><td>'.$msgIP.'</td> </tr> <tr> <td>Fecha:</td><td>'.$msgDate.'</td> </tr> </table>  <p>Comunicate con esta persona ahora mismo</p>  <small>Anthony Herrera<br />Webmaster.</small>  </div> </body> </html> ';
  //mail($to,$subject,$msg,$headers);
	
	if (!$query) {
		$msg = '<small><span class="bg-danger text-danger">Error enviando mensaje: <br />' . mysqli_error($db_conx).'</span></small>';
	} else {
		$msg = 'Mensaje enviado';
	}
	echo $msg;
 }
 exit();
}

?>