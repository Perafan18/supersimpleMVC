<?php

Router::setControladorDefault("inicio");

Router::addRuta('inicio',"inicio/hola");
Router::addRuta('user',"usuario/getAll","GET");
Router::addRuta('user/[[:digit:]]',"usuario/getOne","GET");
Router::addRuta('user',"usuario/create/","POST");
Router::addRuta('user/[[:digit:]]',"usuario/update","PUT");
Router::addRuta('user/[[:digit:]]',"usuario/delete","DELETE");