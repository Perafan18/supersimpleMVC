<?php

class inicio extends Controlador
{

    public function index(){
        echo json_encode(array("a"=>"a"));
    }

    public function hola(){
        echo "HOLA";
    }
}