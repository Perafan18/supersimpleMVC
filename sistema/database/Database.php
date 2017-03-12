<?php
include "Mysql.php";

class Database
{
    private $tipoString;
    private $configuracionesArray;
    private static $basesDeDatosArray;

    public function setTipo($tipo){
        $this->tipoString = $tipo;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipoString;
    }

    public function setConfiguracion($entorno,$configuracion){
        $this->configuracionesArray[$entorno] = $configuracion;
    }

    /**
     * @return mixed
     */
    public function getConfiguracion($entorno)
    {
        return $this->configuracionesArray[$entorno];
    }

    public static function addDataBase($nombreBaseDeDatosString, $baseDeDatos){

        $entornoString = Config::getPropiedad("entorno");
        $configuracionArray = $baseDeDatos->getConfiguracion($entornoString);
        switch ($baseDeDatos->getTipo()){
            case "MYSQL":
                self::$basesDeDatosArray[$nombreBaseDeDatosString] = new mysqli(
                    $configuracionArray["host"],
                    $configuracionArray["user"],
                    $configuracionArray["password"],
                    $configuracionArray["database"]
                ) or die(mysqli_error());
                break;
            case "MONGODB":
                //Aun no disponible
                break;
            default:
                echo "Error en tipo de base de datos ".$nombreBaseDeDatosString;
        }
    }

    public static function getDataBase($nombreBaseDeDatosString){
        return self::$basesDeDatosArray[$nombreBaseDeDatosString];
    }

}