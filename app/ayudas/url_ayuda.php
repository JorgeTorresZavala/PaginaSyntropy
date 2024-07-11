<?php
  
  //Función para redireccionar a la '$pagina'...'paginas' viene como parámetro del método agregarUsuario de paginas/agregar
  function redireccionar($pagina){
    
    header ('localhost' . RUTA_URL . $pagina);  //Envía un encabezado HTTP (URL) sin formato para redirigir a la $página
    
  }

?>