<?php
  
  //Función para redireccionar a las páginas solicitadas...'$pagina' viene como parámetro de:
  //paginas->agregarUsusario.
  //paginas->actualizarUsuario.
  //paginas->borrarUsuario.

  function redireccionar($pagina){
    
    header ('location: ' . RUTA_URL . $pagina);  //Envía un encabezado HTTP (URL) sin formato para redirigir a la página solicitada en $pagina
    
  }

?>