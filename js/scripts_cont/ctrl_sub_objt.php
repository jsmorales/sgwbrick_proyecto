<?php

	header('Content-type: application/json');
	

	include("php_subida_objt.php");

	$va_para = '/var/www/html/sgwbrick_proyecto/pages/subidas/';

	$subida = new sube_imagen($_FILES["imagen_sube"],$va_para);

	//$subida->asigna_val();

	//print_r($subida->subir());

	json_encode($respuesta = $subida->subir());

	//$respuesta = $subida->subir();
	//echo "<img src='".$respuesta["src"]."'>"; 

 ?>