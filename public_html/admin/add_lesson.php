<?php 
include('../inc/checar_sesion.php');
include('../inc/functions.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" href="favicon.ico">
<title>Add Lesson </title>
	<meta name="Author" content="Ricardo Maldonado" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="canonical" href="" />
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
 <link rel="stylesheet" href="../css/vi_core.css"/>
<link rel="stylesheet" href="../css/vi_print.css" media="print"/>
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
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
			<img class="logo" src="../i/vidaingles-logo50x50.png" width="25" height="25" alt="Vida Inglés"/> <a class="navbar-brand" href="<?php echo home() ?>">Vida Inglés</a> 
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
    <h1>Add lesson</h1>
     <form class="form" role="form" method="POST" name="frmAddLesson" id="frmAddLesson">
      <div class="form-group">
       <label for="title" class="control-label">Título *</label>
       <input type="text" name="title" id="title" placeholder="Título de la lección" class="form-control" maxlength="100"/>
      </div>
      <div class="form-group">
       <label for="cefid" class="control-label">CEF <small>(opcional)</small></label>
       <select name="cefid" id="cefid" class="form-control select">
        <option value="" disabled selected >--- Elige uno ---</option>
        <?php echo lista_cef($db_conx); ?>
       </select>
      </div>
      <div class="form-group">
       <label for="courseid" class="control-label">Curso *</label>
       <select name="courseid" id="courseid" class="form-control select">
        <option value="" disabled selected >--- Elige un curso ---</option>
        <?php echo lista_cursos($db_conx); ?>
       </select>
      </div>
      <div class="form-group">
       <label for="categoria" class="control-label">Categoría *</label>
       <select name="categoriaid" id="categoriaid" class="form-control select">
        <option value="" disabled selected >--- Elige una categoría ---</option>
        <?php echo lista_categoria($db_conx); ?>
       </select>
      </div>
      <div class="form-group">
       <label for="content" class="control-label">Content *</label>
       <textarea name="content" id="content" class="form-control" rows="6">
       </textarea>
      </div>
	<!-- <input type="submit" value="Publish"/> -->
 <button id="addLessonBtn" class="btn btn-primary">Publicar</button>
 <span id="aviso"></span>
		</form><!-- ends maincontent-left --> 
    </div><!-- Ends formDiv -->    
			</div><!-- Ends col-md-8 -->

<!-- SIDE BAR 
 ======================================================-->
			<div class="col-md-4">
				<p>Right Navigation</p>
			</div><!--Ends col-md-4 -->
		</div>
	</div>
<script src="js/add_lesson.js"></script>
<br />
  <footer class="footer">
  <div class="container">
<p>Vida Inglés</p>
  </div>
  </footer>
<script src="../js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>

<?php //include_once('../vi_template_footer.php') ?>
