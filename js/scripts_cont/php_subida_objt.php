<?php 

	class sube_imagen {

		//propiedades de la clase
		//--------------------
		public $archivo = "";
		//--------------------
		public $nombre = "";
		public $tipo = ""; 
		public $ruta_temporal = "";
		public $tamano = ""; 
		public $dimensiones = "";
		public $alto = ""; 
		public $ancho = "";
		//-------------------- 
		public $origen = ""; 
		public $destino = "";
		//--------------------

		//funciones de la clase

		//-------------------------------------------
		//asigna las variables

		public function __construct($archivo,$destino) {
              $this->archivo = $archivo;
              $this->destino = $destino;              
        }

        //función de subida
        public function subir(){
        	//$this->nombre = $this->archivo["name"];

        	$this->asigna_val();

        	$ejecucion = $this->mover_server();

        	if($ejecucion == "ok"){

        		$mensaje = array('nombre' => $this->nombre,
                                 'estado' => "Archivo ". $this->nombre ." subido con éxito.",
                                 'src' => 'subidas/'.$this->nombre
                            );
        		
        	}else{
        		$mensaje = array('nombre' => $this->nombre,
                                 'estado' => "Archivo ". $this->nombre ." no pudo ser movido al server."
                            );
        		
        	}        	

        	return $mensaje;
        }
        //--------------------------------------------------------------------------------------------------

        //funciones principales

		//-------------------------------------------
		//validar el archivo y asignar variables

        private function asigna_val(){
        	//asigna variables del archivo
        	$this->nombre = $this->archivo["name"];
        	$this->tipo = $this->archivo["type"];
        	$this->ruta_temporal = $this->archivo["tmp_name"];
        	$this->tamano = $this->archivo["size"];
        	$this->dimensiones = getimagesize($this->ruta_temporal);
        	$this->alto = $this->dimensiones[1];
        	$this->ancho = $this->dimensiones[0];

        	$this->origen = $this->ruta_temporal;
        	$this->destino = $this->destino.$this->nombre;


        }
		//-------------------------------------------

		//-------------------------------------------
		//validar que el archivo sea una imagen menor de 1MB
        private function valida_image(){

        	if ($this->tipo != "image/jpg" && $this->tipo != "image/png" && $this->tipo != "image/jpeg" && $this->tipo != "image/gif")
		    {
		      //retorna mensaje de error
		      //echo"ERROR!!!!...El tipo de archivo no es una imagen.";
		    	return false;

		    }else if($this->tamano > 1024*1024)#si es mayor que una mega 1MB
		    {
		      //retorna mensaje de error
		      //echo"ERROR!!!!...El tamaño del archivo es mayor a 1MB.";
		    	return false;
		    }else{
		    	return true;
		    }
        }
		//------------------------------------------- 

		//-------------------------------------------
		//funcion para mover el archivo
		private function mover_server(){

			$valida = $this->valida_image();

			if($valida == true){

				move_uploaded_file($this->origen, $this->destino);
				
				return "ok";

			}else{

				return $valida;
			}

			
		}
		//------------------------------------------- 

	}

	

 ?>