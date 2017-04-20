<?php

namespace database;


use PDO;

class DB
{
    public static function query($query, $params = array())
    {
        $stmt = self::connect()->prepare($query);
        $stmt->execute($params);
        //$data = $stmt->fetchAll();
        //return $data;
    }

    public static function getRow($query, $params = array())
    {
        $stmt = self::connect()->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }


    public static function insertRow($query, $params = [])
    {
        try {
            $stmt = self::connect()->prepare($query);
            $data = $stmt->execute($params);
            return $data;
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    private static function connect()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname:cetec;charset=utf8', 'ricomx', 'tiotony');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

}