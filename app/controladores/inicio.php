<?php

class inicio extends Controlador
{

    public function index(){

        //$modelo = $this->modelo("inicioModelo");
        //$resultados = $modelo->inicio();
        //$parametros_vista["resultados"] = $resultados;

        $parametros_vista["nombre"] = "Super Simple MVC";
        $parametros["vista"] = $this->vista("inicio/index/vista",$parametros_vista,true);
        $this->vista("html",$parametros);
    }

}