<?php
//include_once("../vi_inc/checar_sesion.php");
$recommended_exercises_list = "";
$sql = "SELECT ejer_id, cef_level_id, ejer_nombre, ejer_instrucciones_p, ejer_friendly_name FROM ejercicios WHERE cef_level_id='$lesson_cef'";
$qry = mysqli_query($db_conx,$sql);
if(mysqli_num_rows($qry)>0) {
	while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
		$rcmnd_testid = $row['ejer_id'];
		$rcmnd_testname = $row['ejer_nombre'];
		$rcmnd_testFriendly = $row['ejer_friendly_name'];
  $rcmnd_ejerNoTags = strip_tags($rcmnd_testname);
		$rcmnd_testinstr = $row['ejer_instrucciones_p'];
		$rcmnd_ejerInstrNoTags = strip_tags($rcmnd_testinstr);
		$recommended_exercises_list .= '<li><a href="http://localhost/vidaingles/ejercicios/'.$rcmnd_testid.'/'.$rcmnd_testFriendly.'" title="'.$rcmnd_ejerNoTags.': '.$rcmnd_ejerInstrNoTags.'">'.$rcmnd_testname.'</a></li>';
	}
} else {
	$recommended_exercises_list = '<li>No hay recomendaciones por el momento</li>';
}

?>
<div class="recomendations noprint">
<p>Ejercicios de Ingles Recomendados</p>
<ul class="recommended-exams">
	<?php echo $recommended_exercises_list ?>	
</ul>
</div>

