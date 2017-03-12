<?php

class Tema
{
    private $nombreTema;
    private $propiedadesTema;
    public function __construct($nombreTema)
    {
        $this->nombreTema = $nombreTema;
    }

    /**
     * @return mixed
     */
    public function getNombreTema()
    {
        return $this->nombreTema;
    }

    /**
     * @return mixed
     */
    public function getPropiedadesTema()
    {
        return $this->propiedadesTema;
    }

    /**
     * @return mixed
     */
    public function getPropiedadTema($claveString)
    {
        return $this->propiedadesTema[$claveString];
    }

    /**
     * @return mixed
     */
    public function getCss()
    {
        return $this->propiedadesTema["CSS"];
    }

    /**
     * @return mixed
     */
    public function getJs()
    {
        return $this->propiedadesTema["JS"];
    }

    public function addCss($cssArray){
        $this->propiedadesTema["CSS"] = $cssArray;
    }

    public function addJs($jsArray){
        $this->propiedadesTema["JS"] = $jsArray;
    }

    public function addPropiedad($claveString,$valorString){

    }
}