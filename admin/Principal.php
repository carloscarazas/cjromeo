<?php 
  session_start();
include_once("model/Conexion.php");


  if(!isset($_SESSION["idusuario"])){
	  header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>Principal</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       
        
        <?php include_once("link-admin-css.html"); ?>
        <link rel="shortcut icon" type="image/x-icon" href="ico/favicon.ico">
        
   
     <script type="text/javascript" src="../js/Chart.min.js"></script> 
     <script type="text/javascript" src="../js/jquery.min.js"></script> 
    
    <!-- Morris Charts CSS -->
    
       <style>
        .filledInputs{
         color: red  ;
            font-size: 20px;
        }
        </style> 
  
        
	</head>
  	<body class="hold-transition skin-blue sidebar-mini">
       
    <div id="wrapper">
    
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
               <a class="navbar-brand" href="Principal.php"><?php include_once "../version.text" ?></a>
                 
            </div>
            <!-- Top Menu Items -->
          
             <ul class="nav navbar-nav  navbar-right top-nav">
              
               
                <li class="dropdown user user-menu">
                         <a href="ajax/AccederAjax.php?permisoUser=Salir" >
                              <?php if(isset($_SESSION["foto"])){ ?> <i class=" fa fa-user"></i>  <?php } ?>
                  				 <span class="hidden-xs"><?php echo $_SESSION["tipo_usuario"] ?> - <?php echo $_SESSION["empleado"]?></span> 
                                    &nbsp; &nbsp; <span class="btn btn-default" style="color:rgba(0,250,122,1.00)">Cerrar sesión</span>
                                </a>
                                
                            </li>  
               
                
            </ul>
          
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <!-- /.navbar-collapse -->
        </nav>

       <div  class=" collapse navbar-collapse navbar-ex1-collapse">
          <div id="mySidenav" class="sidenav wrapper navbar-ex1-collapse">
        		<section class="sidebar">          
                    <div class="user-panel">
                        
                        <div class="pull-left info">
                            <p><?php echo $_SESSION["empleado"] ?></p>
                            <p><?php echo $_SESSION["tipo_usuario"] ?></p>      
                        </div>
                        <br>
                        <br>
                    </div>  
                          
                            
                    <ul class="sidebar-menu">
                        <li class="header"></li>
                        
                        <li id="liEstadistica" class=" treeview   active ">
                            <a href="#">
                            
                            	<i class="fa fa-file-text-o" aria-hidden="true"></i>
                            	<span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li id="liEscritorio" class="active " ><a href="Principal.php"><i class="fa fa-circle-o"></i>Nuevo</a></li>
                            	<li id="liEscritorio" class="" title="Renovación de documentos" > <a href=""><i class="fa fa-circle-o"></i>Renovar</a></li>
                            	<li id="liEscritorio" class="" title="Actualizar Decumentos" ><a href=""><i class="fa fa-circle-o"></i>Actualizar</a></li>
                            </ul>
                        </li>
                        <li class="treeview" id="liConsultaCompras">
                            <a href="#">
                            <i class="fa fa-search  fa-fw " aria-hidden="true"></i>
                                <span>Consultas </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               
                                <li id="liStockArticulos"><a href="Consulta_ClienteDni.php"><i class="fa fa-circle-o"></i>Clientes </a></li>
                                <li id="liStockArticulos"><a href="Consulta_ClienteFecha.php"><i class="fa fa-circle-o"></i>  Clientes por Fechas</a></li>
                                <li id="liStockArticulos"><a href="Consulta_ClientePersonal.php"><i class="fa fa-circle-o"></i>Cliente General</a></li>
                              
                            </ul>
                        </li>
                         <li class="treeview" id="liEstadistica">
                            <a href="#">
                             
                               <i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>
                                <span>Estadística</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="liArticulos">
                                    <a href="Estadistica.php"><i class="fa fa-circle-o"></i>Ingresos</a></li>
                               
                                
                            </ul>
                        </li>
                        
                        <li class="treeview " id="liMantenimiento">
                            <a href="#">
                            	<i class="fa fa-database" aria-hidden="true"></i>
                            	<span>Mantenimiento</span>
                            	<i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="liCategoria" >
                                    <a href="Manto_Categoria.php" accesskey="a"><i class="fa fa-circle-o"></i> Categorias</a>
                                </li>
                                
                                <li id="liProducto"    >
                                    <a href="Manto_Productos.php" accesskey="c"><i class="fa fa-circle-o"></i> Artículos</a>
                                </li> 
                                 <li id="liIngreso">
                                    <a href="#" accesskey="e"><i class="fa fa-circle-o"></i> Ingresos</a>
                                </li>                               
                            </ul>
                        </li>
                        <li class="treeview" id="liReporte">
                            <a href="#">
                             <i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i>
                             
                                <span>Reportes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="liArticulos">
                                    <a href="Almacen_Articulos.php"><i class="fa fa-circle-o"></i>individual</a></li>
                                <li id="liArticulos"><a href="#"><i class="fa fa-circle-o"></i>Por fecha </a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview" id="liPermisios">
                            <a href="#">
                             
                               <i class="fa fa-unlock-alt fa-fw" aria-hidden="true"></i>
                                <span>Usuarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                              <li id="liUsuario">
                                    <a href="Manto_Usuario.php" accesskey="f"><i class="fa fa-circle-o"></i> Usuarios</a>
                                </li>
                                <li id="liCliente">
                                    <a href="Manto_Permiso.php" accesskey="g"><i class="fa fa-circle-o"></i> Permisos</a>
                                </li>
                            </ul>
                        </li>  
                       
                         <li class="treeview" id="liAyuda">
                            <a href="#">
                             

                               <i class="fa fa-question-circle fa-fw" aria-hidden="true"></i>
                                <span>Ayuda</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="liArticulos">
                                    <a href="Soporte.php"><i class="fa fa-circle-o"></i>Soporte Técnico</a></li>
                            </ul>
                        </li>        
                        <li>
                            <a href="ajax/AccederAjax.php?permisoUser=Salir">
                            <i class="fa fa-close"></i> <span>Cerrar Sesión</span>                            
                            </a>
                        </li>                    
                    </ul>
        		</section>
             </div>
         </div>
    <div id="page-wrapper">
         <section class="container-fluid" >
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <br>
                        <h1 class="page-header">
                           Licencia<small>Nuevo Clientes</small>
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-address" aria-hidden="true"></i> Licencia
                            </li>
                            <li>
                                <i class="fa fa-file-text" aria-hidden="true"></i> Ingresar la información correcta....
                            </li>
                        </ol>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                     
                        <div class="col-xs-12">
                          <div class="row"  id="VerForm">
                               <?php include_once 'recursos/Update_Cliente.html'; ?>
                               
                                </div>
                                <button class="btn btn-primary" id="btnNuevoArticulo"  ><i class="fa fa-file"></i> Agregar Cliente</button> 
<!--                                <button class="btn btn-success"  type="button" id="btnlicencia" data-toggle="modal" data-target="#modalUpdateLicencia" ><i class="fa fa-file"></i> Agregar Licencia</button>  -->
                                           
                          <div id="modalUpdateLicencia" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                              <div class="modal-dialog modal-lg">
                                    <div class="modal-content" id="verlicencia">

                                      <form role="form" name="frmlicencia" id="frmlicencia" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h2 class="modal-title text-warning" >Agregar Licencia</h2>	
                                        </div>
                                        <div class="modal-body">

                                         <?php include_once "recursos/ModalUpdateLicencia.html"; ?>
                                      
                                         

                                        </div>
                                        <div class="modal-footer">

                                             <button type="submit"  class="btn  btn-success">Guardar</button> 
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cerrar</button>
                                            <!--<button type="button" id="btnAgregarArtPed" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Agregar</button>-->
                                        </div>
                                        </form>

                                    </div>
                              </div>
                            </div>
                             
                            <br><br>
                            <div id="VerListado" class="table-responsive">
                                <table id="tblArticulos" class="table table-striped table-bordered table-condensed table-hover" 
                                        cellspacing="0" cellpadding="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nª_Documento</th>
                                            <th>Nombres</th>
                                            <th>Descripción</th>
                                           
                                            <th>Fecha</th>
                                             <th>Agregar_licencia</th>
                                            <th>Opciones</th> 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nª_Documento</th>
                                            <th>Nombres</th>
                                            <th>Descripción</th>
                                            
                                            <th>Fecha</th>
                                            <th>Agregar_licencia</th>
                                             <th>Opciones</th> 
                                        </tr>
                                    </tfoot>             
                                </table>
                            </div>
                            
                            
                            </div>
                                                       
                            
                            
                            <!--Fin-Contenido-->
                        </div>
                    </div><!-- /.row -->
               
            </div>
            </div>


   
    </div>
    
    

		
         <input type="hidden"  name="txtMnuAlmacen"  id="txtMnuMantenimiento" value="<?php echo $_SESSION["mnu_mantenimiento"]; ?>">
        
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuAlmacen" value="<?php echo $_SESSION["mnu_almacen"]; ?>">
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuConsultaCompras" value="<?php echo $_SESSION["mnu_consultas"]; ?>">
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuConsultaVentas" value="<?php echo $_SESSION["mnu_usuarios"]; ?>">
          <?php include_once "recursos/ModalVerCliente.html"; ?>  
          
          
        
          
          
          <script>
              
//AGREGAR TABLA DE LICENCIO Y ELIMANAR            
$(function(){
    $("#adicional").on('click', function(){
         $("#tablaLicencia  tbody tr:eq(0)").clone().removeClass('fila-fijaLicencia').appendTo("#tablaLicencia"); 
      });
    $(document).on("click",".EliminarLicencia", function(){
       var parent  = $(this).parent().get(0);
           
               
                   $(parent).remove();
           
          });
    
    $("#adicionalCirculacion").on('click', function(){
         $("#tablaCirculacion  tbody tr:eq(0)").clone().removeClass('fila-fijaCirculacion').appendTo("#tablaCirculacion"); 
      });
    $(document).on("click",".EliminarCirculacion", function(){
       var parent  = $(this).parent().get(0);
       
             $(parent).remove();
      
    });
});
//              FIN
</script>
<script>

    $(document).ready(function () {
           $("#dni").keyup(function () {
              var value = $(this).val();
               $("#dni_reniec").val(value);
              });
        $("#direccion").keyup(function () {
              var value = $(this).val();
               $("#direccion_lic").val(value);
              });
         $("#dni").keyup(function () {
              var value = $(this).val();
               $("#documento_lic").val(value);
              });
         $("#dni").keyup(function () {
              var value = $(this).val();
               $("#dniT").val(value);
              });
        
              });
    function PasarDireccion() {
         document.getElementById("dni_reniec").value = document.getElementById("dni").value;
         document.getElementById("direccion_lic").value = document.getElementById("direccion").value;
         document.getElementById("documento_lic").value = document.getElementById("dni").value;
        document.getElementById("dniT").value = document.getElementById("dni").value;
                                                                
                  } 
    
    
$(function(){
	$('#btnNuevoArticulo').on('click', function(){
    $("#idcliente").val('');
    $("#dni_reniec").val('');
    $("#nombre_reniec").val('');
    $("#paterno_reniec").val('');
    $("#materno_reniec").val('');
    $("#ciudad").val('');
    $("#provincia").val('');
    $("#distrito").val('');
    $("#direccion").val('');
    $("#correo").val('');
    $("#telefono1").val('');
    $("#telefono2").val(''); 
});
  });
    function imprimir() {
    window.print();
    }
   function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        } 
    
$(function(){
	$('#botoncito').on('click', function(){
		var dni = $('#dni').val();
		var url = 'consulta_reniec.php';
    if($("#dni").val() !=""){
		$.ajax({
		type:'POST',
		url:url,
		data:'dni='+dni,
		success: function(datos_dni){
			var datos = eval(datos_dni);
				$('#dni_reniec').val(datos[0]);
				$('#paterno_reniec').val(datos[1]);
				$('#materno_reniec').val(datos[2]);
				$('#nombre_reniec').val(datos[3]);
				$('#alerta').text(datos[4]);
                $('#alerta2').text(datos[5]);
            $('#alerta3').text(datos[6]);
		}
	});
        }else{
        bootbox.alert("INGRESE EL NÚMERO DE DNI ");
                $("#dni").focus();
        }
	return false;
	});
});
</script>
       
        <?php include_once("./link-admin-js.html") ?>
    <script src="../js/plugin/raphael.min.js"></script>
    <script src="../js/plugin/morris.min.js"></script>
    <script src="../js/plugin/morris-data.js"></script>
 <script type="text/javascript" src="scripts/Cliente_dni.js"></script>

<script>
$( document ).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $("#fecha_reg").val(today);
});
    
    
    $(function(){
  $('#frmArticulos :input')
    .change(function(){
      var $input = $(this);
      if ($input.val() === '')
      {
        $input.removeClass('filledInputs');
      }
      else
      {
        $input.addClass('filledInputs');
      }
    });
});
    
    
 $(document).ready(function(){
                                
        var consulta;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#numero_lic").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#numero_lic").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#numero_lic").val();
                                                                    
              //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "busqueda/busca_licencia.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<img src='../files/ajax-loader.gif' class='img-responsive' />");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){
                            
                        
                          $("#resultado").empty();
                          $("#resultado").append(data);
                                                             
                    }
              });
                                                                                  
                                                                           
        });
                                                                   
});
</script>

    </body>
</html>