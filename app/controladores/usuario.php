<?php

class usuario extends Controlador
{

    public function getOne(){
        $this->json(array("Metodo"=>"getOne"));
    }

    public function getAll(){
        $this->json(array("Metodo"=>"getAll"));
    }

    public function create(){
        $this->json(array("Metodo"=>"create"));
    }

    public function update(){
        $this->json(array("Metodo"=>"update"));
    }

    public function delete(){
        $this->json(array("Metodo"=>"delete"));
    }
}