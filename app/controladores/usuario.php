<?php

class usuario extends ControladorApi
{
    public function index(){
        echo json_encode(array("b"=>"b"));
    }

    public function getOne(){
        echo json_encode(array("Metodo"=>"getOne"));
    }

    public function getAll(){
        echo json_encode(array("Metodo"=>"getAll"));
    }

    public function create(){
        echo json_encode(array("Metodo"=>"create"));
    }

    public function update(){
        echo json_encode(array("Metodo"=>"update"));
    }

    public function delete(){
        echo json_encode(array("Metodo"=>"delete"));
    }
}