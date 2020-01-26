$(document).ready(function(){
    init();
});
function init(){
    ListadoArticulos();
    tipo_documento();
    tipo_licencia_clase();
    tipo_licencia_categoria();
    $("#VerForm").hide();
    $("#verlicencia").hide();
    $("#id_documento").hide();
   
    $("txtRutaImgArt").hide();
     $("form#frmlicencia").submit(SaveOrUpdateLicencia);
    $("form#frmArticulos").submit(SaveOrUpdate);
   
    $("#btnNuevoArticulo").click(VerForm);
    $("#btnlicencia").click(VerFormLicencia);
    $("#btnlicencia").click(LimpiarLicencia);
    
//    esto me permite que se muestre solo  los privilegios segun el usuario
    
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
    
    
    
    // -----------fin -------  
}
function tipo_documento(){
    $.post("ajax/Cliente_dniAjax.php?Categoria=comboDocumento", function(r){
        $("#tipo_doc").html(r);
    });
}
function tipo_licencia_clase(){
    $.post("ajax/Cliente_dniAjax.php?Categoria=comboLicencia_Clase", function(r){
        $("#clase_lic").html(r);
    });
}
function tipo_licencia_categoria(){
    $.post("ajax/Cliente_dniAjax.php?Categoria=comboLicencia_Categoria", function(r){
        $("#categoria_lic").html(r);
    });
}
function Limpiar(){
   //////DNI//////
    $("#idcliente").val('');
    $("#dni_reniec").val('');
    $("#nombre_reniec").val('');
    $("#paterno_reniec").val('');
    $("#materno_reniec").val('');
    $("#ciudad").val('');
    $("#provincia").val('');
    $("#distrito").val('');
    $("#direccion").val('');
    $("#fecha_reg").val('');
    $("#correo").val('');
    $("#telefono1").val('');
    $("#telefono2").val('');
    
    /////licencia////
    
}
function LimpiarLicencia () {
     $("#documento_lic").val('');
     $("#id_lic").val('');
     $("#numero_lic").val('');
     $("#direccion_lic").val('');
    
    
}
function VerFormLicencia(){
     $("#VerForm").hide();
     $("#verlicencia").show();
    $("#buscar_dni").show();
    $("#btnNuevoArticulo").show();
    //$("btnAjustarStockMinimo").hide();
    //$("#btnAjustarPrecios").hide();
    $("#VerListado").show();
}

function VerForm(){
     $("#VerForm").show();
     $("#verlicencia").show();
    $("#buscar_dni").show();
    $("#btnNuevoArticulo").hide();
    $("#btnlicencia").hide();
    
    
  
    //$("btnAjustarStockMinimo").hide();
    //$("#btnAjustarPrecios").hide();
    $("#VerListado").show();
}
function OcultarForm(){
    $("#VerForm").hide();
    $("#buscar_dni").hide();
    $("#btnNuevoArticulo").hide();
//    $("#btnlicencia").hide();
    //$("btnAjustarStockMinimo").show();
    $("#btnAjustarPrecios").show();
    $("#VerListado").show();
}
function SaveOrUpdate(e){
    e.preventDefault();

    
        if($("#telefono1").val() !=""){
             if($("#ciudad").val() !=""){
                    var formData =new FormData($("#frmArticulos")[0]);
                    $.ajax({
                        url: "ajax/Cliente_dniAjax.php?Categoria=SaveOrUpdate",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(datos)
                        {
                            swal("Mensaje del Sistema", datos, "success");
                            ListadoArticulos();
                            OcultarForm();
                            Limpiar();
                             $("#btnNuevoArticulo").show();
                               $("#btnlicencia").show();
                            $('#frmArticulos').trigger("reset");
                        }
                    });
                
             }else{
                bootbox.alert("Ingrese el correo del cliente");
                $("#ciudad").focus();
             }
        }else{
            bootbox.alert("ingrese el numero de telefono ");
                $("#telefono1").focus();
        }
};
function SaveOrUpdateLicencia(e){
    e.preventDefault();
        if($("#documento_lic").val() !=""){
             if($("#numero_lic").val() !=""){
                    var formData =new FormData($("#frmArticulos2")[0]);
                    $.ajax({
                        url: "ajax/Cliente_licenciaAjax.php?licencia=SaveOrUpdateLicencia",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(datos)
                        {
                            swal("Mensaje del Sistema", datos, "success");
                            ListadoArticulos();
                            OcultarForm();
                            LimpiarLicencia();
                             $("#btnlicencia").show();
                            $("#btnNuevoArticulo").show();
                            $('#frmlicencia').trigger("reset");
                        }
                    });
                
             }else{
                bootbox.alert("Ingrese el Licencia");
                $("#numero_lic").focus();
             }
        }else{
            bootbox.alert("ingrese de documento ");
                $("#documento_lic").focus();
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
        "loadingRecords": "Cargando.1 ..",
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
      "order": [[0, "asc"]],
      "aoColumns":[
          { "mDataProp": "id" },
          { "mDataProp": "1" },
          { "mDataProp": "2" },
          { "mDataProp": "3" },
          { "mDataProp": "4" },
          { "mDataProp": "5" },
          { "mDataProp": "6" }
    
       
        
      ],"ajax":
       {
           url:  'ajax/Cliente_dniAjax.php?Categoria=lista',
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
    bootbox.confirm("¿Esta seguro de eliminar el Categoria?", function(result){
          if(result){
              $.post("ajax/CategoriaAjax.php?Categoria=delete", {id : id}, function(e){
                  swal("Mensaje del sistema",e,"success");
                  ListadoArticulos();
              });
          }
    });
};
function eliminarArticulo(id){
    bootbox.confirm("¿Esta seguro de eliminar el Categoria?", function(result){
          if(result){
              $.post("ajax/CategoriaAjax.php?Categoria=delete", {id : id}, function(e){
                  swal("Mensaje del sistema",e,"success");
                  ListadoArticulos();
              });
          }
    });
};
function ver_cliente(tipo_documento,dni, nombre, paterno, materno, ciudad, provincia, distrito, direccion, correo, telefono1,  telefono2, fecha_reg, fecha_nac, fecha_emision ){
     $("#vertipo_doc").text(tipo_documento);
     $("#vercliente").text(dni);
//     $("#verclienteDni").val(dni);
     $("#vernombre").text(nombre);
     $("#verpaterno").text(paterno);
     $("#vermaterno").text(materno);
     $("#verciudad").text(ciudad);
     $("#verprovincia").text(provincia);
     $("#verdistrito").text(distrito);
     $("#verdireccion").text(direccion);
     $("#vercorreo").text(correo);
     $("#vertelefono1").text(telefono1);
     $("#vertelefono2").text(telefono2);
     $("#verfecha_reg").text(fecha_reg);
    $("#verfecha_nac_reniec").text(fecha_nac);
    $("#verfecha_emision_reniec").text(fecha_emision);
       $("#modalVerCliente").modal("show");
     $("#btnlicencia").show();
//    $(location).attr('href','Principal.php?dni='+dni);
     $("#verclienteDni").attr("value",dni);
  
     
};
function agregar_licencia(dni,direccion){
     $("#documento_lic").val(dni);
     $("#direccion_lic").val(direccion);
    VerFormLicencia();
    $("#modalUpdateLicencia").modal("show");
   
};
function tarjeta_de_circulacion(){
    
}
function cargarDataCliente (idcliente,tipo_documento, dni, nombre, paterno, materno, ciudad, provincia, distrito, direccion, correo, telefono1, telefono2,fecha_reg, fecha_nac, fecha_emision ){
   $("#VerForm").show();
    $("#buscar_dni").hide();
    $("#btnNuevoArticulo").hide();
    $("#btnlicencia").hide();
    $("#id_documento").show();
    $("btnAjustarStockMinimo").hide();
    $("#btnAjustarPrecios").hide();
    $("#VerListado").hide();
    $("#idcliente").val(idcliente);
    $("#tipo_doc").val(tipo_documento);
    $("#dni_reniec").val(dni);
    $("#nombre_reniec").val(nombre);
    $("#paterno_reniec").val(paterno);
    $("#materno_reniec").val(materno);
    $("#ciudad").val(ciudad);
    $("#provincia").val(provincia);
    $("#distrito").val(distrito);
    $("#direccion").val(direccion);
    $("#fecha_reg").val(fecha_reg);
    $("#fecha_nac_reniec").val(fecha_nac);
    $("#fecha_emision_reniec").val(fecha_emision);
    $("#correo").val(correo);
    $("#telefono1").val(telefono1);
    $("#telefono2").val(telefono2);
   // $("#txtPrecioVenta").val(precio);
    //$("#txtRutaImgArt").val(Imagen);
    //$("#txtRutaImgArt").show();

}













