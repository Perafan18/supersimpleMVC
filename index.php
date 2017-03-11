<?php
require "sistema/core/Router.php";
require "sistema/core/Controlador.php";
require "sistema/core/api/ControladorApi.php";
require "config/general.php";

$router = new Router();
$router->setControladorDefault("inicio");
$router->getRoute();
$entornoString = $config["entorno"];
$controladorString = $router->getControlador();
$metodoString =  $router->getMetodo();
if(!is_file("app/controladores/".$controladorString.".php")){
    exit("No se ha encontrado el controlador ".$controladorString);
}
include_once ("app/controladores/".$controladorString.".php");
//CREAR NUEVA INSTANCIA DE LA CLASE
$claseControlador = new $controladorString();

if(method_exists($claseControlador,$metodoString) == TRUE){
    //EJECUTAR
    call_user_func_array(array(&$claseControlador, $metodoString), array());
}else{
    echo "El metodo {$metodoString} no existe dentro del controlador";
}