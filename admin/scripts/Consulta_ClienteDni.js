$(document).ready(function(){
 init();   
    
});

function init(){
        verClientesFecha(); 
    
           
    
}
function consulta(e){
       e.preventDefault();
     
    
}


function verClientesFecha(){
  
    
    var tabla = $('#tblConsulta_ClienteFecha').dataTable(
    { "language": {
        "decimal":     ".",
        "emptyTable":     "No hay datos en esta tabla",
        "info":           "Mostrando _START_ a _END_ de un total de _TOTAL_ entradas",
        "infoEmpty":      "Mostrando 0 a 0 de un total de 0 entradas",
        "infoFiltered":   "(Filtrado de un total de _MAX_ entradas)",
        "infoPostFix":    " ",
        "thousands":      ",",
        "lengthMenu":     "Mostrar _MENU_ entradas",
        "loadingRecords": "Cargando.. ..",
        "processing":     "Procesando...",
        "search":         "Buscar con DNI: ",
        "zeroRecords":    "No se encontraron registros",
        "paginate": {
               "first":    "Primero",
               "last":     "Ultimo",
               "next":     "Siguiente",
               "previous": "Anterior"
        },
        "aria": {
            "sortAscending":    ":  Activar el ordenamiento Ascendente",
            "sortDescending":   ": Activar el ordenamiento Descendiente"
        }

    },
      "aProcessing":  true,
      "aServerSide":   true,
      "order": [[0, "desc"]],
      "aoColumns":[
          { "mDataProp": "id" },
          { "mDataProp": "1" },
          { "mDataProp": "2" },
          { "mDataProp": "3" },
          { "mDataProp": "4" },
          { "mDataProp": "5" },
          { "mDataProp": "6" },
          { "mDataProp": "7" },
          { "mDataProp": "8" },
          { "mDataProp": "9" },
          { "mDataProp": "10" }
      
    
       
        
      ],"ajax":
       {
           url:  'ajax/Consulta_ClienteDniAjax.php?Consulta_ClienteDni=listaDni',
           type : "get",
           dataType : "json",
          
           error: function(e){
               console.log(e.responseText);
               
           }
       },
       "bDestroy": true
}).DataTable();
    
}