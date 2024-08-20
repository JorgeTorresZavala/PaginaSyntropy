<?php
  /* Mapear la URL ingresada en el navegador:
  
  1.- Controlador.
  2.- Método.
  3.- Parámetro.

  Ejemplo:
  /articulos/actualizar/4

  Dónde:
  articulos->Controlador
  atualizar->Método
  4->Parámetro

  */

  class Core{

    //Atributos:
    protected $controladorActual = 'paginas';   //Si no existe el controlador, toma éste por defecto
    protected $metodoActual = 'index';    //Toma éste método, si no hay método en la URL
    protected $parametros = [];    //Arreglo vacío, si no hay parámetros en la URL
    
    //Método: Constructor
    public function __construct(){
      $url = $this->getURL();   //Ejecuta el método getURL. Devuelve el valor de la $url en forma de arreglo.
     
      //1.- Controlador[0].
      if (isset($url[0])) { //¿Se escribió (controlador) en la URL ?...Busca en la carpeta controladores

        if(file_exists('../app/controladores/' . ucwords($url[0]) . '.php')){   //¿Existe el controlador?...
          $this->controladorActual = ucwords($url[0]);    //Se setea como controlador, el dato recibido en la URL

          //Se elimina la variable del índice 0 (el controlador paginas)
          unset($url[0]);
        } 
        
        //Requerir el controlador [0], escrito en el navegador, si es que existe; sino, carga el controldor Paginas.
        require_once '../app/controladores/' . $this->controladorActual . '.php'; //Carga el controlador que se escribe en la URL
        $this->controladorActual = new $this->controladorActual;  //Se instancía la clase que se escribe en la URL

        //2.- Método[1]. Segundo dato de la URL.
        if(isset($url[1])){ 
          if(method_exists($this->controladorActual,$url[1])){ //Si existe el método...
            $this->metodoActual = $url[1];  //Actualiza el método
          
            //Se restablece el método
            unset($url[1]);
          }
        }
        
        //3.- Parámetros[2]. Tercer dato de la URL.
        $this->parametros = $url ? array_values($url) : []; // Operador terniario

        //Callback de la URL, con los 3 parámetros tipo array
        call_user_func_array([$this->controladorActual,$this->metodoActual],$this->parametros);

      }

      else {  //Si no se escribe nada de URL en el navegador...
      
        require_once '../app/controladores/Paginas.php';  //Carga el controlador Paginas (por defecto)
        $nvoPag = new Paginas();  //Objeto $nvoPag, instancia de la clase Paginas
        $nvoPag->index();         //Invoca/Ejecuta (->) el método index del Objeto $nvoPag. 

      }

    }

    //Método: obtener la URL
    public function getURL(){
    
      if(isset($_GET['url'])){  //Registra lo que exista en el navegador, aún si está vacío
          $url = rtrim($_GET['url'],'/'); //Elimina espacios en blanco despues de la diagonal
          $url = filter_var($url,FILTER_SANITIZE_URL);  //Elimina caracteres ilegales de la URL
          $url = explode('/', $url);  //Divide la variable en un arreglo
          
          return $url;  //Devuelve el valor de la $url en forma de arreglo
      }
    }     
  }

?>