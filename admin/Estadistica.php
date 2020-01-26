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
           
           
           /*--------cuadro estadistico-----------  */
		.caja{
			margin:auto;
			max-width:250px;
            
			padding:3px;
			border:3px solid red;
			border-radius:8px;
		}
		
		.caja select{
			width:100%;
			font-size:16px;
			padding:5px;
			
			border-radius:5px;
			color: darkred;
            font-size: 20px;
		}
		
		.resultados{
          
            background: rgba(0,0,0,.8);
			margin:auto;
			margin-top:10px;
			width:95%;
            height:50%;
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
                        
                        <li id="liEstadistica" class=" treeview    ">
                            <a href="#">
                            
                            	<i class="fa fa-file-text-o" aria-hidden="true"></i>
                            	<span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li id="liEscritorio" class=" " ><a href="Principal.php"><i class="fa fa-circle-o"></i>Nuevo</a></li>
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
                         <li class="treeview active" id="liEstadistica">
                            <a href="#">
                             
                               <i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>
                                <span>Estadística</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="liArticulos" class="active">
                                    <a href="Estadistica.php"><i class="fa fa-circle-o"></i>Ingresos Generales</a></li>
                               
                                
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
                           ESTADISTICA<small>Estadisticos  General</small>
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-address" aria-hidden="true"></i> Estadistica
                            </li>
                            <li>
                                <i class="fa fa-file-text" aria-hidden="true"></i> Información Etadistica....
                            </li>
                        </ol>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    <div class="col-xs-12 col-md-6">
                         <div class="panel panel-default">
                          <div class="panel-heading lead">Clientes Ingresados </div>
                           <div class="caja">
                        	    <select onChange="mostrarResultados(this.value);">
                                <?php
                                    date_default_timezone_set("America/Lima");
                                        $fech= date("Y");
                                        $pasado =$fech - 3;
                                        $futuro = $fech + 4;
                                     
                                    for($i=$pasado; $i<$futuro; $i++){
                                        
                                        if($i == $fech){
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                         }else{
                                            echo'<option value="'.$i.'">'.$i.'</option>';
                                        }
                                     }
                                ?>
                                 </select>
                         </div>
        
                        <div class="resultados">
                            <canvas id="grafico"></canvas>
                        </div>
        
        
        
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
        
          
  
       
        <?php include_once("./link-admin-js.html") ?>
    <script src="../js/plugin/raphael.min.js"></script>
    <script src="../js/plugin/morris.min.js"></script>
    <script src="../js/plugin/morris-data.js"></script>
 
  <script>
			$(document).ready(mostrarResultados(2019));
				function mostrarResultados(year){
					$('.resultados').html('<canvas id="grafico"></canvas>');
					$.ajax({
						type:'POST',
						url: 'estadistica/EstadisticaClientes.php',
						data: 'year='+year,
						dataType:'JSON',
						success: function(response){
							var Datos = {
									labels : ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
									'Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'],
									datasets : [
										{
											//COLOR DE LAS PALABRAS
											fillColor : 'rgba(255,255,255,.9)',
										
										
											//COLOR DEL BORDE DE LAS BARRAS
											strokeColor : 'rgba(36,146,255,0.9)',
											
											//COLOR DEL "HOVER" DE LAS BARRAS
											highlightFill : 'rgba(73,206,180,0.6)',
											
											//COLOR DE "HOVER" DEL BORDE DE LAS BARRAS
											highlightStroke : 'rgba(66,196,157,0.7)',
											
											data : response
										}
									]
								}
								
							var contexto = document.getElementById('grafico').getContext('2d');
							window.Barra = new Chart(contexto).Line(Datos, { responsive : true });
							Barra.clear();
						}
					});
				return false;
				}
		</script>


    </body>
</html>