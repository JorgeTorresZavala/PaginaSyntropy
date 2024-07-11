<?php

  //Controlador: Páginas.

  //Clase Paginas.
  class Paginas extends Controlador{    //Con 'extends', la clase Paginas HEREDA los atributos y métodos de la clase Controlador;
                                        //es decir, se pueden referenciar/ejecutar con el símbolo '->'.
                                        //La clase 'Controlador', se cosidera 'Parent::'.
    //Atributos:
    private $exedpModelo;

    //Método: Constructor
    public function __construct(){

      $this->usrModelo = $this->modelo('Usuario');    //Ejecuta/Invoca el método modelo, de la clase 'Controlador'...
                                                      //envía el parámetro Usuario
    }

    //Método: Index
    public function index(){
 
      //Obtener los usuarios:
      $usuarios=$this->usrModelo->obtenerUsuarios();
      
      $datos = [
        'usuarios' => $usuarios
      ];

      //Carga la página 'inicio'...
      $this->vista('paginas/inicio', $datos);   //Envio de los usuarios, obtenidos en la variable $datos

    }

    //Éste método se solicita desde el link 'insertar' de la página principal...cuando se crea un nuevo registro. 
    public function agregar(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){   //Si se recibieron datos desde el formulario...

        $datos = [    //Se asignan los datos...con los nombres de la columnas de la tabla en la BDD

          'nombre' => trim($_POST['nombre']),
          'apellido1' => trim($_POST['apellido1']),
          'apellido2' => trim($_POST['apellido2']),
          'correo' => trim($_POST['correo']),
          'celular' => trim($_POST['celular'])

        ];

        if($this->usrModelo->agregarUsuario($datos)){

          redireccionar('paginas');

        }else{

          die('Algo salió mal');

        }

      }else{  //Si NO se recibieron datos desde el formulario...

        $datos = [

          'nombre' =>'',
          'apellido1' => '',
          'apellido2' => '',
          'correo' => '',
          'celular' => ''
        ];

        $this->vista('paginas/agregar', $datos);
        
      }     
    }
  }

?>