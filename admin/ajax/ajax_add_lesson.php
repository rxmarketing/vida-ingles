<?php
$user_fullname = "";
if(isset($_POST["title"])) {
 	include_once("../../inc/checar_sesion.php");
 	include_once("../../inc/db_vidainglescore_conn.php");
//gather post data into local variables
$lcef = $_POST['cefid'];
$ltitle = $_POST['title'];
$lcontent = mysqli_real_escape_string($db_conx, $_POST['content']);
$categoriaid = $_POST['categoriaid'];
$courseid = $_POST['courseid'];
$lessonFriendlyName = strip_tags(str_replace(' /','-',$ltitle));
//$lessonguid = "http://vidaingles.com/vi_lesson.php?id=";
if($ltitle == "" || $lcontent == "" || $categoriaid == "" || $courseid == "") {
	echo "To2 los campos son obligatorios";
	} else {
	//insert data into database table
		$sql_less = "INSERT INTO lecciones (
						lessoncef
						,lessonauthor
						,lessontitle
						,lessoncontent
						,ispublished
      ,categoria_id
						,lesson_courseid
						,lesson_name
						,datepublished
						)
						
						VALUES(
						'$lcef'
						,'$user_fullname'
						,'$ltitle'
						,'$lcontent'
						,'1'
      ,'$categoriaid'
						,'$courseid'
						,lcase('$lessonFriendlyName')
						,NOW()
						)";
		$query_less = mysqli_query($db_conx,$sql_less);
		echo "leccion_agregada";
		$lessid = mysqli_insert_id($db_conx);
		
		$guid = "UPDATE lecciones SET lesson_guid='http://vidaingles.com/lesson.php?id=$lessid' WHERE lessonid='$lessid'";
		$guid_qry = mysqli_query($db_conx,$guid);
  
  $updateqry = "UPDATE lecciones SET lesson_name=$lessonFriendlyName";
  $updateLessFriendName = mysqli_query($db_conx,$updateqry);
		
		$insertUrl = "http://vidaingles.com/lecciones/$lessid/$lessonFriendlyName";
		$fileOpen = fopen('../../sitemap.txt','a');
		fwrite($fileOpen, "$insertUrl\n");
		fclose($fileOpen);
  exit();
	}
	exit();
}
?>