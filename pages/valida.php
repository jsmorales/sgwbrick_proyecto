<?php 
	
	//-----------------
	//error_reporting(0);
	//-----------------

	class valida {

		//---------------------------------------------------------
	    //variables de sesion
	    public $id;
	    public $nombre;
	    public $tipo;
	    //-----------------------------------------
	  
	    //-----------------------------------------
	    //funciones
	    public function asigna_vals(){
	        $this->id = $_COOKIE["log_brick_id"];
	        $this->nombre = $_COOKIE["log_brick_nombre"];
	        $this->tipo = $_COOKIE["log_brick_tipo"];
	    }

	    public function valida_vals(){

	    	$this->asigna_vals();

	        if($this->id == "" || $this->nombre == "" || $this->tipo == ""){
	            //echo '<script language="JavaScript"> alert("Usuario no identificado, por favor identifíquese."); window.location = "index.php"; </script>';
	            return false;
	        }else{
	            
	            //$this->mostrar_pagina($_GET["pagina"]);
	            return true;
	        }
	    }

	    public function mensaje_error(){

	    	echo '<script language="JavaScript"> alert("Usuario no identificado, por favor identifíquese."); window.location = "login.php"; </script>';

	    }

	    //-----------------------------------------
	}

 ?>