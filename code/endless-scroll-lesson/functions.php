<?php
	
	function getVerbos($start,$num){
		include_once("../../inc/db_vidainglescore_conn.php");
		$sql = "SELECT * FROM verbos LIMIT $start, $num";
		$arr = array();
		$query = mysqli_query($db_conx,$sql);
		while($row = mysqli_fetch_assoc($query)){
			$arr[] = $row;
		}
		return $arr;
	} // Ends getVerbos function
	
	
	
?>