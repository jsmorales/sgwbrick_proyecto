//------------------------------------------------------------------------------------------------------------
        //paginación

        //tomar el nombre o el id de la tabla
        //pasarlo como parámetro

        var nombre_tabla = $('table').attr('id');

        console.log("El id de la tabla es: "+nombre_tabla);

        $('#'+nombre_tabla).DataTable(

            {
                //"order": [[ 1, "asc" ]], //ordenando por nombre asc
                "pagingType": "full_numbers",
                "lengthMenu": [[-1, 5, 10, 25, 50], ["Todo", 5, 10, 25, 50]],

                "language": {
                    "lengthMenu":     "Mostrando _MENU_ registros",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "search":         "Buscar:",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "zeroRecords": "No hay registros que coincidan.",
                    "infoEmpty": "No se encuentran registros.",
                    "infoFiltered":   "(Filtrando _MAX_ registros en total)",
                    //------------------------------------------------------------------
                    //paginador
                    "paginate": {
                        "first":      "<--",
                        "last":       "-->",
                        "next":       ">",
                        "previous":   "<"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                    //------------------------------------------------------------------
                }
            }

        );
