<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 05/04/2017
 * Time: 05:33 PM
 */

namespace database;


use PDO;

class Database
{
    /**
     *
     */
    public function get_conx()
    {
        $user = "ricomx";
        $pass = "tiotony";
        $host = "localhost";
        $db = "cetec";

        $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        return $conn;
    }

    public function selectOption($table)
    {
        $output = null;
        foreach ($conx->query('SELECT * FROM $table') as $row) {
            $id = $row['maes_estatus_id'];
            $status = $row['maes_estatus_nombre'];
            $output .= '<option value="' . $id . '">' . $status . '</option>';
        }
        return $output;
    }
}