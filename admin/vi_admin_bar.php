<?php
//admin top bar
$avatar = "";
$sql = "SELECT avatar FROM usuarios WHERE username='$log_username' AND activated='1' LIMIT 1";
$avatar_query = mysqli_query($db_conx,$sql);
while ($row = mysqli_fetch_array($avatar_query, MYSQLI_ASSOC)) {
	$avatar = $row["avatar"];
}
//inicilizamos avatar de usuario en sesion
$log_user_pic = '<img class="img-circle" src="../users/'.$log_username.'/'.$avatar.'" alt="'.$log_username.'" width="20" height="20">';
if($avatar == NULL){
	$log_user_pic = '<img src="../i/avatardefault.jpg" width="20" height="20" alt="'.$log_username.'">';
}
$adminbar = ''.$log_user_pic.' &nbsp; <a href="../login.php">Iniciar sesi&oacute;n</a> &nbsp; | &nbsp; <a href="../vi_signup.php">Reg&iacute;strate</a>';
if($admin_ok == true) {
	$adminbar = '<a href="add_lesson.php" title="Add new lesson">Add Lesson </a>  &nbsp; &nbsp;<a href="../user.php?u='.$log_username.'" title="'.$log_username.'">'.$log_username.'</a> &nbsp; '.$log_user_pic.' &nbsp; <a href="../logout.php">Cerrar sesi&oacute;n</a>';
}
?>
<div id="userinfo">
	<?php echo $adminbar; ?>
</div>