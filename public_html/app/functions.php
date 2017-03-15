<?php
	function canonical() {
		$url  = 'http://';
		$url .= $_SERVER['HTTP_HOST'];
		$url .= $_SERVER['REQUEST_URI'];
		echo $url;
	}
	function home() {
		$home  = 'http://';
		$home .= $_SERVER['HTTP_HOST'];
		echo $home;
	}
	
	$useragent = $_SERVER['HTTP_USER_AGENT'];
?>