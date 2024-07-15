<?php

  //Clase: Controlador. Se instancia simultáneamente con el controlador 'Paginas'; carga los modelos y las vistas.
  //Es una extensión del controlador 'Paginas' con 'extends'
  class Controlador{

    //Método: modelo. Carga el modelo enviado desde el método constructor del controlador 'Paginas' (Paginas.php)
    public function modelo($modelo){

      require_once '../app/modelos/' . $modelo . '.php';
      return new $modelo(); //Regresa una instancia de $modelo (Usuario)

    }

    //Método: vista (cargar la vista)
    public function vista($vista, $datos = []){

      //Si el archivo $vista existe
      if(file_exists('../app/vistas/' . $vista . '.php')){
        
        require_once '../app/vistas/' . $vista . '.php';

      }else{  //Si el archivo $vista no existe
        
        die('La vista no existe');

      }

    }
  }


?>




