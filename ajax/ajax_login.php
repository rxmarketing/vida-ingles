<?php
include_once("../inc/checar_sesion.php");
if($user_ok == true){
	header("location: ../user.php?u=".$_SESSION["username"]);
 exit();
}
if(isset($_POST["e"])){
 sleep(2);
	include_once("../inc/db_vidainglescore_conn.php");
	$e = mysqli_real_escape_string($db_conx, $_POST['e']);
	$p = hash('SHA512',$_POST['p']);
 $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	if($e == "" || $p == ""){
		echo "login_failed";
  exit();
	} else {
   $sql = "SELECT userid, username, password FROM usuarios WHERE email='$e' AND activated='1' LIMIT 1";
   $query = mysqli_query($db_conx, $sql);
   $row = mysqli_fetch_row($query);
   $db_id = $row[0];
   $db_username = $row[1];
   $db_pass_str = $row[2];
   if($p != $db_pass_str){
    echo "wrong_pass";
    exit();
   } else {
     $_SESSION['userid'] = $db_id;
     $_SESSION['username'] = $db_username;
     $_SESSION['password'] = $db_pass_str;
     setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
     setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
    	setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE);
     $sql = "UPDATE usuarios SET ip='$ip', lastlogin=now() WHERE username='$db_username' LIMIT 1";
     $query = mysqli_query($db_conx, $sql);
     echo $db_username;
     exit();
   }
 }
	exit();
}
?>