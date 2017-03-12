<?php

class Controlador
{
    public $tema;
    public function __construct()
    {
        $temaObject = Config::getPropiedad("tema");
        $this->tema = $temaObject->getNombreTema();
    }

    function vista($vistaString,$parametros = array(),$anidada = false){
        if(is_array($parametros)){
            foreach ($parametros as $variableNombre => $variableValor){
                $$variableNombre = $variableValor;
            }
        }
        unset($parametros);

        $rutaVistaString = "app/vistas/".$this->tema."/".$vistaString.".php";
        if(file_exists($rutaVistaString)){
            if($anidada){
                ob_start();
                include($rutaVistaString);
                $buffer = ob_get_contents();
                @ob_end_clean();
                return $buffer;
            }else{
                include $rutaVistaString;
            }
        }else{
            echo "No existe";
        }
    }

    function modelo($nombreModelo){
        $nombreArchivo = "app/modelos/{$nombreModelo}.php";
        if(file_exists($nombreArchivo)){
            include $nombreArchivo;
            return new $nombreModelo();
        }else{
            return null;
        }
    }

    function json($array){
        header('Content-Type: application/JSON');
        echo json_encode($array);
    }
}