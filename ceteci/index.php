<?php

use database\Db;
include "classes/DB.php";

function isLoggedIn(){

	if(isset($_COOKIE['CETECID'])){
		
		if(DB::getRow('SELECT estud_id FROM cetec.login_tokens WHERE token=:tok',[':tok'=>sha1($_COOKIE['CETECID'])])){
			
			$logged_id = DB::getRow('SELECT estud_id FROM cetec.login_tokens WHERE token=:tok',[':tok'=>sha1($_COOKIE['CETECID'])])[0]['estud_id'];
			
			if(isset($_COOKIE['CETECID_'])){
				return $logged_id;
			} else {
				$crypt_strong = True;
    		$token = bin2hex(openssl_random_pseudo_bytes(64,$crypt_strong));
				DB::insertRow('INSERT INTO cetec.login_tokens VALUES (\'\',:token,:estud_id)',[':token'=>sha1($token), ':estud_id'=>$logged_id]);
				DB::insertRow('DELETE FROM cetec.login_tokens WHERE token = :tok',[':tok'=>sha1($_COOKIE['CETECID'])]);
				
				setcookie("CETECID",$token, time() + 60 * 60 * 24 * 7,'/',NULL,NULL,TRUE);
				setcookie("CETECID_",'1', time() + 60 * 60 * 24 * 3,'/',NULL,NULL,TRUE);
				
				return $logged_id;
			}
		}
	}
	return false;
}

if(isLoggedIn()){
	echo 'Logged In :)';
	echo isLoggedIn();
} else {
	echo 'Not logged in :(';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CETEC home</title>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap-reboot.min.css"/>
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/cetec.css">
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script src="../bower_components/tether/dist/js/tether.min.js"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/ceteci.js"></script>
	<script>
	</script>
</head>
<body>
<?php include_once 'templates/topnav-template.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
		</div>
		<div class="col-md-3">
        <?php include_once 'templates/right-side-nav.php'; ?>
		</div>
      <?php include_once 'templates/footer-template.php'; ?>
	</div>
</body>
</html>
