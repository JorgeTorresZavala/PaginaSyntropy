<?php

  //Se carga la configuración de la aplicación
  require_once 'config/Configurar.php';

  //Autoload PHP, carga todos los archivos (clases) de la carpeta librerias
  spl_autoload_register(function($nombreClase){
  
    require_once 'librerias/' . $nombreClase . '.php';
  
  });


  //require_once 'librerias/Base.php';
  //require_once 'librerias/Controlador.php';
  //require_once 'librerias/Core.php';  

?>