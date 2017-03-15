<?php
include_once("../inc/checar_sesion.php");
if($user_ok == true){
	header("location: ../user.php?u=".$_SESSION["username"]);
 exit();
}
$msg = "";
// Checks if login email already exists in database
if(isset($_POST['logem'])) {
	$loginEmail = $_POST['logem'];
 $sql = "SELECT email, password FROM usuarios WHERE email='$loginEmail' LIMIT 1";
 $query = mysqli_query($db_conx,$sql);
 if (!$query) {
		$msg = '<small><span class="bg-danger text-danger">Error verificando existencia de correo electrónico: <br />' . mysqli_error($db_conx).'</span></small>';
	echo $msg;
	exit();
	} 
 $loginemail_check = mysqli_num_rows($query);
 if($loginemail_check < 1) {
  echo '<span class="text-danger bg-danger">Tu email no existe en nuestro sistema.</span>';
  exit();
 } else {
  echo "email_ok";
 }
}
?>