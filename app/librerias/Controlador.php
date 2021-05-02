<?php

  //Clase Controlador principal, carga los modelos y las vistas

  class Controlador{

    //Carga de modelo
    public function modelo($modelo){
      require_once '../app/modelos/' . $modelo . '.php';
      return new $modelo(); //Instanciar el modelo

    }

    //Carga de vista
    public function vista($vista, $datos = []){
      //Si el archivo vista existe
      if(file_exists('../app/vistas/' . $vista . '.php')){
        require_once '../app/vistas/' . $vista . '.php';

      }else{  //Si el archivo de la vista no existe
        die('La vista no existe');
      }
    }
  }


?>




