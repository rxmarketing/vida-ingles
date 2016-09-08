<?php
function canonical() {
	$url  = 'http://';
	$url .= $_SERVER['HTTP_HOST'];
	$url .= $_SERVER['REQUEST_URI'];
	
	echo $url;
}
?>