<?php
include_once("../inc/checar_sesion.php");
if(isset($_POST['npassword'])){
 include_once('../inc/db_vidainglescore_conn.php');
 $newpass = $_POST['npassword'];
 $confpass = $_POST['cpassword'];
 $newpass_hash = hash('SHA512',$newpass);
 if($newpass == "" || $confpass == "") {
  echo "Completa el formulario.";
  exit();
 } else if ($newpass !== $confpass) {
  echo "Las contraseñas no son iguales!";
  exit();
 } else {
  $qry = "UPDATE usuarios SET password='$newpass_hash' WHERE userid='$log_id'";
  $updatequery = mysqli_query($db_conx,$qry);
  $resultrows = mysqli_affected_rows($db_conx);
  if ($resultrows < 1) {
   echo "No se cambió la contraseña. Error!!!";
   exit();
  }
  echo "passchange_success";
  exit();
 } // Ends data error handling
}

?>