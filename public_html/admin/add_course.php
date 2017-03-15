<?php 
error_reporting(E_ALL);
include('admin_functions.php');


if(isset($_POST["course"])) {
//gather post data into local variables
$cname = $_POST["course"];
$ccat = $_POST["category"];
$ccef = $_POST["cef"];
$cweeks = $_POST["weeks"];
$cdesc = $_POST["desc"];
$ccompetences = $_POST["competences"];
if($cname == "" || $ccat == "" || $ccef == "" || $cweeks == "" || $cdesc = "" || $ccompetences = "") {
	echo "Todos los campos son obligatorios";
	exit();
	} else {
//insert data into database table
	$sql = "INSERT INTO cursos (
					coursename
					,coursedesc
					,course_cat_id
					,cefdesc
					,competences
					,courseweeks
					,datecreated
					,lastmodified)
					
					VALUES(
					'$cname'
					,'$cdesc'
					,'$ccat'
					,'$ccef'
					,'$ccompetences'
					,'$cweeks'
					,NOW()
					,NOW()
					)";
	$queryAddCourse = mysqli_query($db_conx,$sql);
 			if($queryAddCourse === TRUE) {
			echo "Success inserting new course!!";
		} else {
			echo "Could not insert new course in database";
		}
	}
	
	exit();
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Add New Course</title>
	<link rel="stylesheet" href="../vi_core_style.css" media="screen" />
	<link rel="stylesheet" href="" media="print" />
</head>
<body>
<div id="header-wrap">
	<div id="topfixed">
		<div id="header-content">
				<div id="logo">
					<h2>Vida Ingles</h2>
				</div><!-- ends logo div -->
				<div id="loginlinks">
					<?php include_once('vi_admin_bar.php') ?>
				</div>
			</div><!-- Ends header-content -->
	</div><!-- Ends topfixed -->
</div><!-- Ends header-wrap -->
<div id="maincontent-wrapper">
	<div id="maincontent-container">
		<div id="maincontent-top">
			<p></p>
		</div>
<div>
<div id="maincontent-middle">
	
	<div id="maincontent-left">
	
		<form action="add_course.php" method="POST" name="frmAddCourse" id="frmAddCourse">
		<div class="label">
			<label for="" id="" class="label">Course name:</label>
		</div>
		<div class="data">
			<input type="text" name="course" id="course" placeholder="Course name" class="data" maxlength="100"/>
		</div>
		<div class="label">
			<label for="" id="" class="label">Category:</label>
		</div>
		<div class="data">
			<select name="category" id="category">
   <option value="">------</option>
   <?php echo lista_categoria($db_conx) ?>
			</select>
			<label for="" id="" class="label">CEF:</label>
			<select name="cef" id="cef">
				<option value="a1">A1</option>
				<option value="a2">A2</option>
				<option value="b1">B1</option>
				<option value="b2">B2</option>
			</select>
			<span>Semanas: </span>
			<input type="text" size="2" name="weeks" id="weeks" class="" placeholder="" required=""/>
		</div>
		<div class="label">
			<label for="" id="" class="label">Description:</label>
		</div>
		<div class="data">
			<textarea name="desc" id="desc" cols="30" rows="10">
			</textarea>
		</div>
				<div class="label">
			<label for="" id="" class="label">Competences:</label>
		</div>
		<div class="data">
			<textarea name="competences" id="competences" cols="30" rows="8">
			</textarea>
		</div>
		<input type="submit" value="Submit"/>
	</form>

	</div><!-- ends maincontent-left -->
	<div id="maincontent-right" style="min-height: 0px; position: static; bottom: auto; right: auto;">

	</div><!-- ends maincontent-right -->
	
		</div><!-- ends maincontent-middle --></div>
	</div><!-- Ends maincontent -container -->
</div><!-- Ends maincontent-wrapper -->
