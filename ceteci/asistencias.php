<?php
    $db_conx = new mysqli("localhost","ricardo","tio51tony50","ceteci");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        //echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        //echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
    $examen_list = "";
    $module_name = "";
    $consulta = "SELECT * FROM tbl_asistencias ORDER BY asis_fecha DESC";
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
    $asis_count = $resultado->num_rows;
    
    // Start the loop
    while ($row = $resultado->fetch_assoc()) {
        $asisid = $row['asis_id'];
        $fecha = $row['asis_fecha'];
        $asisfecha = strftime('%d %b, %Y', strtotime($fecha));
        $asisestudid = $row['asis_estud_id'];
        $asisgrupoid = $row['asis_grp_id'];
        $asismoduloid = $row['asis_module_id'];
        $asistio = $row['asis_asistio'];
        $retardo = $row['asis_retardo'];
        $asisnotas = $row['asis_notas'];
        
        //$count = $db_conx->query("SELECT estud_id FROM estudiantes WHERE grupo_id='$groupid' AND estud_status_id= 1");
        // $studCount = $count->num_rows;
        
        $asis_list .= '<tr class="'.returnModule($module_name).'">
        <td class="text-center">'.$asisid.'</td>
        <td>'.$asisfecha.'</td>
        <td class="text-center">'.$asisestudid.'</td>
        <td class="text-center">'.$asisgrupoid.'</td>
        <td class="text-center">'.$asismoduloid.'</td>
        <td class="text-center">'.$asistio.'</td>
        <td class="text-center">'.$retardo.'</td>
        <td>'.$asisnotas.'</td>
        <td><a href="asis_details.php?id='.$asisid.'">Details</a></td>
        </tr>';
    }
    function returnModule($mod){
        $module = "";
        switch($mod){
            case "FR Elementary A":
			$module="elem-bground";
            break;
            case "FR Elementary B":
			$module="elem-bground";
            break;
            case "FR Pre-Intermediate A":
			$module="preint-bground";
            break;
            case "FR Pre-Intermediate B":
			$module="preint-bground";
            break;
            case "FR Intermediate A":
			$module="int-bground";
            break;
            case "FR Intermediate B":
			$module="int-bground";
            break;
            case "Grammar Gym 1":
			$module="gg-bground";
            break;
        }	
        return $module;
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Asistencias CETECi</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/cetec.css" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script src="js/myjavascript.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Asistencias CETECi <small><?php //echo $examen_count; ?></small></h1>
            <table class="table-data">
                <thead>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Estudiante</th>
                    <th>Grupo</th>
                    <th>Modulo</th>
                    <th>Asistio</th>
                    <th>Retardo</th>
                    <th>Notas</th>
                    <th>Detalles</th>
                </thead>
                <tbody>
                    <?php echo $asis_list ?>
                </tbody>
                <tfoot>
                <tr>
                    <td><small>table footer</small></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>