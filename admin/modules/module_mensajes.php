<?php
include_once("inc/checar_sesion.php");
include_once("inc/functions.php");
$msglist = "";
$sql = "SELECT mensajes.msg_userid, mensajes.msg_nombres, mensajes.msg_apellidos, mensajes.msg_email, mensajes.msg_celular, mensajes.asunto_id, mensajes.msg_mensaje, mensajes.msg_ip, mensajes.msg_datecreated, asuntos.asunto_nombre FROM mensajes INNER JOIN asuntos ON mensajes.asunto_id = asuntos.asunto_id ORDER BY msg_datecreated DESC";
$qry = mysqli_query($db_conx,$sql);
while ($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
 //$msgid = $row['msg_id'];
 $msguserid = $row['msg_userid'];
 $msgnombres = $row['msg_nombres'];
 $msgapellidos = $row['msg_apellidos'];
 $msgnombrecompleto = $msgnombres . ' ' . $msgapellidos;
 $msgemail = $row['msg_email'];
 $msgcell = $row['msg_celular'];
  $cel1 = substr($msgcell,0,3); 
  $cel2 = substr($msgcell,3,3); 
  $cel3 = substr($msgcell,6,4); 
  $msgcelformatted = '('.$cel1 . ') ' . $cel2 . ' ' . $cel3;
 $msgasuntoid = $row['asunto_id'];
 $msgasuntonombre = $row['asunto_nombre'];
 $msgmensaje = $row['msg_mensaje'];
 $msgdatesent = $row['msg_datecreated'];
 if ($admin_ok == true) { 
 $msglist .= '<tr>
               <td><abbr class="timeago" title="'.$msgdatesent.'">'.$msgdatesent.'</abbr></td>
               <td>'.$msgnombrecompleto.'</td>
               <td>'.$msgcelformatted.'</td>
               <td>'.$msgemail.'</td>
               <td>'.$msgasuntonombre.'</td></tr>
               <tr><td colspan="3">Mensaje: '.$msgmensaje.'</td>
              </tr>';
 } else {
  $msglist = "No tienes permiso para ver esta página.";
 }
}
?>
 <tbody><?php echo $msglist; ?></tbody>