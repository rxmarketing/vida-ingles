<?php 
	$db_conx = new mysqli("localhost","ricardo","tiotony","ceteci");
	$db_conx->set_charset("utf8");
	if($db_conx->connect_errno) {
		echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
		//echo "ERRNO: " . $db_conx->connect_errno . "<br />";
		//echo "ERROR: " . $db_conx->connect_error;
		exit;
	}
	
	// Fetch avances from tbl_avances
	$group_list = null;
	$consulta = "SELECT grupos.grp_id AS 'Grupo ID'
	,grupos.grupo_cat_id AS 'Grupo Cat Id'
	,grupos.modulo_id AS 'Grupo Mod Id'
	,grupos.grupo_estatus_id AS 'Grupo Estatus Id'
	,grupos.grp_clave AS 'Grupo Clave'
	,grupos.grupo_fecha_inicio AS 'Grupo Fecha Inicio'
	,grupos.grupo_fecha_final AS 'Grupo Fecha Final'
	,grupos.grupo_timein AS 'Timein'
	,grupos.grupo_timeout AS 'Timeout'
	,grupos.grupo_dias AS 'Dias'
	,modulos.mod_id AS 'Modulo Id'
	,module_names.mod_subcat_name AS 'Nombre Modulo'
	,cef.cef_description AS 'CEF'
	
	
	FROM grupos
	
	INNER JOIN modulos ON modulos.mod_grupo_id = grupos.grp_id
	INNER JOIN module_names ON mod_subcat_id = modulos.mod_nombre_id
	INNER JOIN cef ON cef.cef_id = modulos.cef_id
	
	WHERE grupo_estatus_id=5";
	
	if(!$sql = $db_conx->prepare($consulta)) {
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
		exit;
	}
	$sql->execute();
	if(!$resultado = $sql->get_result()) {
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
	}
	$group_count = $resultado->num_rows;
	
	// Start the loop
	while ($row = $resultado->fetch_assoc()) {
		$groupid = $row['Grupo ID'];
		$grupoclave = $row['Grupo Clave'];
		$mod_id = $row['Modulo Id'];
		$mod_nombre = $row['Nombre Modulo'];
		$cef = $row['CEF'];
		$grupotimein = date_create($row['Timein']);
		$grupotimeout = date_create($row['Timeout']);
		$grupodias = $row['Dias'];
		$grupohorario = date_format($grupotimein,'g') . '-'. date_format($grupotimeout,'ga') . ' / ' . $grupodias;
		//$currWeek = mysqli_query($db_cetec_conx, "SELECT ");
		
		// $count = $db_conx->query("SELECT estud_id FROM estudiantes WHERE grupo_id='$groupid' AND estud_status_id= 1");
		//  $studCount = $count->num_rows;
		
		$group_list .= '
		
		<div class="col-md-4 text-center">
		<div class="card">
		<div class="card-block">
		<span class="fa fa-graduation-cap"></span>
		<h5>'.$grupoclave.' <span class="badge badge-default">'. $cef .'</span></h5>
		<small>'.$mod_nombre.'<br />'
		.$grupohorario.'<br />
		
		</small>
		<a href="followup.html" type="button" class="btn btn-primary btn-block">View <span class="fa fa-angle-double-right vi-fa"></span></a>
		</div>
		</div>
		</div>
		
		';
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Follow-ups</title>
    <!-- Bootstrap core CSS -->
    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="bower_components\font-awesome-4.7.0\css\font-awesome.min.css">
    <!-- Custom styles for this template -->
		<style>
			/* Everything but the jumbotron gets side spacing for mobile first views */
			.header,
			.marketing,
			.footer {
			padding-right: 1rem;
			padding-left: 1rem;
			}
			
			/* Custom page header */
			.header {
			padding-bottom: 1rem;
			border-bottom: .05rem solid #e5e5e5;
			}
			/* Make the masthead heading the same height as the navigation */
			.header h3 {
			margin-top: 0;
			margin-bottom: 0;
			line-height: 3rem;
			}
			
			/* Custom page footer */
			.footer {
			padding-top: 1.5rem;
			color: #777;
			border-top: .05rem solid #e5e5e5;
			}
			
			/* Customize container */
			@media (min-width: 48em) {
			.container {
			max-width: 46rem;
			}
			}
			.container-narrow > hr {
			margin: 2rem 0;
			}
			
			/* Main marketing message and sign up button */
			.jumbotron {
			text-align: center;
			border-bottom: .05rem solid #e5e5e5;
			}
			.jumbotron .btn {
			padding: .75rem 1.5rem;
			font-size: 1.5rem;
			}
			
			/* Supporting marketing content */
			.marketing {
			margin: 3rem 0;
			}
			.marketing p + h4 {
			margin-top: 1.5rem;
			}
			
			/* Responsive: Portrait tablets and up */
			@media screen and (min-width: 48em) {
			/* Remove the padding we set earlier */
			.header,
			.marketing,
			.footer {
			padding-right: 0;
			padding-left: 0;
			}
			/* Space out the masthead */
			.header {
			margin-bottom: 2rem;
			}
			/* Remove the bottom border on the jumbotron for visual effect */
			.jumbotron {
			border-bottom: 0;
			}
			}
			
			.blog-footer {
			padding: 2.5rem 0;
			color: #999;
			text-align: center;
			background-color: #f9f9f9;
			border-top: .05rem solid #e5e5e5;
			}
		</style>
	</head>
	<body>
		<?php include('includes/template-header.php'); ?>
		<?php include('includes/template-jumbotron.php'); ?>
		<div class="container">
			<?php include('includes/template-marketing.php'); ?>
			<?php include('includes/template-footer.php'); ?>
		</div>
	</body>
</html>