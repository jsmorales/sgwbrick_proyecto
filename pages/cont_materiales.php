<?php 
	include("../controller/materialesController.php");

	$materiales = MaterialesController::getMateriales();
	//$materiales->getMateriales();
	//print_r($materiales);
 ?>
 <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Materiales</h1>
        		    <p>Esta es la página de materiales.</p>
        		    <!-- tabla de materiales -->
        		    <table id="tabla_materiales" class="table table-bordered table-hover table-striped">

                                <thead>
                                    <tr>
                                        <th>ID Material</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Marca</th>
                                        <th>Imagen</th>
                                        <th>Propiedades</th>										
										<th>Opciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                	<?php 

                                		if($materiales){
                                			for($a=0;$a<sizeof($materiales);$a++){
                                				$id = $materiales[$a]["pkID"];
                                				$nombre = $materiales[$a]["nombre"];
                                				$precio = $materiales[$a]["precio"];
                                				$marca = $materiales[$a]["marca"];
                                				$imagen = $materiales[$a]["imagen"];

                                				if ($imagen == NULL) {
                                					$imagen = "no_item.jpg";
                                				}

                                				$propiedades = MaterialesController::getMaterialPropiedades($id);

                                				//print_r($propiedades);

                                				echo '
                                                <tr>
                                                    <td>'.$id.'</td>
                                                    <td>'.$nombre.'</td>
                                                    <td>'.$precio.'</td>                                                    
                                                    <td>'.$marca.'</td>
                                                    <td><div class="img_alido_edit"><img src="subidas/'.$imagen.'" height="150"></div></td>
                                                    <td><ul class="list-group">';
                                                    /**/
                                                    if(sizeof($propiedades[0])>0){
                                                                for ($i=0; $i < sizeof($propiedades); $i++) {
                                                                  //print_r($entrega[$i]); 
                                                                  echo '                                                                  
                                                                    <li class="list-group-item"> <strong>'.$propiedades[$i]["nombre"].':</strong> '.$propiedades[$i]["valor"].' '.$propiedades[$i]["abreviatura"].'</li>                                                                  
                                                                    ';
                                                                };
                                                              }else{
                                                                  echo'<div class="alert alert-warning" role="alert">
                                                                  <p class="text-center"> No se han asignado propiedades a este material. </p>
                                                                  </div>';
                                                              };
                                                    echo '</ul></td>
                                                    <td><button id="btn_editar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#p00" data-id-material = "'.$id.'" ><span class="glyphicon glyphicon-pencil"></span>&nbspEditar</button></td>
                                                </tr>';
                                			};
                                		}else{

                                			echo "<tr>
		                                            <td></td>
		                                            <td></td>
		                                            <td></td>
		                                            <td></td>
		                                            <td></td>
		                                            <td></td>
		                                            <td></td>		                                            
		                                        </tr>
		                                        <h3>En este momento no hay Materiales creados.</h3>";

                                		};

                                	 ?>
                                </tbody>
                    </table>
        		    <!-- /tabla de materiales --> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
	</div>

<?php
 	include "footer.php";
?>
	<!-- plugin para paginar -->
    <script src="../js/plugins/DataTables/jquery.dataTables.min.js"></script>
    <script src="../js/plugins/DataTables/data_tabla.js"></script>

</body>

</html>