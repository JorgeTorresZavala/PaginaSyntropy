<?php

  //Clase Controlador,: carga los modelos y las vistas.
  //Es una extensión del controlado 'Paginas' con 'extends'
  class Controlador{

    //Método: modelo (carga el modelo enviado desde el contructor del controlador 'Paginas')
    public function modelo($modelo){
      require_once '../app/modelos/' . $modelo . '.php';
      return new $modelo(); //Regresa una instancia de $modelo
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




