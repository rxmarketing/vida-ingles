<?php 
	include_once("../../inc/db_vidainglescore_conn.php");
	$id = $_POST["id"];
	$text = $_POST["text"];
	$column_name = $_POST["column_name"];
	$sql = "UPDATE estudiantes SET ".$column_name."='".$text."' WHERE estud_id='".$id."'";  
	if(mysqli_query($db_conx, $sql))  
	{  
		echo 'Data Updated';  
	}  
	
?>