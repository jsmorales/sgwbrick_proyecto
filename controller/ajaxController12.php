<?php 
	
	header('content-type: aplication/json; charset=utf-8');//header para json	
	

	include('../DAO/GenericoDAO.php');

	include('../DAO/MaterialesDAO.php');
	

 	$accion= isset($_GET['tipo'])?$_GET['tipo']:"x";

 	$r = array();

 	class crea_sql{

 		function crea_select($array_campos){
 			
 			//-----------------------------------------------------------
 			//toma el nombre de la tabla
 			$nom_tabla = $array_campos['nom_tabla'];
 			//-----------------------------------------------------------
 			//retira el campo tipo y nom_tabla de $array_campos
 			unset($array_campos['tipo']);
 			unset($array_campos['nom_tabla']);

 			// construye query...
		    $sql  = "select * from `".$nom_tabla."` where pkID = ".$array_campos['pkID'];
 			//-----------------------------------------------------------

 			return $sql;
 		}

 		function crea_insert($array_campos){
 			
 			//-----------------------------------------------------------
 			//toma el nombre de la tabla
 			$nom_tabla = $array_campos['nom_tabla'];
 			//-----------------------------------------------------------
 			//retira el campo tipo y nom_tabla de $array_campos
 			unset($array_campos['tipo']);
 			unset($array_campos['nom_tabla']);
 			//setea pkID a null ya que es autonumerico puede que esto sea condicional a futuro
 			$array_campos['pkID'] = "NULL";
 			//-----------------------------------------------------------
 			// construye query...
		    $sql  = "insert INTO `".$nom_tabla."`";

		    // implode keys of $array...
		    $sql .= " (`".implode("`, `", array_keys($array_campos))."`)";

		    // implode values of $array...
		    $sql .= " VALUES ('".implode("', '", $array_campos)."') ";
		    //-----------------------------------------------------------
		    return $sql;
 		} 		

 		function crea_update($array_campos){
 			
 			//-----------------------------------------------------------
 			//toma el nombre de la tabla
 			$nom_tabla = $array_campos['nom_tabla'];
 			//-----------------------------------------------------------
 			//retira el campo tipo y nom_tabla de $array_campos
 			unset($array_campos['tipo']);
 			unset($array_campos['nom_tabla']);
 			//-----------------------------------------------------------

 			foreach($array_campos as $field_name => $field_value) {
			   $sql_str[] = "{$field_name} = '{$field_value}'";
			}

 			$sql = "update `".$nom_tabla."` SET ";

 			$sql .= implode(',', $sql_str);

 			$sql .= " where pkID = ".$array_campos["pkID"];

 			return $sql;
 		}

 		function crea_delete($array_campos){
 			
 			//-----------------------------------------------------------
 			//toma el nombre de la tabla
 			$nom_tabla = $array_campos['nom_tabla'];
 			//-----------------------------------------------------------
 			//retira el campo tipo y nom_tabla de $array_campos
 			unset($array_campos['tipo']);
 			unset($array_campos['nom_tabla']);

 			// construye query...
		    $sql  = "delete FROM `".$nom_tabla."` where pkID = ".$array_campos['pkID'];
 			//-----------------------------------------------------------

 			return $sql;
 		}
 	}

 	$crea_sql = new crea_sql();

 	

 	switch ($accion) { 		
 		
		//----------------------------------------------------------------------------------------------------
	 	case 'inserta':

	 		$materiales = new materiales();

	 		$query = $crea_sql->crea_insert($_GET);	 		

	 		$resultado = $materiales->insertaMateriales($query);

	 		/**/
	 		if($resultado){
	 			
	 			$r[] = $resultado;
	 			$r["sentencia"] = $query;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No se inserto.";
	 		} 		

	 		//

	 	break;
		//----------------------------------------------------------------------------------------------------

	 	//----------------------------------------------------------------------------------------------------
	 	case 'actualiza':

	 		$general = new GenericoDAO();

	 		$query = $crea_sql->crea_update($_GET);	 		

	 		$resultado = $general->EjecutaActualizar($query);

	 		/**/
	 		if($resultado){
	 			
	 			$r[] = $resultado;
	 			$r["sentencia"] = $query;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No se Actualizó.";
	 		} 

	 		//$r[] = $query;		

	 		//

	 	break;
		//----------------------------------------------------------------------------------------------------

	 	//----------------------------------------------------------------------------------------------------
	 	case 'ver':

	 		$materiales = new materiales();

	 		$query = $crea_sql->crea_select($_GET);	 		

	 		$resultado = $materiales->getMaterialId($query);

	 		/**/
	 		if($resultado){
	 			
	 			$r[] = $resultado;
	 			$r["sentencia"] = $query;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No se encontro.";
	 		} 

	 		//$r[] = $query;		

	 		//

	 	break;
		//----------------------------------------------------------------------------------------------------

	 	//----------------------------------------------------------------------------------------------------
	 	case 'elimina':

	 		$general = new GenericoDAO();

	 		$query = $crea_sql->crea_delete($_GET); 		

	 		$resultado = $general->EjecutaEliminar($query);

	 		/**/
	 		if($resultado){
	 			
	 			$r[] = $resultado;
	 			$r["sentencia"] = $query;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No se eliminó.";
	 		} 

	 		//$r[] = $query;		

	 		//

	 	break;
		//----------------------------------------------------------------------------------------------------


		//----------------------------------------------------------------------------------------------------
	 	case 'ver_propiedades':

	 		$materiales = new materiales();	 			 		 	

	 		$resultado = $materiales->getMaterialPropiedades($_GET['id_material']);
	 		/*----------------------------------------------------*/
	 		if($resultado){
	 			
	 			$r["estado"] = "Ok";
 				$r["mensaje"] = $resultado;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No hay resultados.";
	 		}

	 	break;
		//----------------------------------------------------------------------------------------------------


 	}
 	//--------------------------------------------------------------------------------------------------------

	echo json_encode($r); //imprime el json

 ?>