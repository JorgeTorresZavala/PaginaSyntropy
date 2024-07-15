<?php 

	//Clase: Usuario.
	//Se instancia desde el método constructor de la clase 'Paginas'
	class Usuario{

		//Propiedades:
		private $db;    //Data Base

		//Método: constructor.
		public function __construct(){

				$this->db = new Base;   //Objeto $db,  instancia de la clase Base
				
		}

		//Método: Obtener Usuarios. 
		public function obtenerUsuarios(){	//Datos desde la tabla becarios de la BDD,.
		
				$this->db->query('SELECT * FROM becarios');
				$resultados = $this->db->registros();
				return $resultados;
		}

		//Método: Agregar Usuario
		public function agregarUsuario($datos){

			$this->db->query('INSERT INTO becarios (nombre, apellido1, apellido2, correo, celular) VALUES(:nombre, :apellido1, :apellido2, :correo, :celular)');

			//Se vinculan valores
			$this->db->bind(':nombre', $datos['nombre']);
			$this->db->bind(':apellido1', $datos['apellido1']);
			$this->db->bind(':apellido2', $datos['apellido2']);
			$this->db->bind(':correo', $datos['correo']);
			$this->db->bind(':celular', $datos['celular']);

				//Ejecutar la consulta
				if($this->db->execute()){

					return true;

				}else{

					return false;

				}
		}

		//Método: Obtener Usuario
		//Ésta solicitud viene desde el controlador Paginas (Paginas.php)...
		public function obtenerUsuarioId($id){

			$this->db->query('SELECT * FROM becarios WHERE id_becario = :id');

			//Se vinculan valores
			$this->db->bind(':id', $id);
			$fila = $this->db->registro();
			return $fila;

		}

		public function actualizarUsuario($datos){

			$this->db->query('UPDATE becarios SET nombre = :nombre, apellido1 = :apellido1, apellido2 = :apellido2, correo = :correo, celular = :celular WHERE id_becario = :id');

			//Vincular valores
			$this->db->bind(':id', $datos['id_becario']);
			$this->db->bind(':nombre', $datos['nombre']);
			$this->db->bind(':apellido1', $datos['apellido1']);
			$this->db->bind(':apellido2', $datos['apellido2']);
			$this->db->bind(':correo', $datos['correo']);
			$this->db->bind(':celular', $datos['celular']);

				//Ejecutar
				if($this->db->execute()){

					return true;

				}else{
					
					return false;
					
				}

		}


		public function borrarUsuario($datos){

			$this->db->query('DELETE FROM becarios WHERE id_becario = :id');

			//Vincular valores
			$this->db->bind(':id', $datos['id_becario']);
			
				//Ejecutar
				if($this->db->execute()){

					return true;

				}else{
					
					return false;
					
				}

		}


	}


?>