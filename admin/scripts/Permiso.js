$(document).ready(function(){
    init();
});
function init(){
    ListadoArticulos();
    ComboUM();
    $("#VerForm").hide();
    $("txtRutaImgArt").hide();
    $("form#frmArticulos").submit(SaveOrUpdate);
    $("#btnNuevoArticulo").click(VerForm);
    if ($("#txtMnuMantenimiento").val() == "0"){
		$("#liMantenimiento").hide();
		};
		
		if ($("#txtMnuAlmacen").val() == "0"){
		$("#liAlmacen").hide();
		};
		if ($("#txtMnuCajas").val() == "0"){
		$("#liCajas").hide();
		};
		if ($("#txtMnuCompras").val() == "0"){
		$("#liCompras").hide();
		};
		if ($("#txtMnuVentas").val() == "0"){
		$("#liVentas").hide();
		};
		if ($("#txtMnuConsultaCompras").val() == "0"){
		$("#liConsultaCompras").hide();
		};
		if ($("#txtMnuConsultaVentas").val() == "0"){
		$("#liConsultaVentas").hide();
		};
}
function ComboUM(){
    $.post("ajax/PermisoAjax.php?permiso=listUM", function(r){
        $("#txtusuario").html(r);
    });
}
function Limpiar(){
    $("#txtIdArticulo").val("");
    $("#txtnombre").val("");
}
function VerForm(){
    $("#VerForm").show();
    $("btnNuevoArticulo").hide();
    //$("btnAjustarStockMinimo").hide();
    //$("#btnAjustarPrecios").hide();
    $("#VerListado").hide();
}
function OcultarForm(){
    $("#VerForm").hide();
   // $("btnNuevoArticulo").show();
    //$("btnAjustarStockMinimo").show();
    $("#btnAjustarPrecios").show();
    $("#VerListado").show();
}
function SaveOrUpdate(e){
    e.preventDefault();

        if($("#txtlogin").val() !=""){
             if($("#txtclave").val() !=""){
                
                    var formData =new FormData($("#frmArticulos")[0]);
                    $.ajax({
                        url: "ajax/PermisoAjax.php?permiso=SaveOrUpdate",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(datos)
                        {
                            swal("Mensaje del Sistema", datos, "success");
                            ListadoArticulos();
                            OcultarForm();
                            $('#frmArticulos').trigger("reset");
                        }
                    });
                
             }else{
                bootbox.alert("La descripcion del articulo no puede quedar vacio");
                $("#txtclave").focus();
             }
        }else{
            bootbox.alert("El codigo del articulo no puede quedar vacio");
                $("#txtlogin").focus();
        }
};

function ListadoArticulos(){
var tabla = $('#tblArticulos').dataTable(
    { "language": {
        "decimal":     ".",
        "emptyTable":     "No hay datos en esta tabla",
        "info":           "Mostrando _START_ a _END_ de un total de _TOTAL_ entradas",
        "infoEmpty":      "Mostrando 0 a 0 de un total de 0 entradas",
        "infoFiltered":   "(Filtrado de un total de _MAX_ entradas)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Mostrar _MENU_ entradas",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Buscar:",
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
      "order": [[2, "asc"]],
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
          { "mDataProp": "9" }
         
        
          
      ],"ajax":
       {
           url:  'ajax/PermisoAjax.php?permiso=list',
           type : "get",
           dataType : "json",
           error: function(e){
               console.log(e.responseText);
           }
       },
       "bDestroy": true
}).DataTable();
};

function eliminarArticulo(id){
    bootbox.confirm("¿Esta seguro de eliminar el articulo?", function(result){
          if(result){
              $.post("ajax/PermisoAjax.php?permiso=delete", {id : id}, function(e){
                  swal("Mensaje del sistema",e,"success");
                  ListadoArticulos();
              });
          }
    })
}

function verImagen(Imagen,Descripcion,Nombre){
   
    $("#txtCodigoArticulo").text(Nombre);
    $("#txtDescripcion").text(Descripcion);
    if(Imagen !="./"){
        $("#ImagenArticulo").attr("src",Imagen);
    }else{
        $("#ImagenArticulo").attr("src","./Files/Articulo/blank.jpg");
    }
    $("#modalVerImagenArticulo").modal("show");
}

function cargarDataArticulos(usuario,tipo_usuario,fecha_registro,mnu_mantenimiento,mnu_almacen,mnu_consultas,mnu_usuarios,estado,empleado){
    $("#VerForm").show();
    $("btnNuevoArticulo").hide();
    //$("btnAjustarStockMinimo").hide();
    //$("#btnAjustarPrecios").hide();
    $("#VerListado").hide();

    $("#txtIdArticulo").val(usuario);
    $("#txtnombre").val(tipo_usuario);
    $("#txtmanto").val(mnu_mantenimiento);
    $("#txtalmacen").val(mnu_almacen);

    $("#txtfecha_nac").val(fecha_registro);
    
    $("#txtconsultacompra").val(mnu_consultas);
    $("#txtconsultaventas").val(mnu_usuarios);
   
    $("#txtestado").val(estado);
    $("#txtusuario").val(empleado);
   
    //$("#txtRutaImgArt").val(Imagen);
    //$("#txtRutaImgArt").show();
}












