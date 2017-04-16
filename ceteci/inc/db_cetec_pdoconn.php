<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/04/2017
 * Time: 12:00 PM
 */
// Parametros de la conexion
try {
    $dbconn = new PDO("mysql:host=localhost;dbname=cetec;charset=utf8", "ricomx", "tiotony");
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} // Termina try{}

    // Si hay un error, muestralo
catch (PDOException $error) {
    echo $error->getMessage();
} // Termina catch()