<?php

  //Controlador: Páginas.

  //Clase Paginas.
  class Paginas extends Controlador{    //Con 'extends', la clase Paginas HEREDA los propiedades y métodos de la clase Controlador;
                                        //es decir, se pueden referenciar/ejecutar con el símbolo '->'.
                                        //La clase 'Controlador', se cosidera 'Parent::'.
    //Propiedades:
    private $exedpModelo;

    //Método: Constructor
    public function __construct(){
     
      $this->usrModelo = $this->modelo('Usuario');    //Se define el objeto usrModelo, resultado del método modelo (Usuario), 
                                                      //Es una instancia la clase 'Usuario'...                                                 
    }

    //Método: Index
    //Éste método se ejecuta, cuando no se registra nada en la URL...
    public function index(){
 
      //Obtener los usuarios desde el modelo (Usuario):
      $usuarios=$this->usrModelo->obtenerUsuarios();    //En $usuarios se guardan los valores recibidos desde el modelo (Usuario)
      
      $datos = [
        'usuarios' => $usuarios
      ];

      $this->vista('paginas/inicio', $datos);   //Con vista, se carga la página 'inicio', con los datos obtenidos en la propiedad $datos

    }

    //Método: Agregar Usuario.
    //Éste método se solicita desde el link 'insertar' de la página inicio...cuando se crea un nuevo registro. 
    public function agregar(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){   //Si el método de envío del formulario es ´POST'...

        $datos = [    //Se asignan los datos...con los nombres de la columnas de la tabla becarios en la BDD

          'nombre' => trim($_POST['nombre']),
          'apellido1' => trim($_POST['apellido1']),
          'apellido2' => trim($_POST['apellido2']),
          'correo' => trim($_POST['correo']),
          'celular' => trim($_POST['celular'])

        ];

        if($this->usrModelo->agregarUsuario($datos)){   //Si se recibe 'true' desde el método agregarUsuario, en el modelo 'Usuario'

          redireccionar('/paginas');      //Se carga la vista/formulario agregar (formulario agregar.php)

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

    //Método: editar. Edita datos del usuario.
    //Viene del link 'Editar' de la tabla de inicio...se envía por la URL, Controlador(paginas)/Método(editar)/Parámetro(Dato, $id)
    public function editar($id){
      //Si se hace Click en el botón 'Editar Usuario'...
      if($_SERVER['REQUEST_METHOD'] == 'POST'){   //Si el método del formulario es 'POST'...

        $datos = [    //Se asignan con los nombres de las columnas de la tabla becarios de la BDD, los $datos recibidos desde el formulario.

          'id_becario' => $id,    //se recibe como parámetro...
          'nombre' => trim($_POST['nombre']),
          'apellido1' => trim($_POST['apellido1']),
          'apellido2' => trim($_POST['apellido2']),
          'correo' => trim($_POST['correo']),
          'celular' => trim($_POST['celular'])

        ];

        if($this->usrModelo->actualizarUsuario($datos)){    //Si se recibe 'true' del procedimiento actualizarUsuario, del modelo Usuario...

          redireccionar('/paginas');     

          }else{

            die('Algo salió mal');

          }

      }else{  //Si NO se reciben datos desde el formulario, se obtienen datos del usuario ($id) desde el modelo...

        $usuario = $this->usrModelo->obtenerUsuarioId($id);

        $datos = [

          'id_becario' => $usuario->id_becario,
          'nombre' => $usuario->nombre,
          'apellido1' => $usuario->apellido1,
          'apellido2' => $usuario->apellido2,
          'correo' => $usuario->correo,
          'celular' => $usuario->celular

        ];

        $this->vista('paginas/editar', $datos);   //Se envían a la vista editar (paginas/editar.php), los datos recibidos desde el modelo Usuario (Usuario.php)...
        
      }
    }

    //Método: Borrar. Borra el registro del usuario.
    //Viene del link 'Editar' de la tabla de inicio...se envía por la URL, Controlador(paginas)/Método(borrar)/Parámetro(Dato, $id)
    public function borrar($id){

      //Se obtienen datos del usuario ($id) desde el modelo...
      $usuario = $this->usrModelo->obtenerUsuarioId($id);

      $datos = [

        'id_becario' => $usuario->id_becario,
        'nombre' => $usuario->nombre,
        'apellido1' => $usuario->apellido1,
        'apellido2' => $usuario->apellido2,
        'correo' => $usuario->correo,
        'celular' => $usuario->celular

      ];

        //Si se hace Click en el botón 'Borrar Usuario'...
        if($_SERVER['REQUEST_METHOD'] == 'POST'){   //Si el método del formulario es 'POST'...

          $datos = [    //Se asignan con los nombres de las columnas de la tabla becarios de la BDD, los $datos recibidos desde el formulario.

            'id_becario' => $id    //se recibe como parámetro...

          ];

          if($this->usrModelo->borrarUsuario($datos)){    //Si se recibe 'true' del procedimiento actualizarUsuario, del modelo Usuario...

            redireccionar('/paginas');     

            }else{

              die('Algo salió mal');

            }
            
        }

        $this->vista('paginas/borrar', $datos);   //Se envían a la vista borrar (paginas/borrar.php), los datos recibidos desde el modelo Usuario (Usuario.php)...
     
      }
  }

?>