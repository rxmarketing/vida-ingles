<?php
//    include('inc/db_cetec_mysqliconn.php');
//    $examen_list = "";
//    $module_name = "";
//    $consulta = "SELECT * FROM examenes ORDER BY exam_fecha DESC";
//    if(!$sql = $db_conx->prepare($consulta)) {
//        echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
//        echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
//        exit;
//    }
//    $sql->execute();
//    if(!$resultado = $sql->get_result()) {
//        echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
//        echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
//    }
//    $examen_count = $resultado->num_rows;
//
//    // Start the loop
//    while ($row = $resultado->fetch_assoc()) {
//        $examenid = $row['exam_id'];
//        $fecha = $row['exam_fecha'];
//        $examfecha = strftime('%d %b, %Y', strtotime($fecha));
//        $grupoid = $row['exam_grp_id'];
//        $moduloid = $row['exam_mod_id'];
//        $unidadid = $row['exam_mod_unidad_id'];
//        $examreactivos = $row['exam_reactivos'];
//        //$grupotimein = date_create($row['exam_porcentaje_min']);
//        //$grupotimeout = date_create($row['grupo_timeout']);
//        $examporcentajemin = $row['exam_porcentaje_min'];
//        $exampdf = $row['exam_pdf'];
//        $examnotas = $row['exam_notas'];
//
//        //$count = $db_conx->query("SELECT estud_id FROM estudiantes WHERE grupo_id='$groupid' AND estud_status_id= 1");
//        // $studCount = $count->num_rows;
//
//        $examen_list .= '<tr class="'.returnModule($module_name).'">
//        <td class="text-center">'.$examenid.'</td>
//        <td>'.$examfecha.'</td>
//        <td class="text-center">'.$grupoid.'</td>
//        <td class="text-center">'.$moduloid.'</td>
//        <td class="text-center">'.$unidadid.'</td>
//        <td class="text-center">'.$examreactivos.'</td>
//        <td class="text-center">'.$examporcentajemin.'</td>
//        <td class="text-center">'.$exampdf.'</td>
//        <td>'.$examnotas.'</td>
//        <td><a href="exam_details.php?id='.$examenid.'">Details</a></td>
//        </tr>';
//    }
//    function returnModule($mod){
//        $module = "";
//        switch($mod){
//            case "FR Elementary A":
//			$module="elem-bground";
//            break;
//            case "FR Elementary B":
//			$module="elem-bground";
//            break;
//            case "FR Pre-Intermediate A":
//			$module="preint-bground";
//            break;
//            case "FR Pre-Intermediate B":
//			$module="preint-bground";
//            break;
//            case "FR Intermediate A":
//			$module="int-bground";
//            break;
//            case "FR Intermediate B":
//			$module="int-bground";
//            break;
//            case "Grammar Gym 1":
//			$module="gg-bground";
//            break;
//        }
//        return $module;
//    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Exámenes</title>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap-reboot.min.css"/>
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/cetec.css">
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script src="../bower_components/tether/dist/js/tether.min.js"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/ceteci.js"></script>
</head>
<body>
<?php include_once 'templates/topnav-template.php'; ?>
<div class="container">
	<div class="row">
		<section class="col-md-9">
			<h1>Exámenes
				<small><?php //echo $examen_count; ?></small>
			</h1>
		</section>
		<aside class="col-md-3">
        <?php include_once 'templates/right-side-nav.php'; ?>
		</aside>
      <?php include_once 'templates/footer-template.php'; ?>
	</div>
</div>
</body>
</html>