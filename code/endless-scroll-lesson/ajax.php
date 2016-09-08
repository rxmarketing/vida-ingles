<?php 
	require_once('functions.php');
	$start = $_GET['start'];
	$verbos = getVerbos($start,20);
	$str = "";
	foreach ($verbos as $v) {
		$str .= '<li>' . $v['baseForm'] . '</li>';
	}
	if(!empty($str)) {	
		echo $str;
		} else {
		echo "No more";
	}
?>n8