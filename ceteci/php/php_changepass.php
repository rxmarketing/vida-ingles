<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 17/04/2017
 * Time: 05:01 PM
 */
include_once '../inc/check_session.php';

if (isset($_POST['npassword'])) {
    include_once '../inc/db_cetec_mysqliconn.php';
    $npass = $_POST['npassword'];
    $cnpass = $_POST['cpassword'];
    $newpass_hash = hash("SHA512", $npass);
    if ($npass == "" || $cnpass == "") {
        echo "Completa el formulario.";
        exit;
    } elseif ($npass !== $cnpass) {
        echo "Las contraseñas no son iguales!";
        exit;
    } else {
        $stmt = "UPDATE estudiantes SET estudiantes.estud_pass='$newpass_hash' WHERE estudiantes.estud_id='$log_id'";
        $updateqry = mysqli_query($db_mysqliconx, $stmt);
        $resultrows = mysqli_affected_rows($db_mysqliconx);
        if ($resultrows < 1) {
            echo "Error. No se cambio la contraseña!!";
            exit;
        }
        echo "passchange_success";
        header('location: ../logout.php');
        exit();
    }
}