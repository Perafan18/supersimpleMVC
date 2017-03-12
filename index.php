<?php
require "sistema/core/Router.php";
require "sistema/core/Config.php";
require "sistema/core/Tema.php";
require "sistema/core/Controlador.php";
require "sistema/core/Modelo.php";
require "sistema/core/Vista.php";
require "sistema/database/Database.php";

require "config/rutas.php";
require "config/general.php";
require "config/tema.php";
require "config/database.php";

$router = new Router();
$controladorString = $router->getControlador();
$metodoString =  $router->getMetodo();

if($controladorString == null){
    exit("No se ha configurado el controlador default");
}

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