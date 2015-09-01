<?php 
	include("../controller/materialesController.php");

	$materiales = MaterialesController::getMateriales();
	//$materiales->getMateriales();
	//print_r($materiales);
 ?>
 <!-- form modal -->
 <div class="modal fade bs-example-modal-lg" id="form_modal_materiales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="lbl_form_material">-</h4>
      </div>
      <div class="modal-body">
      	<!-- form modal contenido -->

        <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#materialTab" aria-controls="home" role="tab" data-toggle="tab">Material</a></li>
		    <li role="presentation"><a href="#propiedadesTab" aria-controls="profile" role="tab" data-toggle="tab">Propiedades</a></li>		    
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		  	<!-- 1 -->
		    <div role="tabpanel" class="tab-pane active" id="materialTab">
		    	<!-- formulario 1 materiales -->
		    	<form id="form_material" class="form-horizontal">
		    	<br>
		    		<div class="form-group" hidden>				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="pkID" name="pkID">
				    	</div>
				  	</div>
		    		<div class="form-group">
				    	<label for="nombre" class="col-sm-2 control-label">Nombre</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre específico del Material" required = "true">
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="precio" class="col-sm-2 control-label">Precio</label>
				    	<div class="col-sm-10">
				      		<div class="input-group">
						      <div class="input-group-addon">$</div>
						      <input type="number" class="form-control" id="precio" name="precio" placeholder="1000" required = "true">						      
						    </div>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="marca" class="col-sm-2 control-label">Marca</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del Material">
				    	</div>
				  	</div>
				  	<div class="form-group">
                        <label for="imagen_sube" class="col-sm-2 control-label">Imagen</label>
                        <input id="imagen_sube" type="file" name="imagen_sube">                        
                    </div>
                    <div class="form-group">                    
                        <input type="text" id="imagen" name="imagen" value="" class="form-control" required = "true">
                    </div>
		    	</form>
		    	<!-- /formulario 1 materiales -->
		    </div>
		    <!-- /1 -->
		    <!-- 2 -->
		    <div role="tabpanel" class="tab-pane" id="propiedadesTab">
		    ...
		    </div>
		    <!-- /2 -->		    
		  </div>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">        
        <button id="btn_actionMaterial" type="button" class="btn btn-primary" data-action="-">
        	<span id="lbl_btn_actionMaterial"></span>
        </button>
      </div>
    </div>
  </div>
</div>
 <!-- /form modal -->
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
        		    <button id="btn_nuevoMaterial" type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal_materiales"><span class="glyphicon glyphicon-plus"></span>&nbspCrear Material</button> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
	</div>

<?php
 	include "footer.php";
?>	
	<!-- plugin para validar -->
    <script src="../js/plugins/validav1/valida_p_v1.js"></script>
	<!-- plugin para paginar -->
    <script src="../js/plugins/DataTables/jquery.dataTables.min.js"></script>
    <script src="../js/plugins/DataTables/data_tabla.js"></script>

    <script src="../js/scripts_cont/cont_materiales.js"></script>

</body>

</html>