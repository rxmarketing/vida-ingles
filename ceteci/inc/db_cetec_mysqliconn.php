<?php
$db_mysqliconx = new mysqli("localhost", "ricomx", "tiotony", "cetec");
$db_mysqliconx->set_charset("utf8");
if ($db_mysqliconx->connect_errno) {
    echo "Lo sentimos, este sitio esta teniendo problemas, intente mas tarde. <br />";
    echo "ERRNO: " . $db_conx->connect_errno . "<br />";
    echo "ERROR: " . $db_conx->connect_error;
    exit;
}
