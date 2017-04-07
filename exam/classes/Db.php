<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 05/04/2017
 * Time: 05:33 PM
 */

namespace db;


use PDO;

class Db
{
    // connect to db

    public function __construct($host = "localhost", $db = "cetec", $user = "ricomx", $pass = "tiotony", $options = [])
    {
        $this->isConn = true;
        try {
            $this->datab = new PDO("mysql:host={$host};dbname={$db};charset=utf8", $user, $pass, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function disconnect()
    {
        $this->datab = null;
        $this->isConn = false;
    }

    /**
     * get row --------------------------------------------------------------------------------------
     * @param $query
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function getRow($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * get rows --------------------------------------------------------------------------------------
     * @param $query
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function getRows($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * update row --------------------------------------------------------------------------------------
     */

    public function updateRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

    /**
     * insert row --------------------------------------------------------------------------------------
     * @param $query
     * @param array $params
     * @return bool
     * @throws \Exception
     */

    public function insertRow($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return TRUE;
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * delete row --------------------------------------------------------------------------------------
     */

    public function deleteRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

}