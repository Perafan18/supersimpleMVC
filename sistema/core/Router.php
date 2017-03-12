<?php


class Router{
    private static $instanciaRouter;

    private $rutaRealString;
    private $rutaActionString;

    public $controladorString;
    public $metodoString;
    private static $controladorDefault;
    private $metodoDefault = "index";
    private $segmentosReales;
    private $requestMethodString;

    private static $urlString;
    private static $entornoString;

    public static $rutasArray = array();



    public function __construct()
    {
        $this->rutaRealString = $_SERVER['REQUEST_URI'];
        $this->requestMethodString = $_SERVER['REQUEST_METHOD'];
        $segmentosRutaArray = array();
        $posicionIndex = strpos($this->rutaRealString,"index.php");
        if($posicionIndex!==false){
            $posicionGet = strpos($this->rutaRealString,"?");
            $posicionInicial = $posicionIndex+strlen("index.php")+1;
            if($posicionGet!==FALSE){
                $segmentos =  substr($this->rutaRealString,$posicionInicial,$posicionGet-$posicionInicial);
            }else{
                $segmentos =  substr($this->rutaRealString,$posicionInicial);
            }

            $this->rutaActionString = $segmentos;
            foreach (self::$rutasArray as $posicionRuta => $configuracionRuta){
                $uriString = str_replace("/",'\/',$configuracionRuta["URI"]);
                if(preg_match("/^{$uriString}+$/", $segmentos)){
                    if($configuracionRuta["METHOD"] == "" || $configuracionRuta["METHOD"] == $this->requestMethodString){
                        $this->rutaActionString = $configuracionRuta["ACTION"];
                    }
                }
            }
            $segmentosRutaArray = explode("/",$this->rutaActionString);
        }
        $this->controladorString = (isset($segmentosRutaArray[0]) && $segmentosRutaArray[0] != "")? $segmentosRutaArray[0] :  self::$controladorDefault;
        $this->metodoString = (isset($segmentosRutaArray[1])&& $segmentosRutaArray[1] != "") ? $segmentosRutaArray[1] : $this->metodoDefault;
        $this->segmentosReales = $segmentosRutaArray;
    }

    public static function addRuta($nuevRutaString,$rutaString,$metodoString=""){
        $ruta = array("URI"=>$nuevRutaString,"ACTION"=>$rutaString,"METHOD"=>$metodoString);
        array_push(self::$rutasArray,$ruta);
    }

    public static function setControladorDefault($controladorDefault){
        self::$controladorDefault = $controladorDefault;
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
        return $this->segmentosReales;
    }

    /**
     * @param mixed $urlString
     */
    public static function setUrl($entornoString,$urlString)
    {
        self::$urlString = $urlString;
        self::$entornoString = $entornoString;
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


