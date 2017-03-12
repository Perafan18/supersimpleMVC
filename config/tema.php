<?php

$temaSSMVC = new Tema("ssmvc");
$temaSSMVC->addCss(array(
    "bootstrap",
    "bootstrap-theme"
));

$temaSSMVC->addJs(array(
    "jquery",
    "bootstrap"
));
$temaSSMVC->addPropiedad("icon","valor");

Config::addPropiedad("tema",$temaSSMVC);