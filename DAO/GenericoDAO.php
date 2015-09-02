<?php
/**
 * Description of GenericoDAO
 * Todos los demás DAO deben heredar esta clase 
 * @author Ing Ricardo Umbarila Torres
 */

include_once '../Conexion/Conexion.php';


class GenericoDAO {
    
   /**
     * El conector de la base de datos
     * @var Conexion
     */
   protected $Conector;
   private $r;
   
     
   public function __construct() {
        $this->Conector = new Conexion();
        $this->r = array();
    }
     
    /**
     *Retorna un Array a partir  de la consulta 
     * @param type String $query 
     * @return Array -> Un array con los datos de la consulta
     */
    public static function EjecutarConsulta($query){
      
		  // $db=$Conector->connect();
		$Conector = new Conexion();
		$db=$Conector->connect();
       if(!$result = $db->query($query)){
			die('There was an error running the query [' . $db->error . ']');
		}
		if ($result->num_rows >0){
			while ($fila = $result->fetch_assoc()){
				$retorno[] = $fila;
			}
			return $retorno;
		} else {
			return false;
		}
		$result->free();
	}
	//------------------------------------------------------------------------
		public function EjecutaInsertar($query){

			 // $db=$Conector->connect();
			$Conector = new Conexion();
			$db=$Conector->connect();

		       if(!$result = $db->query($query)){
					die('There was an error running the query [' . $db->error . ']');
				}

				else{
					$this->r["estado"] = "ok";
					$this->r["mensaje"] = "Insertado correctamente.";

					return $this->r;
				}
		}
	//------------------------------------------------------------------------	
		public function EjecutaActualizar($query){

			 // $db=$Conector->connect();
			$Conector = new Conexion();
			$db=$Conector->connect();

		       if(!$result = $db->query($query)){
					die('There was an error running the query [' . $db->error . ']');
				}

				else{
					$this->r["estado"] = "ok";
					$this->r["mensaje"] = "Actualizado correctamente.";

					return $this->r;
				}
		}
	//------------------------------------------------------------------------
	//------------------------------------------------------------------------

		public function EjecutaEliminar($query){

			 // $db=$Conector->connect();
			$Conector = new Conexion();
			$db=$Conector->connect();

		       if(!$result = $db->query($query)){
					die('There was an error running the query [' . $db->error . ']');
				}

				else{
					$this->r["estado"] = "ok";
					$this->r["mensaje"] = "Eliminado correctamente.";

					return $this->r;
				}
		}
	//------------------------------------------------------------------------
   
}

?>
