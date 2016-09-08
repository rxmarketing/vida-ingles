<?php
include_once("../inc/checar_sesion.php");
    if($_POST["resultId"] !="") {
        include_once("../inc/db_vidainglescore_conn.php");
        $ejId = $_POST["ejerid"];
        $ejUsername = $_POST["logusername"];
        $ejInput1 = $_POST["inputq1"];
        $ejInput2 = $_POST["inputq2"];
        $ejInput3 = $_POST["inputq3"];
        $ejInput4 = $_POST["inputq4"];
        $ejInput5 = $_POST["inputq5"];
        $ejInput6 = $_POST["inputq6"];
        $ejInput7 = $_POST["inputq7"];
        $ejInput8 = $_POST["inputq8"];
        $ejInput9 = $_POST["inputq9"];
        $ejInput10 = $_POST["inputq10"];
        $ejIp = getenv('REMOTE_ADDR');
        // Update exercise
        $consulta = "UPDATE resultados_ejercicios SET
        ejer_id = '$ejId'
        ,userid = '$ejUsername'
        ,user_answer1 = '$ejInput1'
        ,user_answer2 = '$ejInput2'
        ,user_answer3 = '$ejInput3'
        ,user_answer4 = '$ejInput4'
        ,user_answer5 = '$ejInput5'
        ,user_answer6 = '$ejInput6'
        ,user_answer7 = '$ejInput7'
        ,user_answer8 = '$ejInput8'
        ,user_answer9 = '$ejInput9'
        ,user_answer10 = '$ejInput10'
        WHERE result_id = ' ".$_POST["resultId"]."'";
        if (!$consulta = $db_conx->prepare($consulta)) {
            echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
            echo "Fallo la actualizacion (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
        $sql->execute();
        } else {
        // INSERT exercise
        $consulta = "INSERT INTO resultados_ejercicios (
        ejer_id
        ,userid
        ,user_answer1
        ,user_answer1
        ,user_answer1
        ,user_answer1
        ,user_answer1
        ,user_answer1
        ,user_answer1
        ,user_answer1
        ,user_answer1
        ,user_answer1
        ,ip
        ,datetaken
        )
        VALUES (
        '$ejId'
        ,'$ejUsername'
        ,'$ejInput1'
        ,'$ejInput2'
        ,'$ejInput3'
        ,'$ejInput4'
        ,'$ejInput5'
        ,'$ejInput6'
        ,'$ejInput7'
        ,'$ejInput8'
        ,'$ejInput9'
        ,'$ejInput10'
        ,'$ejIp'
        ,now()
        )";
        if (!$sql = $db_conx->prepare($consulta)) {
            echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
            echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
        $sql->execute();
        echo $db_conx->insert_id;
    }
?>