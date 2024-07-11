<?php

  //Configuración (credenciales) de acceso a la base de datos:
  define('DB_HOST', 'localhost');   //'DB_HOST guarda el hospedaje
  define('DB_USUARIO', 'root');     //'DB_USUARIO guarda el usuario
  define('DB_PASSWORD', '');        //'DB_PASSWORD guarda el password
  define('DB_NOMBRE', 'syntropy');  //'DB_NOMBRE guarda el nombre de la BDD

  //Ruta de la aplicación:
  define('RUTA_APP', dirname(__FILE__, 2));   //Guarda en la constante RUTA_APP, la ruta de la aplicación
  
  //Ruta URL, ejemplo: http://localhost/PaginaSyntropy/
  define('RUTA_URL', 'http://localhost/PaginaSyntropy');   //Guarda en la constante RUTA_URL, la URL de la aplicación 
  
  //Nombre del sitio:
  define('NOMBRESITIO', 'Syntropy');
  
?>