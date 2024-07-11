<?php 

    class Usuario{

        //Propiedades:
        private $db;    //Data Base

        //Método constructor:
        public function __construct(){

            $this->db = new Base;   //Objeto $db,  instancia de la clase Base
            
        }

        //Método obtenerUsuarios:
        public function obtenerUsuarios(){
        
            $this->db->query('SELECT * FROM becarios');
            $resultados = $this->db->registros();
            return $resultados;
        }

    }
?>