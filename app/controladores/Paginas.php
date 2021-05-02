<?php

  //Controlador: Páginas
  class Paginas extends Controlador{

    private $articuloModelo;

    //Método: Constructor
    public function __construct(){
      //echo 'Página cargada desde el Controlador Páginas.php';
      $this->articuloModelo = $this->modelo('Articulo');

    }

    //Método: Index
    public function index(){
      //$this->vista('paginas/informacion');  //Punto de prueba, vista inexistente.
      //$this->vista('paginas/inicio');  //Punto de prueba, vista existente.

      $articulos = $this->articuloModelo->obtenerArticulos();

      $datos = [
        'titulo' => 'Bienvenidos a SYNTROPY',
        'articulos' => $articulos
      ];

      $this->vista('/paginas/inicio', $datos);
    
    }

    public function articulo(){
      $this->vista('paginas/articulo');
    }

    public function actualizar($num_registro){
        echo $num_registro;
    }
  }

?>