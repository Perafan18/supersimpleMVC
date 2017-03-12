<?php

class inicioModelo extends Modelo
{
    private $baseDeDatos;
    function __construct()
    {
        $this->baseDeDatos = $this->loadDatabase("MySQL");
    }
    /*
    function inicio(){
        $resultado = $this->baseDeDatos->query("SELECT * FROM tabla");
        return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
    }
    */
}