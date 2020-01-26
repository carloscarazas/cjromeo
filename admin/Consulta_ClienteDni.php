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
        <title>Consulta Cliente por DNI - TAXIPAEZ PERU</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       
        
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
                            
                            	<i class="fa fa-line-chart"></i> <span>Escritorio</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li id="liEscritorio" class="active " ><a href="Principal.php"><i class="fa fa-circle-o"></i>Nuevo</a></li>
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
                  
                        <li class="treeview" id="liConsultaCompras">
                            <a href="#">
                            <i class="fa fa-search  " aria-hidden="true"></i>
                                <span>Consultas </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               
                                <li id="liStockArticulos"><a href="#"><i class="fa fa-circle-o"></i>  Artículos</a></li>
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
               
                           
                            <br><br>
                            <div id="VerConsulta_ClienteFecha" class="table-responsive">
                                <table id="tblConsulta_ClienteFecha" class="table table-striped table-bordered table-condensed table-hover" 
                                        cellspacing="0" cellpadding="0" width="100%">
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
                                            <th>OPCIÓN</th>
                                            
                                        </tr>
                                    </thead>
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
                                             <th>OPCIÓN</th>
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
         <input type="hidden" name="txtMnuAlmacen" id="txtMnuMantenimiento" value="<?php echo $_SESSION["mnu_mantenimiento"]; ?>">
        
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuAlmacen" value="<?php echo $_SESSION["mnu_almacen"]; ?>">
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuConsultaCompras" value="<?php echo $_SESSION["mnu_consultas"]; ?>">
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuConsultaVentas" value="<?php echo $_SESSION["mnu_usuarios"]; ?>">
         

        <?php include_once("./link-admin-js.html") ?>
    <script src="../js/plugin/raphael.min.js"></script>
    <script src="../js/plugin/morris.min.js"></script>
    <script src="../js/plugin/morris-data.js"></script>
 <script type="text/javascript" src="scripts/Consulta_ClienteDni.js"></script>

    </body>
</html>