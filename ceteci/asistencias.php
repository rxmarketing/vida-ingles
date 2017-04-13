<?php
////   $db_conx = new mysqli("localhost","ricomx","tiotony","cetec");
//   $db_conx->set_charset("utf8");
//   if($db_conx->connect_errno) {
//       echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
//       //echo "ERRNO: " . $db_conx->connect_errno . "<br />";
//       //echo "ERROR: " . $db_conx->connect_error;
//       exit;
//   }
//   $examen_list = "";
//   $module_name = "";
//   $consulta = "SELECT * FROM tbl_asistencias ORDER BY asis_fecha DESC";
//   if(!$sql = $db_conx->prepare($consulta)) {
//       echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
//       echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
//       exit;
//   }
//   $sql->execute();
//   if(!$resultado = $sql->get_result()) {
//       echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
//       echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
//   }
//   $asis_count = $resultado->num_rows;
//
//   // Start the loop
//   while ($row = $resultado->fetch_assoc()) {
//       $asisid = $row['asis_id'];
//       $fecha = $row['asis_fecha'];
//       $asisfecha = strftime('%d %b, %Y', strtotime($fecha));
//       $asisestudid = $row['asis_estud_id'];
//       $asisgrupoid = $row['asis_grp_id'];
//       $asismoduloid = $row['asis_module_id'];
//       $asistio = $row['asis_asistio'];
//       $retardo = $row['asis_retardo'];
//       $asisnotas = $row['asis_notas'];
//
//       //$count = $db_conx->query("SELECT estud_id FROM estudiantes WHERE grupo_id='$groupid' AND estud_status_id= 1");
//       // $studCount = $count->num_rows;
//
//       $asis_list .= '<tr class="'.returnModule($module_name).'">
//       <td class="text-center">'.$asisid.'</td>
//       <td>'.$asisfecha.'</td>
//       <td class="text-center">'.$asisestudid.'</td>
//       <td class="text-center">'.$asisgrupoid.'</td>
//       <td class="text-center">'.$asismoduloid.'</td>
//       <td class="text-center">'.$asistio.'</td>
//       <td class="text-center">'.$retardo.'</td>
//       <td>'.$asisnotas.'</td>
//       <td><a href="asis_details.php?id='.$asisid.'">Details</a></td>
//       </tr>';
//   }
//   function returnModule($mod){
//       $module = "";
//       switch($mod){
//           case "FR Elementary A":
//			$module="elem-bground";
//           break;
//           case "FR Elementary B":
//			$module="elem-bground";
//           break;
//           case "FR Pre-Intermediate A":
//			$module="preint-bground";
//           break;
//           case "FR Pre-Intermediate B":
//			$module="preint-bground";
//           break;
//           case "FR Intermediate A":
//			$module="int-bground";
//           break;
//           case "FR Intermediate B":
//			$module="int-bground";
//           break;
//           case "Grammar Gym 1":
//			$module="gg-bground";
//           break;
//       }
//       return $module;
//    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Asistencias</title>
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
			<h1>Asistencias
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