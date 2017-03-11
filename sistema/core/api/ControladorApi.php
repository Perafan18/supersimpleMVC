<?php

class ControladorApi extends Controlador
{
    public function __construct()
    {
        header('Content-Type: application/JSON');
    }
}