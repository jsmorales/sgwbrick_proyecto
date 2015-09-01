// Morris.js Charts sample data 

$(function() {

    function con_data_ajax(){
      $.ajax({
        url: '../Controller/interfaz_ajax.php',        
        data:"tipo=mostrar_chart_barras",
      })
      .done(function(data) {
        
       console.log(data.mensaje);

        new Morris.Bar({
		      element: 'morris-area-chart',
		      data: data.mensaje,
		      xkey: 'nombre',
		      ykeys: ['cantidad'],
		      labels: ['Aliados'],
		      resize: 'True',         
		      barColors: ['#EF3F23'], //colores de las barras
          /**/
          hoverCallback: function (index, options, content, row) {
            if(!row.cantidad){
              return '<label>'+row.nombre +'</label> </br> Cantidad de aliados 0';
            }else{
              return '<label>'+row.nombre +'</label> </br> Cantidad de aliados <label>' + row.cantidad + '</label> </br> <a href="admin_aliados.php?id_localidad='+row.id_localidad+'"> Ver Aliados </a>';
            }            
          }
		    });

      
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    

    };

    //ejecución de la función
    
    con_data_ajax()
/* ejemplo data para morris chart

    var j_data_morris = [
        { y: 'Usaquén', a: 3},
        { y: 'Chapinero', a: 2},
        { y: 'STFE', a: 0},
        { y: 'SBAL', a: 0},
        { y: 'USME', a: 0},
        { y: 'TUNJ', a: 0},
        { y: 'BOSA', a: 0},
        { y: 'KENi', a: 0},
        { y: 'FONT', a: 0},
        { y: 'ENGT', a: 0},
        { y: 'SUBA', a: 0},
        { y: 'B.UN', a: 0},
        { y: 'TEUS', a: 0},
        { y: 'LMAR', a: 0},
        { y: 'ANAR', a: 0},
        { y: 'P.AR', a: 0},
        { y: 'LCAN', a: 0},
        { y: 'RURI', a: 0},
        { y: 'CBOL', a: 0},
        { y: 'SUPZ', a: 0}
      ];*/
/*
    new Morris.Bar({
      element: 'morris-area-chart',
      data: j_data_morris,
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Líderes'],
      resize: 'True',
      barColors: ['#EF3F23'] //colores de las barras
    }); */

/*
1 Usaquén    
2 Chapinero   
3 Santa Fe   
4 San Cristóbal  
5 Usme    
6 Tunjuelito   
7 Bosa    
8 Kennedy    
9 Fontibón   
10 Engativá   
11 Suba    
12 Barrios Unidos  
13 Teusaquillo   
14 Los Mártires  
15 Antonio Nariño  
16 Puente Aranda  
17 La Candelaria  
18 Rafael Uribe Uribe 
19 Ciudad Bolívar  
20 Sumapaz
*/
    // Line Chart morris-line-chart

    Morris.Line({
      element: 'morris-line-chart',
      data: [
        { y: '2012', a: 4, b: 2 },
        { y: '2013', a: 3,  b: 1 },
        { y: '2014', a: 4,  b: 2 },
        { y: '2015', a: 5,  b: 3 }
      ],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Líderes', 'Ediles'],
      resize: 'True'
    }); 
    
});
