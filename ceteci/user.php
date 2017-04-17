<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/04/2017
 * Time: 02:07 PM
 */
include_once 'inc/check_session.php';

// Make sure the _GET username is set, and sanitize it
if (isset($_GET["u"])) {
    $student = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: index.php");
    exit();
}

// Select the member from the usuarios table
$sql = "SELECT * FROM cetec.estudiantes WHERE estud_username='$student' AND estud_activated='1' LIMIT 1";
$user_query = mysqli_query($db_mysqliconx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if ($numrows < 1) {
    echo "Este usuario no existe o no ha activado su cuenta. Regrese!";
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo $log_username; ?></title>
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
			<h1><?php echo $log_username; ?></h1>
        <?php if ($student_ok == true) {
            echo "Student ok";
        } else {
            echo "Student no ok";
        } ?>
		</div>
		<div class="col-md-3">
        <?php include_once 'templates/right-side-nav.php'; ?>
		</div>
      <?php include_once 'templates/footer-template.php'; ?>
	</div>
</body>
</html>
