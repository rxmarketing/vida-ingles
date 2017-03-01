<?php 
$db_conx = new mysqli("localhost","ricardo","tiotony","ceteci");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        //echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        //echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
    $lista_estudiantes = null;
    $consulta = "SELECT * FROM estudiantes order by grupo_id DESC";
    if (!$sql = $db_conx->prepare($consulta)) {
        echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
        echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
        exit;  
    }
    $sql->execute();
    if(!$resultado = $sql->get_result()) {
       echo "Fallo la fetch_result (" . $db_conx->errno . ") " . $db_conx->error;
        exit;
    }
    while($fila = $resultado->fetch_assoc()) {
        $studid = $fila['estud_id'];
        $matricula = $fila['estud_matricula'];
        $schoolid = $fila['escuela_id'];
        $grupoid = $fila['grupo_id'];
        $studstatusid = $fila['estud_status_id'];
        $fechainicio = $fila['estud_fecha_inicio'];
        $fechafinal = $fila['estud_fecha_final'];
        $pnombre = $fila['estud_pnombre'];
        $snombre = $fila['estud_snombre'];
        $papellido = $fila['estud_papellido'];
        $sapellido = $fila['estud_sapellido'];
        $studfullname = $pnombre . ' ' . $snombre . ' ' . $papellido . ' ' . $sapellido;
        $studcel = $fila['estud_celular'];
        $studemail = $fila['estud_email'];
        $studfechainicio = $fila['estud_fecha_inicio'];
        $muniid = $fila['muni_id'];
        $generoid = $fila['genero_id'];
        $cp = $fila['estud_cp'];
        $asentamientoid = $fila['asentamiento_id'];
		$lista_estudiantes .= '<tr>
                                <td>'.$studid.'</td>
                                <td>'.$studfechainicio.'</td>
                                <td>'.$matricula.'</td>
                                <td>'.$studfullname.'</td>
                                <td>'.$generoid.'</td>
                                <td>'.$schoolid.'</td>
                                <td>'.$grupoid.'</td>
                                <td>'.$studstatusid.'</td>
                                <td>'.$studcel.'</td>
                                <td>'.$studemail.'</td>
                                <td>'.$muniid.'</td>
                                <td>'.$asentamientoid.'</td>
                                <td>'.$cp.'</td>
                              </tr>';
    }
    
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>CETECi Students</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/cetec.css" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script src="js/ceteci.js"></script>
    <style type="text/css">
        
    </style>
</head>
<body>
	<div class="container">
		<h1>CETECi Students</h1>
		    <table class="table-data">
		        <thead>
		            <th>ID</th>
		            <th>Fecha inicio</th>
		            <th>Matricula</th><th>Nombre</th><th>Genero ID</th><th>Escuela</th><th>Grupo</th><th>Estatus</th><th>Celular</th><th>Email</th><th>Municipio</th><th>Asentamiento</th><th>CP</th>
		        </thead>
		        <tbody><?php echo $lista_estudiantes; ?></tbody>
		    </table>
	</div>
</body>
</html>