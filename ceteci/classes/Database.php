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
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }


}


/* Fetch grupos
------------------------------------------------------------------------------------*/
$getGrpOpt = new Database();
$getRows = $getGrpOpt->getOptions("SELECT * FROM grupos");
$grpOpt = null;
foreach ($getRows as $row) {
    $grpOpt .= '<option value="' . $row['grupo_id'] . '">' . $row['grupo_clave'] . '</option>';
}


/* fetch grupo categorías
-------------------------------------------------------------------------------------*/
$getGrpCatOpt = new Database();
$getRows = $getGrpCatOpt->getOptions("SELECT * FROM grupo_categorias");
$grpCatOpt = null;
foreach ($getRows as $row) {
    $grpCatOpt .= '<option value="' . $row['grupo_cat_id'] . '">' . $row['grupo_cat_nombre'] . '</option>';
}


/* Fetch grupo estatuses
------------------------------------------------------------------------------------*/
$getGrpStatOpt = new Database();
$getRows = $getGrpStatOpt->getOptions("SELECT * FROM grupo_estatuses");
$grpStatOpt = null;
foreach ($getRows as $row) {
    $grpStatOpt .= '<option value="' . $row['grupo_estatus_id'] . '">' . $row['grupo_estatus_nombre'] . '</option>';
}


/* fetch módulos
-------------------------------------------------------------------------------------*/
$getModOpt = new Database();
$getRows = $getModOpt->getOptions("SELECT * FROM modulos");
$modOpt = null;
foreach ($getRows as $row) {
    $modOpt .= '<option value="' . $row['mod_id'] . '">' . $row[''] . '</option>';
}


/* fetch módulo estatuses
-------------------------------------------------------------------------------------*/
$getModStatOpt = new Database();
$getRows = $getModStatOpt->getOptions("SELECT * FROM modulo_estatuses");
$modStatOpt = null;
foreach ($getRows as $row) {
    $modStatOpt .= '<option value="' . $row['modulo_estatus_id'] . '">' . $row['modulo_estatus_nombre'] . '</option>';
}


/* Fetch modulo categorías
------------------------------------------------------------------------------------*/
$getModCatOpt = new Database();
$getRows = $getModCatOpt->getOptions("SELECT * FROM modulo_categorias");
$modCatOpt = null;
foreach ($getRows as $row) {
    $modCatOpt .= '<option value="' . $row['modulo_cat_id'] . '">' . $row['modulo_cat_nombre'] . '</option>';
}


/* Fetch escuelas
------------------------------------------------------------------------------------*/
$getSclOpt = new Database();
$getRows = $getSclOpt->getOptions("SELECT * FROM escuelas");
$sclOpt = null;
foreach ($getRows as $row) {
    $sclOpt .= '<option value="' . $row['esc_id'] . '">' . $row['esc_nombre_corto'] . '</option>';
}


/* Fetch maestros
------------------------------------------------------------------------------------*/
$getTeachOpt = new Database();
$getRows = $getTeachOpt->getOptions("SELECT * FROM maestros");
$teachOpt = null;
foreach ($getRows as $row) {
    $teachOpt .= '<option value="' . $row['maes_id'] . '">' . $row['maes_papellido'] . ' ' . $row['maes_sapellido'] . '</option>';
}


/* Fetch maestro estatuses
------------------------------------------------------------------------------------*/
$getMaesOpt = new Database();
$getRows = $getMaesOpt->getOptions("SELECT * FROM maestro_estatuses");
$list = null;
foreach ($getRows as $row) {
    $list .= '<option value="' . $row['maes_estatus_id'] . '">' . $row['maes_estatus_nombre'] . '</option>';
}


/* fetch estudiante estatuses
-------------------------------------------------------------------------------------*/
$getStudStatOpt = new Database();
$getRows = $getStudStatOpt->getOptions("SELECT * FROM estudiante_estatuses");
$studStatOpt = null;
foreach ($getRows as $row) {
    $studStatOpt .= '<option value="' . $row['estud_estatus_id'] . '">' . $row['estud_estatus_nombre'] . '</option>';
}


/* fetch countries
--------------------------------------------------------------------------------------*/
$getCountriesOpt = new Database();
$getRows = $getCountriesOpt->getOptions("SELECT * FROM paises");
$countryOpt = null;
foreach ($getRows as $row) {
    $countryOpt .= '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
}


/* fetch estados
-----------------------------------------------------------------------------------------*/
$getEstadosOpt = new Database();
$getRows = $getEstadosOpt->getOptions("SELECT * FROM estados");
$estadosOpt = null;
foreach ($getRows as $row) {
    $estadosOpt .= '<option value="' . $row['estado_id'] . '">' . $row['estado_nombre'] . '</option>';
}