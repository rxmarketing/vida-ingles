<?php
    $db_conx = new mysqli("localhost","ricardo","tio51tony50","app");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
    $eid = $_GET['id'];
    $consulta = "SELECT answer FROM ejercicios_detalles WHERE ejerid='$eid'";
    if(!$sql = $db_conx->prepare($consulta)){
        echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.";
        echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
        exit;
    }
    $sql->execute();
        if(!$resultado = $sql->get_result()) {
            echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
            echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
    $rowCount = $resultado->num_rows;
    //echo $rowCount;
    while($fila = $resultado->fetch_assoc()) {
        $resultados[] = $fila;
    }
    //$array = $resultado->fetch_array();
    echo json_encode($resultados,JSON_PRETTY_PRINT);
?>