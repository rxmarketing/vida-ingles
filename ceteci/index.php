<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/04/2017
 * Time: 02:07 PM
 */
include_once 'inc/check_session.php';
// If user is logged in, send him to his profile page
if ($admin_ok == true) {
    header("location: user.php?username=" . $_SESSION["username"]);
    exit();
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
<?php
if ($admin_ok == false && $student_ok == false) {
    echo "No session.";
}
include_once 'templates/topnav-template.php';
?>
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
