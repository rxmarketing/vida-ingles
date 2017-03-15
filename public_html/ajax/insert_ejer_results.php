<?php
include_once("../inc/checar_sesion.php");
if($user_ok == true) {
	include_once("../inc/db_vidainglescore_conn.php");

		
	$ejerid = preg_replace('#[^0-9]#','',$_POST['ejerid']);
	$input_q1 = mysqli_real_escape_string($db_conx,$_POST['inputq1']);
	$input_q2 = mysqli_real_escape_string($db_conx,$_POST['inputq2']);
	$input_q3 = mysqli_real_escape_string($db_conx,$_POST['inputq3']);
	$input_q4 = mysqli_real_escape_string($db_conx,$_POST['inputq4']);
	$input_q5 = mysqli_real_escape_string($db_conx,$_POST['inputq5']);
	$input_q6 = mysqli_real_escape_string($db_conx,$_POST['inputq6']);
	$input_q7 = mysqli_real_escape_string($db_conx,$_POST['inputq7']);
	$input_q8 = mysqli_real_escape_string($db_conx,$_POST['inputq8']);
	$input_q9 = mysqli_real_escape_string($db_conx,$_POST['inputq9']);
 $input_q10 = mysqli_real_escape_string($db_conx,$_POST['inputq10']);

	if($input_q1 == "" || $input_q2 == "" || $input_q3 == "" || $input_q4 == "" || $input_q5 == "" || $input_q6 == "" || $input_q7 == "" || $input_q8 == "" || $input_q9 == "" || $input_q10 == "") {
		$mensaje = "Debessssss completar el ejercicio";
		//exit();
	} else {
	// INSERT USER INPUT INTO exam_results TABLE
		$sql = "INSERT INTO resultados_ejercicios (
						result_id
						,ejer_id
						,userid
						,user_answer1
						,user_answer2
						,user_answer3
						,user_answer4
						,user_answer5
						,user_answer6
						,user_answer7
						,user_answer8
						,user_answer9
						,user_answer10
						,datetaken
						)
						VALUES (
						NULL
						,'$ejerid'
						,'$log_id'
						,'$input_q1'
						,'$input_q2'
						,'$input_q3'
						,'$input_q4'
						,'$input_q5'
						,'$input_q6'
						,'$input_q7'
						,'$input_q8'
						,'$input_q9'
						,'$input_q10'
						,NOW()
						)";
		$qry = mysqli_query($db_conx,$sql);
		$mensaje = "Resultados guardados";
		//exit();
	} 
	//else {
//	$usql = "UPDATE exam_results SET
//						exam_id = '$exaid'
//						,userid = '$log_id'
//						,user_answer1 = '$input_q1'
//						,user_answer2 = '$input_q2'
//						,user_answer3 = '$input_q3'
//						,user_answer4 = '$input_q4'
//						,user_answer5 = '$input_q5'
//						,user_answer6 = '$input_q6'
//						,user_answer7 = '$input_q7'
//						,user_answer8 = '$input_q8'
//						,user_answer9 = '$input_q9'
//						,user_answer10 = '$input_q10'
//						,datetaken = now() LIMIT 1";
//		$uquery = mysqli_query($db_conx,$usql);
//		$mensaje = "Resultados actualizdos.";
//	}
	//exit();
} else {
	$mensaje = 'Debes iniciar sesi&oacute;n para ver tus resultados. <a href="http://vidaingles.com/iniciar">Iniciar sesion</a>&nbsp; <a href="http://vidaingles.com/registrar">Registrate</a>';
}
 $vjson = array("mensaje" => $mensaje,);
echo json_encode($vjson);
?>
