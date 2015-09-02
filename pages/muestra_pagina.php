<?php 

//-----------------------------------------------------------
//error_reporting(0);
//-----------------------------------------------------------

include("valida.php");


    class mostrar extends valida {

        //---------------------------------------------------------------
        public function mostrar_pagina($pagina){

            $valores_login = $this->valida_vals();

            if($valores_login == true){

                //-----------------------------------------------------------
                include "encabezado.php";
				include "menu_superior.php";
				include "menu_lateral.php";
                //-----------------------------------------------------------                

                //-----------------------------------------------------------
                //contenido
                include $pagina;
                //-----------------------------------------------------------

            }else{

                 $this->mensaje_error();
            }
            
        }
        //-----------------------------------------      
    }

 ?>