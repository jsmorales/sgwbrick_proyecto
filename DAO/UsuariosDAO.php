<?php

include_once 'GenericoDAO.php';

/**
 * Clase que maneja todas las consultas que tienen que ver con los usuarios
 */
class UsuariosDAO extends GenericoDAO{
 
    /**
     * Constructor de la clase
     */
    public function __construct() {
        parent::__construct();
    }

    public function getUsuarios(){        
       //$sql = <<<SQL SELECT * FROM usuarios SQL;
       //return GenericoDAO::EjecutarConsulta($sql);
    }
	
	 public static function getUsuariosLogin($p_usuario,$p_password){
        
   		$query = "select * from usuarios where alias='".$p_usuario."' and pass=SHA1('".$p_password."')";
   			
		$Conector = new Conexion();
		$db=$Conector->connect();		
		
		return GenericoDAO::EjecutarConsulta($query);
		
    }
	
}

?>
