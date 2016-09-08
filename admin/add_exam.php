<?php
$msg = "";
include_once("../vi_inc/db_vidainglescore_conn.php");
if(isset($_POST['examq1'])){
	$cefLevel = mysqli_real_escape_string($db_conx,$_POST['ceflevel']);
	$examName = mysqli_real_escape_string($db_conx,$_POST['examName']);
	$examInstr = mysqli_real_escape_string($db_conx,$_POST['examInstr']);
	$examQ1 = mysqli_real_escape_string($db_conx, $_POST['examq1']);
	$examQ2 = mysqli_real_escape_string($db_conx,$_POST['examq2']);
	$examQ3 = mysqli_real_escape_string($db_conx,$_POST['examq3']);
	$examQ4 = mysqli_real_escape_string($db_conx,$_POST['examq4']);
	$examQ5 = mysqli_real_escape_string($db_conx,$_POST['examq5']);
	$examQ6 = mysqli_real_escape_string($db_conx,$_POST['examq6']);
	$examQ7 = mysqli_real_escape_string($db_conx,$_POST['examq7']);
	$examQ8 = mysqli_real_escape_string($db_conx,$_POST['examq8']);
	$examQ9 = mysqli_real_escape_string($db_conx,$_POST['examq9']);
 $examQ10 = mysqli_real_escape_string($db_conx,$_POST['examq10']);
	$ak1 = mysqli_real_escape_string($db_conx ,$_POST['ak1']);
	$ak2 = mysqli_real_escape_string($db_conx,$_POST['ak2']);
	$ak3 = mysqli_real_escape_string($db_conx,$_POST['ak3']);
	$ak4 = mysqli_real_escape_string($db_conx,$_POST['ak4']);
	$ak5 = mysqli_real_escape_string($db_conx,$_POST['ak5']);
	$ak6 = mysqli_real_escape_string($db_conx,$_POST['ak6']);
	$ak7 = mysqli_real_escape_string($db_conx,$_POST['ak7']);
	$ak8 = mysqli_real_escape_string($db_conx,$_POST['ak8']);
	$ak9 = mysqli_real_escape_string($db_conx,$_POST['ak9']);
 $ak10 = mysqli_real_escape_string($db_conx,$_POST['ak10']);
	$sql = "INSERT INTO exams (
					cef_level
					,exam_nombre
					,exam_instrucciones
					,examq1
					,examq2
					,examq3
					,examq4
					,examq5
					,examq6
					,examq7
					,examq8
					,examq9
					,examq10
					,datecreated
					,datemodified
					) 
					VALUES(
					'$cefLevel'
					,'$examName'
					,'$examInstr'
					,'$examQ1'
					,'$examQ2'
					,'$examQ3'
					,'$examQ4'
					,'$examQ5'
					,'$examQ6'
					,'$examQ7'
					,'$examQ8'
					,'$examQ9'
					,'$examQ10'
					,NOW()
					,NOW()
					)";
	$qry = mysqli_query($db_conx,$sql);
	$examid = mysqli_insert_id($db_conx);
	$sql = "INSERT INTO exam_answerkeys (
					id
					,answerkey1
					,answerkey2
					,answerkey3
					,answerkey4
					,answerkey5
					,answerkey6
					,answerkey7
					,answerkey8
					,answerkey9
					,answerkey10
					,datecreated
					)
					VALUES(
					'$examid'
					,'$ak1'
					,'$ak2'
					,'$ak3'
					,'$ak4'
					,'$ak5'
					,'$ak6'
					,'$ak7'
					,'$ak8'
					,'$ak9'
					,'$ak10'
					,NOW()
					)";
	$qry = mysqli_query($db_conx,$sql);
	if($qry === TRUE){
		$msg = "Exam added succesfully.";
	}	else {
		$msg = "Could not add exam.";
	}
	
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Add exam</title>
	<link rel="stylesheet" href="../vi_core_style.css" media="screen" />
		<link rel="stylesheet" href="" media="print" />
</head>
<body>
	<div id="addExamDiv">
	<h1>Add exam</h1>
	<?php echo $msg ?>
		<form action="add_exam.php" method="POST" name="" id="addExamFrm">
		
			<select name="ceflevel" id="ceflevel">
				<option value="" selected disabled="disabled">cef level</option>
				<option value="A1">A1</option>
				<option value="A2">A2</option>
				<option value="B1">B1</option>
				<option value="B2">B2</option>
			</select> <br />
			
			<input type="text" size="" name="examName" id="examName" class="" placeholder="Exam name" required=""/><br />
			
			<input type="text" size="" name="examInstr" id="examInstr" class="" placeholder="Instructions" required=""/><br />
			
			<input type="text" size="" name="examq1" id="examq1" class="" placeholder="question 1" required=""/>&nbsp;&nbsp; <input type="text" name="ak1" id="ak1" placeholder="answer 1" class=""/><br />
			
			<input type="text" size="" name="examq2" id="examq2" class="" placeholder="question 2" required=""/>&nbsp;&nbsp; <input type="text" name="ak2" id="ak2" placeholder="answer 2" class=""/><br />
			
			<input type="text" name="examq3" id="examq3" placeholder="question 3" class=""/>&nbsp;&nbsp; <input type="text" name="ak3" id="ak3" placeholder="Answer 3" class=""/><br />
			
			<input type="text" name="examq4" id="examq4" placeholder="question 4" class=""/>&nbsp;&nbsp; <input type="text" name="ak4" id="ak4" placeholder="Answer 4" class=""/><br />
			
			<input type="text" name="examq5" id="examq5" placeholder="question 5" class=""/>&nbsp;&nbsp; <input type="text" name="ak5" id="ak5" placeholder="Answer 5" class=""/><br />
			
			<input type="text" name="examq6" id="examq6" placeholder="question 6" class=""/> <input type="text" name="ak6" id="ak6" placeholder="Answer 6" class=""/><br />
			
			<input type="text" name="examq7" id="examq7" placeholder="question 7" class=""/> <input type="text" name="ak7" id="ak7" placeholder="Answer 7" class=""/><br />
			
			<input type="text" name="examq8" id="examq8" placeholder="question 8" class=""/> <input type="text" name="ak8" id="ak8" placeholder="Answer 8" class=""/><br />
			
			<input type="text" name="examq9" id="examq9" placeholder="question 9" class=""/> <input type="text" name="ak9" id="ak9" placeholder="Answer 9" class=""/><br />
			
			<input type="text" name="examq10" id="examq10" placeholder="question 10" class=""/> <input type="text" name="ak10" id="ak10" placeholder="Answer 10" class=""/><br />
			
			<input type="submit" id="addExamBtn" class="btnsignup" value="Add Exam"/>
			
		</form>
	</div>
	
</body>
</html>