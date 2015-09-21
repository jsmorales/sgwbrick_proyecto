$(function(){
	//console.log('hola desde cont materiales.');

	//---------------------------------------------------------
	//variable para el objeto del formulario
	var objt_f_material = {};
	//variable de accion del boton del formulario
	var action = "";
	  //variable para el id del registro
	var id_material = "";

  var id_propiedad_select = "";
  var id_valor_select = "";
  var id_umedida_select = "";	
	//---------------------------------------------------------

	//---------------------------------------------------------
	//funciones

	function valida_action(action){

  		if(action==="crear"){
    		crea();
    		//subida_foto();
  		}else if(action==="editar"){
    		edita();
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

    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    function crea(){
      //--------------------------------------
      //crea el objeto formulario serializado
      objt_f_material = $("#form_material").valida();
      console.log(objt_f_material);
      //console.log(objt_f_adminPublicidad.srlz);
      //--------------------------------------
      /**/
      if(objt_f_material.estado == true){

        $.ajax({
          url: "../controller/ajaxController12.php",
          data: objt_f_material.srlz+"&tipo=inserta&nom_tabla=material",
        })
        .done(function(data) {
          //---------------------
          subida_foto();
          //---------------------
          console.log(data);
          alert(data[0].mensaje);
          location.reload();          
        })
        .fail(function(data) {
          console.log(data);
          //alert(data[0].mensaje);          
        })
        .always(function() {
          console.log("complete");
        });

      }else{
        alert("El formulario no está totalmente diligenciado, revíselo e inténtelo de nuevo.");
      };
    }
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    

  function carga_material(id_material){

    console.log("Carga el material "+id_material);

    $.ajax({
        url: '../controller/ajaxController12.php',
        data: "pkID="+id_material+"&tipo=ver&nom_tabla=material",
    })
    .done(function(data) {

      //console.log(data[0][0]);

        /**/
        $.each(data[0][0], function( key, value ) {
          console.log(key+"--"+value);
          $("#"+key).val(value);
        }); 

    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

  };
  //cierra carga_material

  
  function edita(){
    //--------------------------------------
    //crea el objeto formulario serializado
    objt_f_material = $("#form_material").valida();
    //--------------------------------------

    if(objt_f_material.estado == true){

        console.log(objt_f_material.srlz);

        $.ajax({
            url: '../controller/ajaxController12.php',
            data: objt_f_material.srlz+"&tipo=actualiza&nom_tabla=material",
        })
        .done(function(data) {
            //---------------------
            subida_foto();
            //---------------------
            //console.log(data);
            console.log(data[0].mensaje);
            alert(data[0].mensaje);
            location.reload();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

    }else{
        alert("Faltan "+Object.keys(objt_f_evento.objt).length+" campos por llenar.");
    }
    //------------------------------------------------------
  }
  //cierra funcion edita

  function elimina(id_material){
    var confirma = confirm("Quiere eliminar este elemento?");

    if(confirma == true){

      $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID="+id_material+"&tipo=elimina&nom_tabla=material",
        })
        .done(function(data) {
            //---------------------
            //console.log(data);
            console.log(data[0].mensaje);
            alert(data[0].mensaje);
            location.reload();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }

  }

  function agrega_propiedad(){

    id_propiedad_select = $("#fkID_propiedad").val();
    id_valor_select = $("#valor").val();
    id_umedida_select = $("#fkID_uMedida").val();

    var c_inserta_propiedad = "fkID_material="+$("#pkID").val()+"&fkID_propiedad="+id_propiedad_select+"&valor="+id_valor_select+"&fkID_uMedida="+id_uMedida_select;

    $.ajax({
      url: "../controller/ajaxController12.php",
      data: c_inserta_propiedad+"&tipo=inserta&nom_tabla=material_propiedad",
    })
    .done(function(data) {
      console.log(data);

      carga_propiedades($("#pkID").val());

      $("#listaPropiedades").fadeOut(800);

      $("#listaPropiedades").fadeIn().delay(2000);

      //-----------------------------------------------------
      //funcion de quitar propiedad
      quita_propiedad();
      //-----------------------------------------------------

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });


  };//cierra la funcion

  function carga_propiedades(id_material){

    //console.log("Carga el material "+id_material);

    $.ajax({
        url: '../controller/ajaxController12.php',
        data: "id_material="+id_material+"&tipo=ver_propiedades",
    })
    .done(function(data) {
        console.log(data);
        //..................................................................
        //limpia la lista dentro del dom
        $("#listaPropiedades").html("");
        //crea la lista de los aliados relacionados
        $.each(data.mensaje,function(index, valor) {
          console.log(valor.nombre);          
          /**/
          $("#listaPropiedades").append(
            "<li class='list-group-item'> "+valor.nombre+" "+valor.valor+" "+valor.abreviatura+" <a id='propiedad"+valor.pkID+"' data-id-propiedad='"+valor.pkID+"' data-id-material='"+$("#pkID").val()+"' class='cursor_pointer'><span class='glyphicon glyphicon-remove'></span>&nbspQuitar</a> "+"</li>"
            //"<li class='list-group-item'>"+valor.nombre+" "+valor.valor+" "+valor.abreviatura+"</li>"
          );
        });
        //..................................................................
        //funcion para quitar la propiedad
        quita_propiedad();
        //..................................................................

    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

  };
  //cierra carga_propiedad

  function quita_propiedad(){
/**/
    $("a[id*='propiedad']").click(function(){

      var id_propiedad_p = $(this).attr("data-id-propiedad");

      $.ajax({
        url: "../controller/ajaxController12.php",
        data: "pkID="+id_propiedad_p+"&tipo=elimina&nom_tabla=material_propiedad"
      })
      .done(function(data) {

        console.log(data);

        carga_propiedades($("#pkID").val());

      $("#listaPropiedades").fadeOut(800);

      $("#listaPropiedades").fadeIn().delay(2000);

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

      return false;

    });
  };//cierra la funcion quita

	//---------------------------------------------------------

	//---------------------------------------------------------
	//ejecución
	//-------------------------------------------------------------------------------

  //--------------------------------------------
  $('#fkID_propiedad').on('change',function(){
      id_propiedad_select = $(this).val();
      console.log(id_propiedad_select);
  });

  $('#valor').on('change',function(){
      id_valor_select = $(this).val();
      console.log(id_valor_select);
  });

  $('#fkID_uMedida').on('change',function(){
      id_uMedida_select = $(this).val();
      console.log(id_uMedida_select);
  });
  //--------------------------------------------

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
	  	$("#lbl_btn_actionMaterial").html("Guardar<span class='glyphicon glyphicon-chevron-right'></span>");
	  	$("#btn_actionMaterial").attr("data-action","crear");

	  	$("#form_material")[0].reset();
      
      //vuelve al inicio
      $('#myTab a[href="#materialTab"]').tab('show');
      //esconde las propiedades
      $('#myTab a[href="#propiedadesTab"]').hide();

	});


  /*
  Botón que carga el formulario para editar
  */  
  $("[name*='edita_material']").click(function(event) {

      $("#lbl_form_material").html("Editar Registro Material");
      $("#lbl_btn_actionMaterial").html("Guardar Cambios<span class='glyphicon glyphicon-chevron-right'></span>");
      $("#btn_actionMaterial").attr("data-action","editar");

      $("#form_material")[0].reset();

      $('#myTab a[href="#propiedadesTab"]').show();

      id_material = $(this).attr('data-id-material');
      
      carga_material(id_material);
      carga_propiedades(id_material);
  });

  $("[name*='elimina_material']").click(function(event) {      
    
      id_material = $(this).attr('data-id-material');
      
      elimina(id_material);
  });


	/*
	Botón de accion de formulario
	*/
	$("#btn_actionMaterial").click(function(){

      /**/
	  	action = $(this).attr("data-action");

	  	valida_action(action);

	  	console.log("accion a ejecutar: "+action);     

	}); 

  $("#btn_creaPropiedad").click(function(event) {
    agrega_propiedad();
  });

	//---------------------------------------------------------
});