<?php
if(isset($_POST["ejerName"])) {
 	include_once("../../inc/db_vidainglescore_conn.php");
//gather post data into local variables
$lessid = preg_replace('#[^0-9]#','',$_POST['lessonid']);
$ejername = mysqli_real_escape_string($db_conx, $_POST['ejerName']);
$ejerinstr = mysqli_real_escape_string($db_conx, $_POST['ejerInstr']);
$cefid = $_POST['cefid'];
$ejerq1 = mysqli_real_escape_string($db_conx, $_POST['ejerq1']);
$ejerq2 = mysqli_real_escape_string($db_conx, $_POST['ejerq2']);
$ejerq3 = mysqli_real_escape_string($db_conx, $_POST['ejerq3']);
$ejerq4 = mysqli_real_escape_string($db_conx, $_POST['ejerq4']);
$ejerq5 = mysqli_real_escape_string($db_conx, $_POST['ejerq5']);
$ejerq6 = mysqli_real_escape_string($db_conx, $_POST['ejerq6']);
$ejerq7 = mysqli_real_escape_string($db_conx, $_POST['ejerq7']);
$ejerq8 = mysqli_real_escape_string($db_conx, $_POST['ejerq8']);
$ejerq9 = mysqli_real_escape_string($db_conx, $_POST['ejerq9']);
$ejerq10 = mysqli_real_escape_string($db_conx, $_POST['ejerq10']);
$ak1 = mysqli_real_escape_string($db_conx, $_POST['ak1']);
$ak2 = mysqli_real_escape_string($db_conx, $_POST['ak2']);
$ak3 = mysqli_real_escape_string($db_conx, $_POST['ak3']);
$ak4 = mysqli_real_escape_string($db_conx, $_POST['ak4']);
$ak5 = mysqli_real_escape_string($db_conx, $_POST['ak5']);
$ak6 = mysqli_real_escape_string($db_conx, $_POST['ak6']);
$ak7 = mysqli_real_escape_string($db_conx, $_POST['ak7']);
$ak8 = mysqli_real_escape_string($db_conx, $_POST['ak8']);
$ak9 = mysqli_real_escape_string($db_conx, $_POST['ak9']);
$ak10 = mysqli_real_escape_string($db_conx, $_POST['ak10']);
//$courseid = $_POST['courseid'];
$ejerfriendlyname = strip_tags(str_replace(' /','-',$ejername));
//$lessonguid = "http://vidaingles.com/vi_lesson.php?id=";
if($lessid == "" || $ejername == "" || $ejerinstr == "" || $cefid == "" || $ejerq1 == "" || $ejerq2 == "" || $ejerq3 == "" || $ejerq4 == "" || $ejerq5 == "" || $ejerq6 == "" || $ejerq7 == "" || $ejerq8 == "" || $ejerq9 == "" || $ejerq10 == "" || $ak1 == "" || $ak2 == "" || $ak3 == "" || $ak4 == "" || $ak5 == "" || $ak6 == "" || $ak7 == "" || $ak8 == "" || $ak9 == "" || $ak10 == "") {
	echo "To2 los campos son obligatorios";
	} else {
	//insert data into database table
		$sql = "INSERT INTO ejercicios (
						cef_level
						,lessonid
						,ejer_nombre
						,ejer_name
						,ejer_instrucciones
      ,ejerq1
      ,ejerq2
      ,ejerq3
      ,ejerq4
      ,ejerq5
      ,ejerq6
      ,ejerq7
      ,ejerq8
      ,ejerq9
      ,ejerq10
      ,ejer_activated
      ,datecreated
      ,datemodified
						)
						
						VALUES(
						'$cefid'
						,'$lessid'
						,'$ejername'
						,lcase('$ejerfriendlyname')
						,'$ejerinstr'
      ,'$ejerq1'
      ,'$ejerq2'
      ,'$ejerq3'
      ,'$ejerq4'
      ,'$ejerq5'
      ,'$ejerq6'
      ,'$ejerq7'
      ,'$ejerq8'
      ,'$ejerq9'
      ,'$ejerq10'
						,'1'
						,NOW()
						,NOW()
						)";
		$query = mysqli_query($db_conx,$sql);
		$ejerid = mysqli_insert_id($db_conx);
  
  $ak_sql = "INSERT INTO ejercicios_answerkeys (
      ejer_id
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
      ,datemodified
      )
     VALUES(
      '$ejerid'
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
       ,NOW()
     )";
  $akQuery = mysqli_query($db_conx,$ak_sql);
		echo "ejercicio_agregado";
		
		$guid = "UPDATE ejercicios SET ejer_guid='http://vidaingles.com/ejercicio.php?id=$ejerid' WHERE ejer_id='$ejerid'";
		$guid_qry = mysqli_query($db_conx,$guid);
  
  // SET testid COLUMN IN LECCIONES TABLE
  $update_testid = "UPDATE lecciones SET testid='$ejerid' WHERE lessonid='$lessid' LIMIT 1";
  $updateid = mysqli_query($db_conx,$update_testid);
		//UPDATE SITEMAP.TXT
		$insertUrl = "http://vidaingles.com/ejercicios/$ejerid/$ejerfriendlyname";
		$fileOpen = fopen('../../sitemap.txt','a');
		fwrite($fileOpen, "$insertUrl\n");
		fclose($fileOpen);
  exit();
	}
	exit();
}
?>