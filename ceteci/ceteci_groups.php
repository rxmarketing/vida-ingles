<?php
    $db_conx = new mysqli("localhost","ricardo","tiotony","ceteci");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        //echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        //echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
    $group_list = "";
    $module_name = "";
    $consulta = "SELECT * FROM grupos WHERE grupo_estatus_id=5 ORDER BY grupo_estatus_id DESC";
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
        $groupid = $row['grp_id'];
        $escuelaid = $row['escuela_id'];
        $maestroid = $row['maes_id'];
        $grupoclave = $row['grp_clave'];
        $grupoestatusid = $row['grupo_estatus_id'];
        $moduloid = $row['modulo_id'];
        $grupotimein = date_create($row['grupo_timein']);
        $grupotimeout = date_create($row['grupo_timeout']);
        $grupodias = $row['grupo_dias'];
        $grupohorario = date_format($grupotimein,'g:ia') . ' - '. date_format($grupotimeout,'g:ia') . ' / ' . $grupodias;
        $fechacreada = $row['grp_fecha_creada'];
        $grp_fechacreada = strftime('%d %b, %Y', strtotime($fechacreada));
        $fechamodificada = $row['grp_fecha_modificacion'];
        $grp_fechamodificada = strftime('%d %b, %Y', strtotime($fechamodificada));
        $gruponotas = $row['grupo_notas'];
        //$currWeek = mysqli_query($db_cetec_conx, "SELECT ");
        
       $count = $db_conx->query("SELECT estud_id FROM estudiantes WHERE grupo_id='$groupid' AND estud_status_id= 1");
        $studCount = $count->num_rows;
        
        $group_list .= '<tr class="'.returnModule($module_name).'">
        <td class="text-center">'.$groupid.'</td>
        <td>'.$grupoclave.'</td>
        <td class="text-center">'.$maestroid.'</td>
        <td class="text-center">'.$studCount.'</td>
        <td class="text-center">'.$grupoestatusid.'</td>
        <td>'.$grupohorario.'</td>
        <td class="text-center">'.$moduloid.'</td>
        <td class="text-center">'.$escuelaid.'</td>
        <td>'.$gruponotas.'</td>
        <td>'.$grp_fechacreada.'</td>
        <td>'.$grp_fechamodificada.'</td>
        <td><a href="group_details.php?id='.$groupid.'">Details</a></td>
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
        <title>Groups CETECi</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/cetec.css" />
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="js/myjavascript.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Grupos CETECi <small><?php echo $group_count; ?></small></h1>
            <table class="table-data">
                <thead>
                    <th>ID Grupo</th>
                    <th>Clave</th>
                    <th>ID Maestro</th>
                    <th># estudiantes</th>
                    <th>Estatus</th>
                    <th>Horario / Días</th>
                    <th>ID Modulo</th>
                    <th>ID Escuela</th>
                    <th>Notas</th>
                    <th>Creada</th>
                    <th>Modificada</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php echo $group_list ?>
                </tbody>
                    <tr>
                    	<td><small>table footer</small></td>
                    </tr>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </body>
</html>