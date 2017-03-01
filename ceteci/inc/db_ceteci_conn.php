<?php

 $db_conx = new mysqli("localhost","ricardo","tiotony","ceteci");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, pruebe mas tarde. <br />";
        echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
?>