<?php
include('../inc/checar_sesion.php');
include('../inc/functions.php');
$ejermsg = "";
$akmsg = "";
$updatemsg = "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" href="favicon.ico">
<title>Add exercise </title>
	<meta name="Author" content="Ricardo Maldonado" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta property="fb:app_id" content="382987081744830" />  
	<meta property="fb:admins" content="1335978648" />  
	<meta property="og:url" content="<?php echo canonical(); ?>"/>  
	<meta property="og:title" content="<?php echo $u ?>" />
	<meta property="og:description" content="" />
	<meta property="og:type" content="article" />  
	<meta property="og:image" content="" />
	<link rel="stylesheet" href="vi_core_style.css" media="screen" />
	<link rel="canonical" href="<?php echo canonical(); ?>" />
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
 <link rel="stylesheet" href="../css/vi_core.css"/>
<link rel="stylesheet" href="../css/vi_print.css" media="print"/>
	<script async src="../js/jquery-1.11.3.min.js"></script>
	<script async src="../js/bootstrap.min.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>
<body>
<header id="header-wrap" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
   <?php echo $log_user_pic .'<span class="caret"></span>' ?>
				<span class="sr-only">Toggle navigation</span>
			</button>
			<img class="logo" src="../i/vidaingles-logo50x50.png" width="25" height="25" alt="Vida Ingl&eacute;s"/> <a class="navbar-brand" href="<?php echo home() ?>">Vida Ingl&eacute;s</a> 
		</div><!-- Ends navbar-header -->
		<?php include_once('../templates/template_login_links.php') ?>
	</div><!--Ends container -->
</header>
<!-- Ends header ========
=======================================-->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="admin-nav"><?php echo $adminNav; ?></div>
    <div id="form-container">
    <h1>Add exercise</h1>
	<?php echo $ejermsg ?><br />
	<?php echo $akmsg ?><br />
	<?php echo $updatemsg ?><br />
		<form role="form" action="php/php_add_exercise.php" method="POST" name="" id="addExerciseFrm" class="form">
   <div class="form-group">
			<label for="lessonid" class="control-label">Select lesson for this exercise</label>
			<select name="lessonid" id="lessonid" class="form-control">
				<option value="" disabled selected>--- Elige uno de la lista ---</option>
			<?php echo selectLessonOptionList($db_conx) ?>
			</select>
   </div>
   <div class="form-group">
    <label for="cefid" class="control-label">CEF level</label>
    <select name="cefid" id="cefid" class="form-control">
     <option value="" disabled selected>--- Elige uno de la lista ---</option>
     <?php echo lista_cef($db_conx); ?>
    </select>
   </div>
   <div class="form-group">
			<label for="ejerName" class="control-label">Exercise name</label>
			<input type="text" size="" name="ejerName" id="ejerName" class="form-control" placeholder="Título del ejercicio" required=""/>
			</div>
   <div class="form-group">
			<label for="ejerInstr" id="" class="control-label">Exercise instructions</label>
			<input type="text" size="" name="ejerInstr" id="ejerInstr" class="form-control" placeholder="Instructions" required=""/>
			</div>
   <div class="form-group">
			<label for="ejerq1" id="" class="control-label">Question and Answer 1</label>
			<input type="text" size="" name="ejerq1" id="ejerq1" class="form-control" placeholder="question 1" required=""/> <input type="text" name="ak1" id="ak1" placeholder="answer 1" class="form-control"/>
			</div>
   
			<div class="form-group">
				<label for="ejerq2" id="" class="control-label">Question and Answer 2</label>
				<input type="text" size="" name="ejerq2" id="ejerq2" class="form-control" placeholder="question 2" required=""/> <input type="text" name="ak2" id="ak2" placeholder="answer 2" class="form-control"/>
			</div>
			
			<div class="form-group">
				<label for="ejerq3" id="" class="control-label">Question and Answer 3</label>
				<input type="text" name="ejerq3" id="ejerq3" placeholder="question 3" class="form-control"/> 
    <input type="text" name="ak3" id="ak3" placeholder="Answer 3" class="form-control"/>
			</div>
			
			<div class="form-group">
				<label for="ejerq4" id="" class="control-label">Question and Answer 4</label>
				<input type="text" name="ejerq4" id="ejerq4" placeholder="question 4" class="form-control"/> 
				   <input type="text" name="ak4" id="ak4" placeholder="Answer 4" class="form-control"/>
			</div>
			
   <div class="form-group">
   	<label for="ejerq5" id="" class="control-label">Question and Answer 5</label>
   				<input type="text" name="ejerq5" id="ejerq5" placeholder="question 5" class="form-control"/> 
   	<input type="text" name="ak5" id="ak5" placeholder="Answer 5" class="form-control"/>
   </div>
			
   <div class="form-group">
   	<label for="ejerq6" id="" class="control-label">Question and Answer 6</label>
   	<input type="text" name="ejerq6" id="ejerq6" placeholder="question 6" class="form-control"/> 
   	<input type="text" name="ak6" id="ak6" placeholder="Answer 6" class="form-control"/>
   </div>
			
   <div class="form-group">
   	<label for="ejerq7" id="" class="control-label">Question and Answer 7</label>
   	<input type="text" name="ejerq7" id="ejerq7" placeholder="question 7" class="form-control"/> 
   	<input type="text" name="ak7" id="ak7" placeholder="Answer 7" class="form-control"/>
   </div>
			
   <div class="form-group">
   	<label for="ejerq8" id="" class="control-label">Question and Answer 8</label>
   	<input type="text" name="ejerq8" id="ejerq8" placeholder="question 8" class="form-control"/> 
   	<input type="text" name="ak8" id="ak8" placeholder="Answer 8" class="form-control"/>
   </div>
			
			<div class="form-group">
   	<label for="ejerq9" id="" class="control-label">Question and Answer 9</label>
   	<input type="text" name="ejerq9" id="ejerq9" placeholder="question 9" class="form-control"/>
   	<input type="text" name="ak9" id="ak9" placeholder="Answer 9" class="form-control"/>
   </div>
			
			<div class="form-group">
				<label for="ejerq10" id="" class="control-label">Question and Answer 10</label>
				<input type="text" name="ejerq10" id="ejerq10" placeholder="question 10" class="form-control"/> 
    <input type="text" name="ak10" id="ak10" placeholder="Answer 10" class="form-control"/>
			</div>
			<button id="addExerBtn" class="btn btn-primary btnsignup"/>Add Exercise</button>
   <span id="aviso"></span>
		</form>
    </div><!-- Ends formDiv -->    
			</div><!-- Ends col-md-8 -->
		</div> <!-- Ends row -->
	</div> <!-- Ends container -->
 <br /><br />
<script src="js/add_exercise.js"></script>
<?php include_once('../templates/template_footer.php') ?>