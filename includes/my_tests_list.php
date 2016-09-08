<?php
	//include_once("vi_inc/checar_sesion.php");
	//include_once("vi_functions.php");
	$timeAgoExam = new convertToAgo;
	$myTestsTaken = "";
	$sql = "SELECT resultados_ejercicios.result_id, resultados_ejercicios.ejer_id, resultados_ejercicios.userid, resultados_ejercicios.datetaken, ejercicios.ejer_nombre FROM resultados_ejercicios 
	INNER JOIN ejercicios
	ON ejercicios.ejer_id = resultados_ejercicios.ejer_id
	WHERE userid='$log_id' ORDER BY datetaken DESC";
	$qry = mysqli_query($db_conx,$sql);
	if(mysqli_num_rows($qry)>0){
		while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
			$resId = $row['result_id'];
			$resExamId = $row['ejer_id'];
			$resExamName = $row['ejer_nombre'];
			$resUserId = $row['userid'];
			//$resA1 = $row['user_answer1'];
			//$resA2 = $row['user_answer2'];
			//$resA3 = $row['user_answer3'];
			//$resA4 = $row['user_answer4'];
			//$resA5 = $row['user_answer5'];
			//$resA6 = $row['user_answer6'];
			//$resA7 = $row['user_answer7'];
			//$resA8 = $row['user_answer8'];
			//$resA9 = $row['user_answer9'];
			//$resA10 = $row['user_answer10'];
			$resDateTaken = $row['datetaken'];
			$myTestsTaken .= '<li><a href="http://localhost/vidaingles/test_results.php?id='.$resId.'">'.$resExamName.'</a> '. ' ' .'<abbr class="timeago" title="'.$resDateTaken.'" style="color: #666;font-size:12px;">'.$resDateTaken.'</abbr> </li>';
		}
		} else {
		$myTestsTaken = '<li>No has hecho ningun ejercicio.</li>';
	}
	
?>
<h4>Mis ejercicios</h4>
<ul class="list-unstyled profile">
	<?php echo $myTestsTaken ?>
</ul>