<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	$timeAgoExam = new convertToAgo;
	if(isset($_GET['id'])) {
		$resultid = preg_replace('#[^0-9]#','',$_GET['id']);
		} else {
		header("location: user.php?u=".$_SESSION["username"]);
		exit();
	}
	$sql = "SELECT resultados_ejercicios.result_id
	,resultados_ejercicios.ejer_id
	,resultados_ejercicios.userid
	,resultados_ejercicios.datetaken
	,resultados_ejercicios.user_answer1
	,resultados_ejercicios.user_answer2
	,resultados_ejercicios.user_answer3
	,resultados_ejercicios.user_answer4
	,resultados_ejercicios.user_answer5
	,resultados_ejercicios.user_answer6
	,resultados_ejercicios.user_answer7
	,resultados_ejercicios.user_answer8
	,resultados_ejercicios.user_answer9
	,resultados_ejercicios.user_answer10
	,ejercicios.ejer_nombre
	FROM resultados_ejercicios
	INNER JOIN ejercicios
	ON ejercicios.ejer_id = resultados_ejercicios.ejer_id
	WHERE result_id='$resultid'";
	$qry = mysqli_query($db_conx,$sql);
	while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
		$resId = $row['result_id'];
		$resExamId = $row['ejer_id'];
		$resExamName = $row['ejer_nombre'];
		$resUserId = $row['userid'];
		$resA1 = $row['user_answer1'];
		$resA2 = $row['user_answer2'];
		$resA3 = $row['user_answer3'];
		$resA4 = $row['user_answer4'];
		$resA5 = $row['user_answer5'];
		$resA6 = $row['user_answer6'];
		$resA7 = $row['user_answer7'];
		$resA8 = $row['user_answer8'];
		$resA9 = $row['user_answer9'];
		$resA10 = $row['user_answer10'];
		$resDateTaken = $row['datetaken'];
		$ts = $resDateTaken;
		$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
		$when = ($timeAgoExam -> makeAgo($convertedTime));
	}
	//FETCH EJER QUESTIONS FROM ejercicios TABLE
	$sql = "SELECT * FROM ejercicios WHERE ejer_id='$resExamId' LIMIT 1";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$ejer_id = $row["ejer_id"];
		//$test_level = $row["testlevel"];
		//$cef_level = $row["ceflevel"];
		$ejer_name = $row["ejer_nombre"];
		$ejer_instr = $row["ejer_instrucciones"];
		$ejer_cef = $row["cef_level"];
		$q1 = $row["ejerq1"];
		$q2 = $row["ejerq2"];
		$q3 = $row["ejerq3"];
		$q4 = $row["ejerq4"];
		$q5 = $row["ejerq5"];
		$q6 = $row["ejerq6"];
		$q7 = $row["ejerq7"];
		$q8 = $row["ejerq8"];
		$q9 = $row["ejerq9"];
		$q10 = $row["ejerq10"];
	}
	//FETCH ANSWER KEYS FROM exam_answerkey TABLE
	$ejer_id = "";
	$ak1 = "";
	$ak2 = "";
	$msg3 = "";
	$sql = "SELECT * FROM ejercicios_answerkeys WHERE id='$resExamId'";
	$qry = mysqli_query($db_conx,$sql);
	while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
		$akexamid = $row['id'];
		$ak1 = $row['answerkey1'];
		$ak2 = $row['answerkey2'];
		$ak3 = $row['answerkey3'];
		$ak4 = $row['answerkey4'];
		$ak5 = $row['answerkey5'];
		$ak6 = $row['answerkey6'];
		$ak7 = $row['answerkey7'];
		$ak8 = $row['answerkey8'];
		$ak9 = $row['answerkey9'];
		$ak10 = $row['answerkey10'];
	}
	if($resA1 == $ak1){
		$msg1 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg1 = '<span class="bg-danger text-danger">'.$resA1.'</span> <small class="text-muted">( '.$ak1.' )</small>';
	}
	if($resA2 == $ak2){
		$msg2 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg2 = '<span class="bg-danger text-danger">'.$resA2.'</span> <small class="text-muted">( '.$ak2.' )</small>';
	}
	if($resA3 == $ak3){
		$msg3 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg3 = '<span class="bg-danger text-danger">'.$resA3.'</span> <small class="text-muted">( '.$ak3.' )</small>';
	}
	if($resA4 == $ak4){
		$msg4 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg4 = '<span class="bg-danger text-danger">'.$resA4.'</span> <small class="text-muted">( '.$ak4.' )</small>';
	}
	if($resA5 == $ak5){
		$msg5 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg5 = '<span class="bg-danger text-danger">'.$resA5.'</span> <small class="text-muted">( '.$ak5.' )</small>';
	}
	if($resA6 == $ak6){
		$msg6 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg6 = '<span class="bg-danger text-danger">'.$resA6.'</span> <small class="text-muted">( '.$ak6.' )</small>';
	}
	if($resA7 == $ak7){
		$msg7 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg7 = '<span class="bg-danger text-danger">'.$resA7.'</span> <small class="text-muted">( '.$ak7.' )</small>';
	}
	if($resA8 == $ak8){
		$msg8 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg8 = '<span class="bg-danger text-danger">'.$resA8.'</span> <small class="text-muted">( '.$ak8.' )</small>';
	}
	if($resA9 == $ak9){
		$msg9 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg9 = '<span class="bg-danger text-danger">'.$resA9.'</span> <small class="text-muted">( '.$ak9.' )</small>';
	}
	if($resA10 == $ak10){
		$msg10 = '<span class="bg-success text-success yes"><img src="i/yes.png"/></span>';
		} else {
		$msg10 = '<span class="bg-danger text-danger">'.$resA10.'</span> <small class="text-muted">( '.$ak10.' )</small>';
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<title>Resultados <?php echo $resExamName ?></title>
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
		<!-- Ends header ========
		=======================================-->
		<?php echo $showcase ?>
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-8">
					<h1>Resultados</h1>
					<h3 id="exam-name"><span><?php echo $resExamName ?></span></h3>
					<div class="metadata">
						<span class="cef">CEF: <b><?php echo $ejer_cef; ?></b> Fecha tomada: <abbr class="timeago" title="<?php echo $resDateTaken; ?>"><?php echo $resDateTaken; ?></abbr></span>
					</div>
					<h5><?php echo $ejer_instr; ?></h5>
					<div id="formbox">
						<form name="testform" id="testFrm" role="form">
							<ol id="exam-quest-list">
								<div class="form-group">
									<li>
										<label for="question1" id="" class="vi-label"><?php echo $q1; ?></label>
										<div><?php echo $resA1 . ' ' . $msg1 ?></div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="question2" id="" class="vi-label"><?php echo $q2; ?></label>
										<div><?php echo $resA2 .' '. $msg2 ?></div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="question3" id="" class="vi-label"><?php echo $q3; ?></label>
										<div><?php echo $resA3 .' '. $msg3 ?></div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="question4" id="" class="vi-label"><?php echo $q4; ?></label>
										<div class="data">
											<?php echo $resA4 . ' '. $msg4 ?>
										</div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="question5" id="" class="vi-label"><?php echo $q5; ?></label>
										<div>
											<?php echo $resA5 . ' ' . $msg5 ?>
										</div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq6" id="" class="vi-label"><?php echo $q6; ?></label>
										<div>
											<?php echo $resA6 . ' ' . $msg6 ?>
										</div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq7" id="" class="vi-label"><?php echo $q7; ?></label>
										<div>
											<?php echo $resA7 . ' ' . $msg7 ?>
										</div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq8" id="" class="vi-label"><?php echo $q8; ?></label>
										<div>
											<?php echo $resA8 . ' ' . $msg8 ?>
										</div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq9" id="" class="vi-label"><?php echo $q9; ?></label>
										<div>
											<?php echo $resA9 . ' ' . $msg9 ?>
										</div>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq10" id="" class="vi-label"><?php echo $q10; ?></label>
										<div>
											<?php echo $resA10 . ' ' . $msg10 ?>
										</div>
									</li>
								</div>
							</ol>
							<button class="btn btn-default" id="evalExamBtn">Actializar</button>
							<span id="aviso"></span>
						</form><!--Ends testform -->
					</div><!--ends formbox div -->
					<?php include_once('ads/ad_responsive.php')?>
				</div><!-- Ends col-md-8 -->
				<!-- SIDE BAR ======================================================-->
				<div class="col-md-4">
					<?php include_once('templates/template_sidebar_right.php')?>
				</div><!--Ends col-md-4 -->
			</div>
		</div>
		<!--- FOOTER
		======================================================-->
		<footer class="footer">
			<div class="container">
				<?php include_once('templates/template_footer.php') ?>
			</div>
		</footer>
	</body>
</html>