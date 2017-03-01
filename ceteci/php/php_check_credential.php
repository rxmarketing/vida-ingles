<?php
// Checamos credenciales duplicados
$cred_msg = "";
if (isset($_POST['cred'])) {
sleep(2);
require_once ('../inc/db_ceteci_conn.php');
 $credential = preg_replace('#[^a-z0-9]#i', '', $_POST['cred']);
 
 $consulta = $db_conx->prepare("SELECT estud_id FROM estudiantes WHERE estud_matricula=? LIMIT 1");
 if(!$consulta){
         echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
        echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
        exit; 
 }
 $consulta->bind_param("s",$credential);
 $consulta->execute();
 $result = $consulta->get_result();
 $cred_check = $result->num_rows;
 if (strlen($credential) < 5 || strlen($credential) > 11) {
   echo '<span class="text-danger"><b>Credencial debe ser de 5 a 11 caracteres</b></span>';
   exit();
 }
 if ($cred_check > 1) {
   echo '<span class="text-danger"><strong>Número de credencial duplicado</strong></span>';
   exit();
 }
}
?>