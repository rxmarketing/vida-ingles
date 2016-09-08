<?php 
    include('../inc/checar_sesion.php');
    include('../inc/functions.php');
    $consulta = "SELECT ";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico">
        <title>Students</title>
        <meta name="Author" content="Ricardo Maldonado" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link rel="stylesheet" href="vii_core_style.css" media="screen" />
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
                        <h1>Students</h1>
                    <div id="form-container">
                        
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
        <script src="js/ie10-viewport-bug-workaround.js"></script>
        
    </body>
</html>

<?php //include_once('../vi_template_footer.php') ?>
