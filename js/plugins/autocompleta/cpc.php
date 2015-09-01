<?php 


	function autocompleta($valor){
		include("include/conectar.php");
		$con= conexion::conectar();

		$pan = 100;

		//*********************************************************************
		$c_pais = "select distinct id,nombre,x,y from paises where nombre like '%$valor%' limit $pan";

	    $resultadop = $con->query($c_pais);

	    while($filap=$resultadop->fetch_assoc()){
	       $a_pais[] = array("id"=>$filap['id'],
				"label"=>html_entity_decode($filap['nombre']),
				"category"=>"País - Country",
				"cx"=>$filap['x'],
				"cy"=>$filap['y']
				);
	    }
	    //*********************************************************************

	    //*********************************************************************
	    $c_region="select distinct regiones.id,regiones.nombre as rnom,regiones.x,regiones.y,paises.nombre as pnom"
             ." from regiones"
             ." inner join paises on paises.id = regiones.id_pais"
             ." where regiones.nombre like '%$valor%' limit $pan";   
		
		$resultador = $con->query($c_region);

		while($filar=$resultador->fetch_assoc()){
	       $a_region[] = array("id"=>$filar['id'],
				"label"=>html_entity_decode($filar['rnom']."-".$filar['pnom']),
				"category"=>"Region - Estado - Departamento",
				"cx"=>$filar['x'],
				"cy"=>$filar['y']
				);
	    }
	    //*********************************************************************
	    $c_ciudad="select distinct localidades.id,localidades.nombre as nombreloc,regiones.nombre as nomreg,paises.nombre as nomp,localidades.x,localidades.y"
	    		  ." from localidades"
	    		  ." inner join paises on paises.id = localidades.id_pais"
	    		  ." inner join regiones on localidades.id_region = regiones.id"
	    		  ." where localidades.nombre like '%$valor%' limit $pan";

	    $resultadoc = $con->query($c_ciudad);

		while($filac=$resultadoc->fetch_assoc()){
	       $a_ciudad[] = array("id"=>$filac['id'],
				"label"=>html_entity_decode($filac['nombreloc']."-".$filac['nomreg']."-".$filac['nomp']),
				"category"=>"ciudad - localidad",
				"cx"=>$filac['x'],
				"cy"=>$filac['y']
				);
	    }

		//=====================================================================
	    $r1=count($a_pais);

	    $r2=count($a_region);

	    $r3 = count($a_ciudad);


	    if($r1>0 and $r2>0 and $r3>0){
	    	$datos = array_merge($a_pais, $a_region, $a_ciudad);
	    }

	    elseif ($r1>0 and $r2>0 and $r3==0) {
	    	$datos = array_merge($a_pais,$a_region);
	    }

	    elseif ($r1>0 and $r2==0 and $r3>0) {
	    	$datos = array_merge($a_pais, $a_ciudad);
	    }

	    elseif ($r1==0 and $r2>0 and $r3>0) {
	    	$datos = array_merge($a_region, $a_ciudad);
	    }

	    elseif ($r1>0 and $r2==0 and $r3==0) {
	    	$datos = array_merge($a_pais);
	    }

	    elseif ($r1==0 and $r2>0 and $r3==0) {
	    	$datos = array_merge($a_region);
	    }

	    elseif ($r1==0 and $r2==0 and $r3>0) {
	    	$datos = array_merge($a_ciudad);
	    }

	    else{
	    	$datos[] = array(

	    			 "label"=>"No hay coincidencias.",
	    			 "category"=>"- - -"	
	    		);
	    }

		return $datos;
	}

	echo json_encode(autocompleta($_GET['term']));
	
 ?>