<?php 
	
	header('content-type: aplication/json; charset=utf-8');//header para json	
	
	include('../DAO/MaterialesDAO.php');

 	$accion= isset($_GET['tipo'])?$_GET['tipo']:"x";

 	$r = array();

 	switch ($accion) { 		
 		//----------------------------------------------------------------------------------------------------
	 	case 'inserta_material':

	 		$materiales = new materiales();

	 		$q_inserta = "insert INTO `material` (`pkID`, `nombre`, `precio`, `marca`, `imagen`, `fkID_clase`, `fkID_tipo`) 

	 		VALUES (NULL, '".$_GET['nombre']."', '".$_GET['precio']."', '".$_GET['marca']."', '".$_GET['imagen']."', NULL, NULL);";

	 		//echo $q_inserta;

	 		$resultado = $materiales->insertaMateriales($q_inserta);
	 		/**/
	 		if($resultado){
	 			
	 			$r[] = $resultado;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No se inserto.";
	 		}

	 	break;
		//----------------------------------------------------------------------------------------------------
 	}
 	//--------------------------------------------------------------------------------------------------------

	echo json_encode($r); //imprime el json

 ?>