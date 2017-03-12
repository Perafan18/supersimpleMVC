<?php

class Vista
{
    public static function cargarCss(){
        $temaObject = Config::getPropiedad("tema");
        $nombreTemaString = $temaObject->getNombreTema();
        $csstema = $temaObject->getCss();
        $htmlCss = "";
        foreach ($csstema as $css){
            if(file_exists("assets/".$nombreTemaString."/css/".$css.".css")){
                if(file_exists("assets/".$nombreTemaString."/css/".$css.".min.css")){
                    $cssFile = "assets/".$nombreTemaString."/css/".$css.".min.css";
                }else{
                    $cssFile = "assets/".$nombreTemaString."/css/".$css.".css";
                }
                $htmlCss.='<link rel="stylesheet" href="'.$cssFile.'">'."\n";
            }else{
                //echo "No existe ".$css;
            }
        }
        return $htmlCss;
    }

    public static function cargarJs(){
        $temaObject = Config::getPropiedad("tema");
        $nombreTemaString = $temaObject->getNombreTema();
        $csstema = $temaObject->getJs();
        $htmlCss = "";
        foreach ($csstema as $css){
            if(file_exists("assets/".$nombreTemaString."/css/".$css.".css")){
                if(file_exists("assets/".$nombreTemaString."/css/".$css.".min.css")){
                    $cssFile = "assets/".$nombreTemaString."/css/".$css.".min.css";
                }else{
                    $cssFile = "assets/".$nombreTemaString."/css/".$css.".css";
                }
                $htmlCss.='<script src="'.$cssFile.'"></script>'."\n";
            }else{
                //echo "No existe ".$css;
            }
        }
        return $htmlCss;
    }


}