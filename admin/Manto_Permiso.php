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
        <title>Registro de Ventas</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <?php include_once("link-admin-css.html"); ?>
        <link rel="shortcut icon" type="image/x-icon" href="ico/favicon.ico">
        
        

    <!-- Morris Charts CSS -->
    
        
     <style>
     
       
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
                                    &nbsp; &nbsp; <span style="color:rgba(255,250,122,1.00)"> Salir</span>
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
                        <div class="pull-left image">
	                        <?php if(isset($_SESSION["foto"])){ ?> <i class=" fa fa-user"></i>  <?php } ?>
	                       
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION["empleado"] ?></p>
                            <p><?php echo $_SESSION["tipo_usuario"] ?></p>      
                        </div>
                    </div>  
                            
                    <ul class="sidebar-menu">
                        <li class="header"></li>
                        
                        <li id="liEstadistica" class=" treeview  ">
                            <a href="#">
                            
                            	<i class="fa fa-line-chart"></i> <span>Escritorio</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li id="liEscritorio" ><a href="Principal.php"><i class="fa fa-circle-o"></i> Estadística</a></li>
                            </ul>
                        </li>
                        
                        <li class="treeview " id="liMantenimiento">
                            <a href="#">
                            	<i class="fa fa-laptop"></i>
                            	<span>Mantenimiento</span>
                            	<i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="liCategoria" >
                                    <a href="Manto_Categoria.php" accesskey="a"><i class="fa fa-circle-o"></i> Categorias</a>
                                </li>
                                
                                <li id="liProducto"  >
                                    <a href="Manto_Productos.php" accesskey="c"><i class="fa fa-circle-o"></i> Artículos</a>
                                </li> 
                                 <li id="liIngreso">
                                    <a href="#" accesskey="e"><i class="fa fa-circle-o"></i> Ingresos</a>
                                </li>                               
                            </ul>
                        </li>
                        
                        
                        <li class="treeview" id="liAlmacen">
                            <a href="#">
                                <i class="fa fa-cubes"></i> 
                                <span>Almacén</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="liArticulos"><a href="Almacen_Articulos.php"><i class="fa fa-circle-o"></i>Artículo en Almacén </a></li>
                                <li id="liArticulos"><a href="#"><i class="fa fa-circle-o"></i>Artículo en  Campo </a></li>
                                
                            </ul>
                        </li>
                   

                        
                        <li class="treeview" id="liConsultaCompras">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Consultas </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               
                                <li id="liStockArticulos"><a href="#"><i class="fa fa-circle-o"></i>  Artículos</a></li>
                            </ul>
                        </li>
                        
                        <li class="treeview active" id="liConsultaVentas">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span> Usuario</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                              <li id="liUsuario">
                                    <a href="Manto_Usuario.php" accesskey="f"><i class="fa fa-circle-o"></i> Usuarios</a>
                                </li>
                                <li id="liCliente"  class="active ">
                                    <a href="Manto_Permiso.php" accesskey="g"><i class="fa fa-circle-o"></i> Permisos</a>
                                </li>
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
                        <h1 class="page-header">
                            Categorias <small>Lista</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                               <a href="../Principal.php"> <i class="fa fa-dashboard"></i> Estadistica</a>
                            </li>
                            <li  class="active" >
                                <i class="glyphicon glyphicon-list-alt"></i> Lista
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
             

                <!-- /.row -->

            </section>
        
            <div class="container-fluid">
			
                <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="box-header with-border">
                        <h3 class="box-title">Registro de Permiso</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                    
                            <a href="Manto_Permiso.php" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </div>    
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!--Contenido-->                           
                            <div class="col-sm-14"  id="VerForm">
                                <form role="form" name="frmArticulos" id="frmArticulos" enctype="multipart/form-data">                    	
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <?php include "recursos/PermisoFormularioManto.html"; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 left">
                                            <h5></h5>
                                            <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o"></i> Registrar</button>
                                            <a href="Manto_Permiso.php" class="btn btn-primary" ><i class="fa fa-remove"></i> Cancelar</a>
                                            <hr>
                                            <span class="lead text-primary"></span>
                                        </div>
                                    </div>                		
                                </form>
                            </div>
                            <button class="btn btn-primary" id="btnNuevoArticulo"><i class="fa fa-file"></i> Nuevo</button>                            
                            <br><br>
                            <div id="VerListado" class="table-responsive">
                                <table id="tblArticulos" class="table table-striped table-bordered table-condensed table-hover" 
                                        cellspacing="0" cellpadding="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Empleado</th>
                                            <th>Tipo_de_Usuario</th>
                                            <th>Fecha_de_Registro</th>
                                            <th>Mantenimiento</th>
                                            <th>Almacen</th>
                                            
                                            <th>Consulta</th>
                                            <th>Usuarios</th>
                                            <th>Estado</th>
                                          
											<th>Opciones</th> 
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Empleado</th>
                                            <th>Tipo_de_Usuario</th>
                                            <th>Fecha_de_Registro</th>
                                            <th>Mantenimiento</th>
                                            <th>Almacen</th>
                                          
                                            <th>Consulta</th>
                                            <th>Usuarios</th>
                                            <th>Estado</th>
                                          
											<th>Opciones</th>  
                                        </tr>
                                    </tfoot>             
                                </table>
                            </div>
                            
                            <!--Fin-Contenido-->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div>
             
            </div>
    </div>
    </div>
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuMantenimiento" value="<?php echo $_SESSION["mnu_mantenimiento"]; ?>">
        
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuAlmacen" value="<?php echo $_SESSION["mnu_almacen"]; ?>">
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuConsultaCompras" value="<?php echo $_SESSION["mnu_consultas"]; ?>">
        <input type="hidden" name="txtMnuAlmacen" id="txtMnuConsultaVentas" value="<?php echo $_SESSION["mnu_usuarios"]; ?>">
        
        <?php include_once("./link-admin-js.html") ?>
    
        <script type="text/javascript" src="scripts/Permiso.js"></script> 
        
    </body>
</html>