<?php

  //Configuración de la aplicación:
  require_once 'config/configurar.php';  //Configuración de la aplicación 

  require_once 'ayudas/url_ayuda.php';   //Redirección de la página
  
  //SPL significa: Standard PHP Library.
  //Registra la función 'anónima' $nombreClase dada como implementación de __autoload()
  //Carga las CLASES desde otro archivo sólo cuando sea necesario.
  //Autoload PHP, carga TODAS las CLASES de la carpeta 'librerias'...Core, Controlador y Base
  spl_autoload_register(function($nombreClase){   //$nombreClase es una función anónima, es decir, puede ser cualquier nombre.
    
    require_once 'librerias/' . $nombreClase . '.php';  //Se cargan la Clases: Core, Controlador y Base
    
  });

?>