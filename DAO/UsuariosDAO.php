<?php


include_once 'GenericoDAO.php';

/**
 * Clase que maneja todas las consultas que tienen que ver con los usuarios
 *
 * @author Ing Ricardo Umbarila Torres
 */
class UsuariosDAO extends GenericoDAO{
 
    /**
     * Constructor de la clase
     */
    public function __construct() {
        parent::__construct();
    }

        
    
    public function getUsuarios(){
        
       $sql = <<<SQL
    SELECT *
    FROM usuarios
    
SQL;
     return GenericoDAO::EjecutarConsulta($sql);
    }
	
	 public static function getUsuariosLogin($p_usuario,$p_password){
        
/*		
		   $query = <<<SQL
		select pkID,nombres,tipo_id  from usuarios where usuario=? and password=SHA1(?) and estado_id=1
		
SQL;
*/
   $query = "select *

   			from usuarios 
			
   			where alias='".$p_usuario."' and pass=".$p_password;
   			//bitacora del capitan = usar sha1 para encriptar la pass.
		$Conector = new Conexion();
		$db=$Conector->connect();
		//$statement = $db->prepare($query);
		
		//echo $usuario=$p_usuario;
		//echo $password=$p_password;
		//$statement->bind_param("ss", $usuario,$password);
		//$statement->get_result($query, $p_usuario,$p_password);
		//$statement->execute();
		//$statement->store_result();
		//$statement->bind_result($returned_id,$returned_nombre,$returned_tipo_id);
		//echo $returned_id;
		
		return GenericoDAO::EjecutarConsulta($query);
		//exit;
		//$statement->free_result();
		//$matriz[0]=$returned_id;
		//$matriz[1]=$returned_nombre;
		//$matriz[2]=$returned_tipo_id;
		// return $matriz;
    }
	
}
?>
