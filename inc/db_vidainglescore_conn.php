<?php 
//$db_conx = mysqli_connect("localhost", "ricardo", "tio51tony50", "vidaingles");
//if(mysqli_connect_errno()) {
//	echo mysqli_connect_error();
//	exit();
// mysqli_set_charset($db_conx,"utf8");
// 
//}
    $db_conx = new mysqli("localhost","ricardo","tiotony","vidaingles");
    //$db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        //echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        //echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
?>