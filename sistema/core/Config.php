<?php

class Config
{
    private static $configuracionArray;
    public static function addPropiedad($claveString,$valorString){
        self::$configuracionArray[$claveString] = $valorString;
    }

    public static function getPropiedad($claveString)
    {
        if(isset(self::$configuracionArray[$claveString])){
            return self::$configuracionArray[$claveString];
        }else{
            return null;
        }
    }
}