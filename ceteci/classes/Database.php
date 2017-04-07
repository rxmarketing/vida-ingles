<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 06/04/2017
 * Time: 08:59 PM
 */

namespace dbconn;

use PDO;

class Database
{
    // connect to db

    public function __construct($host = "localhost", $db = "cetec", $user = "ricomx", $pass = "tiotony", $options = [])
    {
        $this->isConn = true;
        try {
            $this->dbconx = new PDO("mysql:host={$host};dbname={$db};charset=utf8", $user, $pass, $options);
            $this->dbconx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbconx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function disconnect()
    {
        $this->dbconx = null;
        $this->isConn = false;
    }

    public function getOptions($query, $params = [])
    {

        try {
            $stmt = $this->dbconx->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }


}