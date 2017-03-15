<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	// Initialize any variables that the page might echo
	$u = "";
	$sex = "Hombre";
	$userlevel = "";
	$profile_pic = "";
	$profile_pic_btn = "";
	$avatar_form = "";
	$country = "";
	$joindate = "";
	$lastsession = "";
	// Make sure the _GET username is set, and sanitize it
	if(isset($_GET["u"])){
		$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
		} else {
    header("location: http://vidaingles.com");
    exit();	
	}
	// Select the member from the usuarios table
	$sql = "SELECT * FROM usuarios WHERE username='$u' AND activated='1' LIMIT 1";
	$user_query = mysqli_query($db_conx, $sql);
	// Now make sure that user exists in the table
	$numrows = mysqli_num_rows($user_query);
	if($numrows < 1){
		echo "Este usuario no existe o no ha activado su cuenta. Regrese!";
    exit();	
	}
	// Check to see if the viewer is the account owner
	$isOwner = "no";
	if($u == $log_username && $user_ok == true){
		$isOwner = "yes";
		$profile_pic_btn = '<a href="#" onclick="return false;" onmousedown="toggleElement(\'avatar_form\')">Cambia tu Avatar</a>';
		$avatar_form  = '<form class="form" role="form" id="avatar_form" name="avatar_form"  enctype="multipart/form-data" method="post" action="http://vidaingles.com/ajax/ajax_photo_system.php">';
		$avatar_form .=   '<h4>Cambia tu Avatar</h4>';
		$avatar_form .=   '<input class="" type="file" name="avatar" required>';
		$avatar_form .=   '<p><input type="submit" value="Subir"></p>';
		$avatar_form .= '</form>';
	}
	// Fetch the user row from the query above
	while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
		$profile_id = $row["userid"];
		$gender = $row["gender"];
		$country = $row["country"];
		$userlevel = $row["userlevel"];
		$avatar = $row["avatar"];
		$signup = $row["signupdate"];
		$lastlogin = $row["lastlogin"];
		$joindate = strftime("%b %d, %Y", strtotime($signup));
		$lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
	}
	if($gender == "f"){
		$sex = "Mujer";
	}
	$log_user_pic = '<img class="img-circle" src="http://vidaingles.com/users/'.$log_username.'/'.$avatar.'" alt="'.$log_username.'" width="27" height="27" title="'.$log_username.'">';
	if($avatar == NULL){
		$log_user_pic = '<img src="http://vidaingles.com/i/avatardefault.jpg" width="20" height="20" alt="'.$log_username.'">';
	}
	$profile_pic = '<img class="img-circle" src="http://vidaingles.com/users/'.$u.'/'.$avatar.'" alt="'.$u.'" width="200" height="200">';
	if($avatar == NULL){
		$profile_pic = '<img class="img-circle" src="http://vidaingles.com/i/avatardefault.jpg" alt="'.$u.'">';
	}
//	$aviso = "";
//	$adminNav = "";
//	if ($admin_ok == true) {
//		$adminNav = '<a href="http://vidaingles.com/admin/add_lesson.php">Add lesson</a> | <a href="http://vidaingles.com/admin/add_exercise.php">Add exercise</a> | <a href="http://vidaingles.com/admin/add_course.php">Add course</a>';
//		} else {
//		$aviso = "<p>Has iniciado sesión como usuario</p>";
//	}
?>
<!doctype html>
<html lang="es">
	<head>
		<title><?php echo $u;?> </title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../favicon.ico">
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />  
		<meta property="og:url" content="<?php echo canonical(); ?>"/>  
		<meta property="og:title" content="<?php echo $u ?>" />
		<meta property="og:description" content="" />
		<meta property="og:type" content="article" />  
		<meta property="og:image" content="" />
		<link rel="canonical" href="<?php echo canonical(); ?>" />
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<!-- SHOWCASE =======================================================-->
		<?php echo $showcase ?>
		<!-- MAIN CONTENT ======================================================== -->
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-8">
					<div class="admin-nav"><?php echo $adminNav; ?></div>
					<h1><?php echo $u; ?></h1>
					<div id="profile_pic_box">
						<?php echo $profile_pic_btn; ?>
						<?php echo $avatar_form; ?>
						<?php echo $profile_pic; ?>
					</div>
					<h4>Perfil</h4>
					<ul class="list-unstyled profile">
						<li>Sexo: <?php echo $sex; ?></li>
						<li>País: <?php echo $country; ?></li>
						<li>Nivel de usuario: <?php echo $userlevel; ?></li>
						<li>Miembro desde: <?php echo $joindate; ?></li>
						<li>Ultima sesión: <abbr class="timeago" title="<?php echo $lastlogin;?>"><?php echo $lastlogin;?></abbr></li>
					</ul>
					<small><a href="#">Editar</a></small>
					<?php include_once('includes/my_tests_list.php')?>
					<?php include_once('ads/ad_responsive.php')?>
				</div><!-- Ends col-md-8 -->
				<!-- SIDE BAR 
				======================================================-->
				<div class="col-md-4">
					<?php include_once('templates/template_sidebar_right.php')?>
				</div><!--Ends col-md-4 -->
			</div>
		</div>
		<!--- FOOTER ======================================================-->
		<footer class="footer">
			<div class="container">
				<?php include_once('templates/template_footer.php') ?>
			</div>
		</footer>
	</body>
</html>																			