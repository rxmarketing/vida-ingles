<?php 
session_start();
include_once("../vi_inc/db_vidainglescore_conn.php");
// Files that inculde this file at the very top would NOT require 
// connection to database or session_start(), be careful.
// Initialize some vars
$admin_ok = false;
$log_id = "";
$log_username = "";
$log_password = "";
// User Verify function
function evalLoggedUser($conx,$id,$u,$p){
	$sql = "SELECT ip FROM users WHERE userid='$id' AND username='$u' AND password='$p' AND userlevel='4' AND activated='1' LIMIT 1";
    $query = mysqli_query($conx, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	} else {
		header("location:../vi_login.php");
	}
}
if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$log_id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	// Verify the user
	$admin_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password);
}

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Add Lesson</title>
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
					<div id="userinfo">
	<img src="vi_i/avatardefault.jpg" width="20" height="20" alt=""> &nbsp; <a href="vi_login.php">Iniciar sesi&oacute;n</a> &nbsp; | &nbsp; <a href="vi_signup.php">Reg&iacute;strate</a></div>				</div>
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
	<h1 id="title">Add New Lesson</h1>
	<div class="hzrule"></div>
	<br />
	<form action="" method="" name="" id="">
		<div class="label">
			<label for="" id="" class="label">T&iacute;tulo:</label>
		</div>
		<div class="data">
			<input type="text" id="titulo" placeholder="Title" class="data" maxlength="100"/>
		</div>
		<div class="label">
			<label for="" id="" class="label">CEF:</label>
		</div>
		<div class="data">
			<select name="" id="cef">
				<option value="a1">A1</option>
				<option value="a2">A2</option>
				<option value="b1">B1</option>
				<option value="b2">B2</option>
			</select>
			<label for="" id="" class="label">Curso:</label>
			<select name="" id="course">
				<option value="1">Elementary</option>
				<option value="2">Pre-Intermediate</option>
				<option value="1">Intermediate</option>
			</select>
		</div>
		<div class="label">
			<label for="" id="" class="label">Content:</label>
		</div>
		<div class="data">
			<textarea name="" id="content" cols="30" rows="10">
			</textarea>
		</div>
		<div class="label">
			<label for="" id="" class="label">Autor:</label>
		</div>
		<div class="data">
			<input type="text" name="" id="autor" placeholder="Autor" class="data"/>
		</div>	
	
	</form>
	</div><!-- ends maincontent-left -->
	<div id="maincontent-right" style="min-height: 0px; position: static; bottom: auto; right: auto;">
	<aside id="sidebar-left">
<div id="left-nav">
<h1 class="left-nav-header">Lecciones <span class="countrow">(3)</span></h1>
<ul class="left-nav-lists">
		<li><a href="vi_lesson.php?lid=2" title="Subject Pronouns">Subject Pronouns</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">A1 </a></span></li><li><a href="vi_lesson.php?lid=1" title="Reported Speech">Reported Speech</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">B2 </a></span></li><li><a href="vi_lesson.php?lid=3" title="Present Perfect Passive">Present Perfect Passive</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">B1 </a></span></li></ul>
	<h1>Cursos</h1>
	<ul class="left-nav-lists">
		<li><a href="vi_courses.php?cid=1" title="Elemental">Elemental</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">A1-A2 </a></span></li><li><a href="vi_courses.php?cid=2" title="Pre-Intermedio">Pre-Intermedio</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">A2-B1 </a></span></li><li><a href="vi_courses.php?cid=3" title="Intermedio">Intermedio</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">B2 </a></span></li>	</ul>
	<h1>Tests <span class="countrow">(2)</span></h1>
	<ul class="left-nav-lists">
		<li><a href="vi_test.php?tid=1" title="Past Simple Passive 1">Past Simple Passive 1</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">B1 </a></span></li><li><a href="vi_test.php?tid=2" title="Present Perfect Passive">Present Perfect Passive</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">B1 </a></span></li>	</ul>
	<h1>Audio</h1>
	<ul class="left-nav-lists">
		<li>Audio 1 <a href="" onmousedown="sonido.play()">Play</a></li>
	</ul>
</div>


</aside>	</div><!-- ends maincontent-right -->
	
		</div><!-- ends maincontent-middle --></div>
	</div><!-- Ends maincontent -container -->
</div><!-- Ends maincontent-wrapper -->
 <div id="footer-wrapper">
      <div id="footer-body">
				<div id="footer-links-wrapper">
				<div class="footer-link-lists">
					<h3 class="footer-links-header">Cursos</h3>
					<ul>
						<li><a href="vi_courses.php?cid=1" title="Elemental">Elemental</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">A1-A2 </a></span></li><li><a href="vi_courses.php?cid=2" title="Pre-Intermedio">Pre-Intermedio</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">A2-B1 </a></span></li><li><a href="vi_courses.php?cid=3" title="Intermedio">Intermedio</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">B2 </a></span></li>					</ul>
					</div><!--Ends footer-link-lists -->
					
					<div class="footer-link-lists">
						<h3 class="footer-links-header">Lecciones</h3>
						<ul>
							<li><a href="vi_lesson.php?lid=2" title="Subject Pronouns">Subject Pronouns</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">A1 </a></span></li><li><a href="vi_lesson.php?lid=1" title="Reported Speech">Reported Speech</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">B2 </a></span></li><li><a href="vi_lesson.php?lid=3" title="Present Perfect Passive">Present Perfect Passive</a><span class="cef"><a href="vi_page.php?pid=1" title="Common European Framework of Reference">B1 </a></span></li>						</ul>
					</div><!--Ends footer-link-lists -->
								
					<div class="footer-link-lists">
						<h3 class="footer-links-header">Ejercicios</h3>
						<ul>
							<li>Verbo to be</li>
							<li>Presente Continuo</li>
							<li>a/an</li>
							<li>Numeros</li>
						</ul>
					</div>
								
					<div class="footer-link-lists">
						<h3 class="footer-links-header">P&aacute;ginas</h3>
						<ul>
							<li><a href="vi_page.php?pid=1" title="Marco Comun Europeo">Marco Comun Europeo</a></li>						</ul>
					</div><!--Ends footer-links -->
				</div>
			
      	<div id="copyright"> &copy; 2013 Vida Ingl&eacute;s
		</div><!--Ends copyright -->
      <!-- ends footer-body -->
    </div>
    <!-- ends footer-wrapper -->
  </body>
</html>