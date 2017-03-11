<?php

class Router{
    private static $instanciaRouter;
    private $rutaString;
    private $rutaArray;
    public $controladorString;
    public $metodoString;
    private $controladorDefault;
    private $metodoDefault = "index";
    private $segmentosRutaArray;
    private $rutasArray;


    private $requestMethodString;

    public function __construct()
    {

    }

    public function getRoute(){
        $this->rutaString = $_SERVER['REQUEST_URI'];
        $this->separarRuta();

        //$this->requestMethodString = $_SERVER['REQUEST_METHOD'];

    }

    private function separarRuta(){
        if(strpos($this->rutaString,"?") !== false){
            $this->rutaArray = explode("/",substr($this->rutaString,1,strpos($this->rutaString,"?")-1));
        }else{
            $this->rutaArray = explode("/",substr($this->rutaString,1));
        }
        $correctoBoolean = FALSE;
        $this->segmentosRutaArray = array();
        foreach ($this->rutaArray as $index => $posicion){
            if($posicion == "index.php" || $correctoBoolean == TRUE){
                array_push($this->segmentosRutaArray,$this->rutaArray[$index]);
                $correctoBoolean = TRUE;
            }
        }

        $this->controladorString = (isset($this->segmentosRutaArray[1]) && $this->segmentosRutaArray[1] != "")? $this->segmentosRutaArray[1] :  $this->controladorDefault;
        $this->metodoString = (isset($this->segmentosRutaArray[2])&& $this->segmentosRutaArray[2] != "") ? $this->segmentosRutaArray[2] : $this->metodoDefault;
    }

    public function addRuta(){

    }

    public function setControladorDefault($controladorDefault){
        $this->controladorDefault = $controladorDefault;
    }

    public function getControlador(){
        return $this->controladorString;
    }

    /**
     * @return mixed
     */
    public function getMetodo()
    {
        return $this->metodoString;
    }

    /**
     * @return mixed
     */
    public function getSegmentos()
    {
        return $this->segmentosRutaArray;
    }

    public static function getInstance()
    {
        if (  !self::$instanciaRouter instanceof self)
        {
            self::$instanciaRouter = new self;
        }
        return self::$instanciaRouter;
    }

    public function __clone()
    {
        trigger_error("Operación Invalida: No puedes clonar una instancia de ". get_class($this) ." class.", E_USER_ERROR );
    }

}


