$(function(){
	//console.log('hola desde cont materiales.');

	//---------------------------------------------------------
	//variable para el objeto del formulario
	var objt_f_material = {};
	//variable de accion del boton del formulario
	var action = "";
	  //variable para el id del registro
	var id_material = "";	
	//---------------------------------------------------------

	//---------------------------------------------------------
	//funciones

	function valida_action(action){

  		if(action==="crear"){
    		crea_material();
    		//subida_foto();
  		}else if(action==="editar"){
    		//edita_material();
  		};
	};

    //-------------------------------------------------------------------------------------------
    function subida_foto(){

           //---------------------------------------------------------------------------------------
           //CREA UNA VARIABLE  DE TIPO FormData que toma el formulario
           var formData = new FormData($("#form_material")[0]);
           //la ruta del php que ejecuta ajax
           var ruta = "../subida_imagen/ctrl_sub_objt.php";


           //hacemos la petición ajax
            $.ajax({
                url: ruta,
                type: 'POST',
                // Form data
                //datos del formulario
                data: formData,
                //necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
                //mientras enviamos el archivo
                beforeSend: function(){
                    console.log("Subiendo la imagen, por favor espere...");
                },
                //una vez finalizado correctamente
                success: function(data){
                  console.log(data);

                },
                //si ha ocurrido un error
                error: function(){
                    console.log("Ha ocurrido un error.");


                }
            });
		//---------------------------------------------------------------------------------------
    };//cierra función subida

    function crea_material(){

      //--------------------------------------
      //crea el objeto formulario serializado
      objt_f_material = $("#form_material").valida();
      console.log(objt_f_material);
      //console.log(objt_f_adminPublicidad.srlz);
      //--------------------------------------
      /**/
      if(objt_f_material.estado = true){

        $.ajax({
          url: "../controller/ajaxController.php",
          data: objt_f_material.srlz+"&tipo=inserta_material",
        })
        .done(function(data) {
          
          subida_foto();

          alert(data[0].mensaje);
          location.reload();
          //console.log();
        })
        .fail(function(data) {
          console.log("error");
          alert(data[0].mensaje);
          location.reload();
        })
        .always(function() {
          console.log("complete");
        });

      }else{
        alert("El formulario no está totalmente diligenciado, revíselo e inténtelo de nuevo.");
      };

    };
  //cierra crea

	//---------------------------------------------------------

	//---------------------------------------------------------
	//ejecución
	//-------------------------------------------------------------------------------
	$("[name='imagen_sube']").change(function()
          {
              //obtenemos un array con los datos del archivo
              var file = $("[name='imagen_sube']")[0].files[0];
              //obtenemos el nombre del archivo
              var fileName = file.name;
              //obtenemos la extensión del archivo
              fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
              //obtenemos el tamaño del archivo
              var fileSize = file.size;
              //obtenemos el tipo de archivo image/png ejemplo
              var fileType = file.type;
              //mensaje con la información del archivo
              //$("#respuesta").html("<span>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
              $("#imagen").val(fileName);
              console.log("Archivo para subir: "+fileName+", peso total: "+fileSize);
          });
	//-------------------------------------------------------------------------------
	/*
	Botón que carga el formulario para insertar
	*/
	$("#btn_nuevoMaterial").click(function(){

	  	$("#lbl_form_material").html("Nuevo Registro Material");
	  	$("#lbl_btn_actionMaterial").html("continuar <span class='glyphicon glyphicon-chevron-right'></span>");
	  	$("#btn_actionMaterial").attr("data-action","crear");

	  	$("#form_material")[0].reset();

	});

	/*
	Botón de accion de formulario
	*/
	$("#btn_actionMaterial").click(function(){

	  	action = $(this).attr("data-action");

	  	valida_action(action);

	  	console.log("accion a ejecutar: "+action);

	});
	//---------------------------------------------------------
});