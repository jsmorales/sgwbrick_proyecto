
<?php
include_once '../DAO/UsuariosDAO.php';

/**
 * La clase UsuariosController maneja toda la parte de procesamiento de datos de usuarios
 *
 */
class UsuariosController {

    //ATRIBUTOS DE LA CLASE

    private $UsuariosDAO;
    
    //CONSTRUCTOR DE LA CLASE

    public function __construct() {
        $this->UsuariosDAO = new UsuariosDAO();
    }

    //MÉTODOS DE LA CLASE

    /**
     * Función para guardar o actualizar un usuario, simplemente se encarga de guardar o actualizar
     * en la base de datos los parámetros que lleguen del usuario
     * @param Array $arrayDatos
     * @return boolean
     */
    public function guardarUsuario($arrayDatos) {
       
    }
	
	/**
     * Función para obtener usuarios
     * @param Array $arrayDatos
     * @return boolean
     */
    public function getUsuarios() {
        return $this->UsuariosDAO->getUsuarios();
    }
	
	public static function AutenticarUsuario(){
	
		$Usr_Mail=$_POST['username'];
		$Usr_Clave=$_POST['password'];		
		
		//---------------------------------------------------------------------------------------
		if(($Usr_Mail=="irestrepo") && ($Usr_Clave=="12345")){
			
			//echo "<script language=javascript>top.location='/mapa-p'</script>";
			echo $Usr_Mail."--".$Usr_Clave;
		}else{
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		$matriz=UsuariosDAO::getUsuariosLogin($Usr_Mail,$Usr_Clave);
		//print_r($matriz);
		
		$id=$matriz[0]['pkID'];
		$nombre=$matriz[0]['nombres'];
		$tipo=$matriz[0]['tipo_id'];
		$nombre_tipo=$matriz[0]['tipo_usuario'];
		$estado=$matriz[0]['estado_id'];

		//echo "El estado del usuario es: ".$estado;

		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		if (($id!="") and ($nombre!="") and ($estado == 1) ){

			setcookie("log_usuario_id", $id, time() + 3600, "/");
			setcookie("log_usuario_nombre", $nombre, time() + 3600, "/");
			setcookie("log_usuario_tipo", $tipo, time() + 3600, "/");
			setcookie("log_usuario_tipo_nombre", $nombre_tipo, time() + 3600, "/");

			//echo "la cookie queda:".$id."-".$nombre."-".$tipo;

			//echo "nombre desde la cookie:".$_COOKIE["log_usuario_nombre"];

			echo '<script language="JavaScript">
					alert("Bienvenido '.$nombre.'");					
			</script>';

			echo "<script language=javascript> location.href='../Vistas/localidades.php' </script>";
				
		} else {
		
			echo '<script language="JavaScript">
					alert("Usuario o password incorrecto, en otro caso por favor verifique que su usuario este activo.");
					window.location = "javascript:history.back(-1)"
				</script>';
			}
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++		
		}
		//---------------------------------------------------------------------------------------
						
	}
    
}

?>
