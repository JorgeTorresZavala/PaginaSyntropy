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

    //Atributos
    protected $controladorActual = 'paginas';   //Toma este controlador por defecto, si no hay nada en la URL
    protected $metodoActual = 'index';    //Toma éste método, si no hay en la URL
    protected $parametros = [];    //Arreglo vacío, si no hay parámetros en la URL

    //Método: Constructor
    public function __construct(){
      //print_r($this->getURL()); //Punto de prueba. Ejecuta el método getURL, e imprime el valor de la URL en modo arreglo.
      $url = $this->getURL();   //Ejecuta el método getURL y guarda en la variable $url, la URL indexada.
      //echo 'Esto es la URL que llega: ' . print_r($url); //Punto de prueba.
      //print_r($url);  //Punto de prueba. Imprime el valor de la URL en modo arreglo.
      
      if (isset($url[0])) {

        //1.- Controlador[0]. Busca en la carpeta controladores, si el archivo/controlador existe. 
        if(file_exists('../app/controladores/' . ucwords($url[0]) . '.php')){   //Si existe el controlador, se setea como controlador por defecto
          $this->controladorActual = ucwords($url[0]);

          //echo $this->controladorActual;  //Punto de prueba. Se identifica el controlador.

          //Se elimina la variable del índice 0 (el controlador paginas)
          unset($url[0]);
        } 
        
        //Requerir el controlador [0], escrito en el navegador
        require_once '../app/controladores/' . $this->controladorActual . '.php';
        $this->controladorActual = new $this->controladorActual;

        //2.- Método[1]. Segundo dato de la URL.
        if(isset($url[1])){ 
          if(method_exists($this->controladorActual,$url[1])){ //Si existe el método...
            $this->metodoActual = $url[1];  //Actualiza el método
          
            //Se restablece el método
            unset($url[1]);
          }
        }
        
        //echo $this->metodoActual; //Punto de prueba. Se identifica el método.

        //3.- Parámetros[2]. Tercer dato de la URL.
        $this->parametros = $url ? array_values($url) : []; // Operador terniario

        //Llamar callback de la URL, con parámetros tipo array
        call_user_func_array([$this->controladorActual,$this->metodoActual],$this->parametros);

      }

      else {  //Si no se escribe nada de URL en el navegador...
      
        require_once '../app/controladores/Paginas.php';
        $nvoIndex = new Paginas();  //Objeto $nvoIndex, instancia de la clase Paginas
        $nvoIndex->index();   //Invoca el método index, de la clase Paginas

      }

    }

    //Método: obtener la URL
    public function getURL(){
    //echo $_GET['url'];  //Punto de prueba. Imprime la URL
    
      if(isset($_GET['url'])){  //Si se escribe algo en el navegador
          $url = rtrim($_GET['url'],'/'); //Elimina espacios en blanco despues de la diagonal
          $url = filter_var($url,FILTER_SANITIZE_URL);  //Elimina caracteres ilegales de la URL
          $url = explode('/', $url);  //Divide la variable en un arreglo
          //echo 'Esto es la URL: ' . print_r($url);
          return $url;  //Devuelve el valor de la $url en forma de arreglo
      }      
    }     
  }


?>