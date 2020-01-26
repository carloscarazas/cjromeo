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
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
       
        
        <?php include_once("link-admin-css.html"); ?>
        <link rel="shortcut icon" type="image/x-icon" href="ico/favicon.ico">
        
   
     <script type="text/javascript" src="../js/Chart.min.js"></script> 
     <script type="text/javascript" src="../js/jquery.min.js"></script> 
    
    <!-- Morris Charts CSS -->
    
        
  
        
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
                        
                        <li id="liEstadistica" class=" treeview   ">
                            <a href="#">
                            
                            	<i class="fa fa-line-chart"></i> <span>Escritorio</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li id="liEscritorio"  >
                            	    <a href=""><i class="fa fa-circle-o"></i>Ingreso</a>
                                </li>
                                <li id="liEscritorio"  >
                            	    <a href="Principal.php"><i class="fa fa-circle-o"></i>Nuevo</a>
                                </li>
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
                                    <a href="#" accesskey="a"><i class="fa fa-circle-o"></i> Categorias</a>
                                </li>
                                
                                <li id="liProducto"    >
                                    <a href="#" accesskey="c"><i class="fa fa-circle-o"></i> Clientes</a>
                                </li> 
                                 <li id="liIngreso">
                                    <a href="#" accesskey="e"><i class="fa fa-circle-o"></i> Ingresos</a>
                                </li>                               
                            </ul>
                        </li>
                  
                        <li class="treeview active" id="liConsultaCompras">
                            <a href="#">
                            <i class="fa fa-search  " aria-hidden="true"></i>
                                <span>Consultas </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               
                                <li id="liStockArticulos" class="active "><a href="#"><i class="fa fa-circle-o"></i>Consulta por fecha</a></li>
                                <li id="liStockArticulos" class=" "><a href="#"><i class="fa fa-circle-o"></i>Consulta Cliente por DNI</a></li>
                                <li id="liStockArticulos" class=" "><a href="#"><i class="fa fa-circle-o"></i>Consulta Cliente por Fecha</a></li>
                            </ul>
                        </li>
                        <li class="treeview" id="liConsultaVentas">
                            <a href="#">
                               <i class="fa fa-user" aria-hidden="true"></i>
                                <span> Usuarios y Permisos</span>
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
                        <li class="treeview" id="liAlmacen">
                            <a href="#">
                              <i class="fa fa-cog fa-spin  fa-fw" aria-hidden="true"></i>
                                <span>Configuración</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="liArticulos">
                                    <a href="Almacen_Articulos.php"><i class="fa fa-circle-o"></i>Impresora</a></li>
                                <li id="liArticulos"><a href="#"><i class="fa fa-circle-o"></i>Otros</a></li>
                                
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
                           Clientes<small>Buscaqueda por fecha</small>
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-address" aria-hidden="true"></i> Buscar al clientes de fecha inicio y final
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
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="jumbotron">
                                   <form role="form" class="" action="Consulta_clienteFecha.php"  name="frmConsulta"  method="get">
                                     <div class="row">
                                        
                                               <div class="col-sm-4">
                                                    <label for="">Inicio </label>
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                                                    </div>

                                                 </div>
                                                  <div class="col-sm-4">
                                                    <label for="">Final </label>
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" id="fecha_final" name="fecha_final" required>
                                                    </div>

                                                 </div>
                                                
                                         
                                      
                                        <div class="col-xs-12">
                                           
                                             <button type="submit" id="busca_fecha" name="busca_fecha" class="btn btn-success">Buscar <i class="fa fa-search"></i></button>
                                             
                                        </div>
                                                 
                        
                                        
                                         
                                     </div>
                                      
                                       
                                   </form>
                               </div> 
                                
                            </div>
                        </div>
                         <div class="row">
                             <div class="col-xs-12 table-responsive">
                            
                                <?php
                                   
                                      if(isset($_GET['busca_fecha'] )){ 
                                           echo '   <p class="text-muted"> listado de clientes registrados</p>';
                                   $inicio = $_GET['fecha_inicio'];
                                    $final = $_GET['fecha_final'];
                                       $sql="SELECT * FROM tp_cliente_dni where fecha_registro >='".$inicio."' and fecha_registro <= '".$final."' ";
                                
                                    $result = mysqli_query($Conexion,$sql);
                                        ?>
                                   
                                 <table class="table  table-bordered  table-hover ">
                                     <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>TIPO</th>
                                            <th>N°_DOCUMENTO</th>
                                            <th>NOMBRES</th>
                                            <th>DIRECCIÓN </th>
                                            <th>CORREO</th>
                                            <th>TELÉFONO</th>
                                            <th>FECHA_NAC</th>
                                            <th>FECHA_CADUCIDAD</th>
                                            <th>FECHA_DE_REGISTRO</th>
                                        </tr>                                         
                                     </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                            while($row = mysqli_fetch_array($result)) { 
                                        ?>
                                         
                                             <tr>
                                                   <td> <?php echo $i++ ?></td>
                                                   <td><?php  echo $row['tipo_documento']; ?></td>
                                                   <td><?php  echo $row['dni_cliente']; ?></td>
                                                   <td><?php  echo $row['nombres_clientes'] .','.  $row['apellido_pater']." " .  $row['apellido_mater']  ; ?></td>
                                                   <td><?php  echo  $row['ciudad']." , " .$row['provincia']." , " .$row['distrito']. ", ". $row['direccion']; ?></td>
                                                   <td><?php  echo $row['correo']; ?></td>
                                                   <td><?php  echo $row['telefono1'] ." ," .$row['telefono2']; ?></td>
                                                   <td><?php  echo $row['fecha_nac']; ?></td>
                                                   <td><?php  echo $row['fecha_emision']; ?></td>
                                                   <td><?php  echo $row['fecha_registro']; ?></td>
                                             </tr>
                                            
                                           
                                        <?php 
                                            } 
                                        ?>
                                         </tbody>
                                    
                                     <tfoot>
                                         <tr>
                                            <th>N°</th>
                                            <th>TIPO</th>
                                            <th>N°_DOCUMENTO</th>
                                            <th>NOMBRES</th>
                                            <th>DIRECCIÓN </th>
                                            <th>CORREO</th>
                                            <th>TELÉFONO</th>
                                            <th>FECHA_NAC</th>
                                            <th>FECHA_CADUCIDAD</th>
                                            <th>FECHA_DE_REGISTRO</th>
                                        </tr>      
                                         
                                     </tfoot>
                                 </table>
                                 <?php
                                         mysqli_close($Conexion);
                                      }
                                 
                               
                                 
                                 ?>
                             </div>
                         </div>
                        
<!--
                            <div id="VerConsulta" class="table-responsive">
                                <table id="tblConsulta" class="table table-striped table-bordered table-condensed table-hover" 
                                        cellspacing="0" cellpadding="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nª_Documento</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nª_Documento</th>
                                            
                                        </tr>
                                    </tfoot>             
                                </table>
                            </div>
                            
-->
                            
                            </div>
                                                       
                            
                            
                            <!--Fin-Contenido-->
                        </div>
                    </div><!-- /.row -->
               
            </div>
            </div>


   
    </div>
                   
                	
   
	
		
         <input type="hidden" name="txtMnuAlmacen" id="txtMnuMantenimiento" value="<?php echo $_SESSION["mnu_mantenimiento"]; ?>">
        
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuAlmacen" value="<?php echo $_SESSION["mnu_almacen"]; ?>">
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuConsultaCompras" value="<?php echo $_SESSION["mnu_consultas"]; ?>">
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuConsultaVentas" value="<?php echo $_SESSION["mnu_usuarios"]; ?>">
         
         

        <?php include_once("./link-admin-js.html") ?>
    <script src="../js/plugin/raphael.min.js"></script>
    <script src="../js/plugin/morris.min.js"></script>
    <script src="../js/plugin/morris-data.js"></script>
 
<script>
//$('#busca_fecha').on('click', function(){
//   var fecha_inicio = $('#fecha_inicio').val(); 
//   var fecha_final = $('#fecha_final').val(); 
//    var url= 'Consulta_Cliente.php';
//    
//    $.ajax({
//        type:'POST',
//        url: url,
//        data: ('fefcha_inicio'+fecha_inicio, 'fecha_final'+fecha_final),
//        success: function(){
//            
//        }
//        
//    });
//});
//   
    
    
$( document ).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $("#fecha_reg").val(today);
});
    
</script>
    </body>
</html>