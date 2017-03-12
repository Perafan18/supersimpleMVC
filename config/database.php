<?php
//MYSQL y MONGODB
$baseDeDatos = new Database();
$baseDeDatos->setTipo("MYSQL");
$baseDeDatos->setConfiguracion("DEVELOPMENT",array(
    "host" => "localhost",
    "user" => "root",
    "password" => "",
    "database" => "city"
));

$baseDeDatos->setConfiguracion("TESTING", array(
    "host" => "",
    "user" => "",
    "password" => "",
    "database" => ""
));

$baseDeDatos->setConfiguracion("PRODCUTION", array(
    "host" => "",
    "user" => "",
    "password" => "",
    "database" => ""
));
/*
$baseDeDatosMongo = new Database();
$baseDeDatosMongo->setTipo("MONGODB");
$baseDeDatosMongo->setConfiguracion("DEVELOPMENT",array(
    "host" => "",
    "user" => "",
    "password" => "",
    "database" => ""
));
*/

Database::addDataBase("MySQL",$baseDeDatos);
//Database::addDataBase("MONGO",$baseDeDatosMongo);
