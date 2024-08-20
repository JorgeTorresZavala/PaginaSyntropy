<?php

  //Clase para conectarse a la BDD y ejecutar consultas PDO (PHP Data Object)
 
  class Base{
    
    //Propiedades:
    private $host = DB_HOST;
    private $usuario = DB_USUARIO;
    private $password = DB_PASSWORD;
    private $nombreBase = DB_NOMBRE;

    private $dbh;   //data base handler
    private $stmt;  //statement
    private $error; 

    //Método: constructor
    public function __construct(){
      //Configurar conexion $dsn (data source name)
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->nombreBase;
      $opciones = array(  //Opciones para la conexión a la BDD
        PDO::ATTR_PERSISTENT =>true,  //Request a persistent connection, rather than creating a new connection
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Throw a PDOException if an error occurs
      );

      //Crear una instancia de PDO
      try{
        $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
        $this->dbh->exec('set names utf8');   //Acepta caracteres especiales en español
        //echo 'Conexión OK.';  //Punto de prueba...conexión a la BDD

        //Captura de errores.
      } catch (PDOException $e){

        die('Error: ' . $e->getMessage());

        //$this->error = $e->getMessage();
        //echo $this->error;  //Punto de prueba...muestra el tipo de error
        
        //Libera la BDD de la memoria
      } finally{

        $db = null;
      }

    }

    //Preparamos la consulta.
    public function query($sql){

      $this->stmt = $this->dbh->prepare($sql);  //Se guarda en la variable stmt la consulta
    
    }

    //Vinculamos la consulta con bind
    public function bind($parametro, $valor, $tipo = null){

      if(is_null($tipo)){

        switch (true){

          case is_int($valor):
            $tipo = PDO::PARAM_INT;
            break;

          case is_bool($valor):
            $tipo = PDO::PARAM_BOOL;
          break;

          case is_null($valor):
            $tipo = PDO::PARAM_NULL;
          break;
          
          default:
            $tipo = PDO::PARAM_STR;
          break;

        }

      }

      $this->stmt->bindValue($parametro, $valor, $tipo);  //Vincula un valor a la variable stmt

    }

    //Ejecuta la consulta
    public function execute(){

      return $this->stmt->execute();

    }

    //Obtener los registros
    public function registros(){

      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);

    }

    
    //Obtener un sólo registro
    public function registro(){

      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);

    }

    //Obtener cantidad de filas con el método rowCount
    public function rowCount(){

      return $this->stmt->rowCount();
      
    }
    
  }
?>