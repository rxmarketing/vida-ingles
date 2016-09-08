<?php
session_start();
error_reporting(E_ALL);
include_once("../inc/db_vidainglescore_conn.php");
//include_once("admin_functions.php");
$admin_ok = false;
$log_id = "";
$log_username = "";
$log_password = "";
// User Verify function
function evalLoggedUser($conx,$id,$u,$p){
	$sql = "SELECT ip FROM usuarios WHERE userid='$id' AND username='$u' AND password='$p' AND userlevel='4' AND activated='1' LIMIT 1";
    $query = mysqli_query($conx, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	} else {
		header("location:../login.php");
	}
}
if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$log_id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	// Verify the user
	$admin_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password);
} else {
 header("location:../login.php");
 exit();
}
// fetch first and lastname of logged user
$user_fullname = "";
$sql = "SELECT user_name1, user_name2, user_lastname1, user_lastname2 FROM usuarios WHERE username='$log_username' AND activated='1' LIMIT 1";
$ufullname_query = mysqli_query($db_conx,$sql);
while ($row = mysqli_fetch_array($ufullname_query, MYSQLI_ASSOC)) {
	$user_name1 = $row["user_name1"];
	$user_name2 = $row["user_name2"];
	$user_lastname1 = $row["user_lastname1"];
	$user_lastname2 = $row["user_lastname2"];
	$user_fullname .= $user_name1. ' '. $user_lastname1; 
}

// select categoria option list
function lista_categoria($db_conx) {
$cat_list_option="";
 $selqry = "SELECT * FROM categorias";
 $qry  = mysqli_query($db_conx,$selqry);
 while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
 $cat_id = $row["catid"];
 $cat_name = $row["catname"];
 $cat_list_option .="<option value=".$cat_id.">".$cat_name."</option>";
 }
 return $cat_list_option;
}

?>