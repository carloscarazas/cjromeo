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
                                <i class="fa fa-address" aria-hidden="true"></i> Buscar al clientes de con DNI
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
                                   <form role="form" class="" action="Consulta_clientePersonal.php"  name="frmConsulta"  method="get">
                                     <div class="row">
                                        
                                               <div class="col-sm-4">
                                                    <label for="">Inicio </label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="Dni_clientePersonal"  placeholder="Bucar con DNI"name="Dni_clientePersonal" required>
                                                    </div>

                                                 </div>
                                                  
                                                
                                         
                                      
                                        <div class="col-xs-12">
                                           
                                             <button type="submit" id="busca_ClientePersonal" name="busca_ClientePersonal" class="btn btn-success">Buscar <i class="fa fa-search"></i></button>
                                             
                                        </div>
                                                 
                        
                                        
                                         
                                     </div>
                                      
                                       
                                   </form>
                               </div> 
                                
                            </div>
                        </div>
                         <div class="row">
                            
                            
                                <?php
                                   
                                      if(isset($_GET['busca_ClientePersonal'] )){ 
                                         
                                   $dni = $_GET['Dni_clientePersonal'];
                                  
                                       $sql="SELECT * FROM tp_cliente_dni  
                                       where dni_cliente ='$dni' ";
                            
                                    $result = $Conexion->query($sql);
                                            while($row = mysqli_fetch_array($result)) { 
                                        ?>
                                         <div class="panel panel-default">
                                              <div class="panel-heading lead">Información personal</div>
                                              <div class="panel-body">
                                                  <div class="col-xs-12 ">
                                                  <div class="row">
                                                      <div class="col-xs-6"> 
                                                          <label for="" class="lead "><b>Nombres </b>:</label>
                                                          <span class="lead"><?php  echo $row['nombres_clientes'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-6"> 
                                                          <label for="" class="lead "><b>Apellidos </b>:</label>
                                                          <span class="lead"> <?php  echo $row['apellido_pater']." ".$row['apellido_mater'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-6"> <label for="" class="lead ">
                                                          <b>Fecha de  Nacimiento </b>:</label>
                                                          <span class="lead">    <?php  echo $row['fecha_nac'] ; ?></span>
                                                      </div> 
                                                         <div class="col-xs-6"> <label for="" class="lead ">
                                                          <b>Caduca DNI </b>:</label>
                                                          <span class="lead">    <?php  echo $row['fecha_emision'] ; ?></span>
                                                      </div>
                                                         <div class="col-xs-3"> <label for="" class="lead ">
                                                          <b>Ciudad </b>:</label>
                                                          <span class="lead">    <?php  echo $row['ciudad'] ; ?></span>
                                                      </div>
                                                      <div class="col-xs-3"> <label for="" class="lead ">
                                                          <b>Provincia </b>:</label>
                                                          <span class="lead">    <?php  echo $row['provincia'] ; ?></span>
                                                      </div>
                                                      <div class="col-xs-3"> <label for="" class="lead ">
                                                          <b>Distrito </b>:</label>
                                                          <span class="lead">    <?php  echo $row['distrito']; ?></span>
                                                      </div>
                                                      <div class="col-xs-6"> 
                                                          <label for="" class="lead ">
                                                          <b>Dirección 1 </b>:</label>
                                                          <span class="lead">    <?php  echo $row['direccion'] ; ?></span>
                                                      </div>
                                                      <div class="col-xs-6"> 
                                                          <label for="" class="lead "><b>Teléfonos </b>:</label><span class="lead"> <?php 
                                                if(!empty($row['correo'] )){echo $row['telefono1']."  ".$row['telefono2'] ;}else{ echo 'NO';} ?></span>
                                                      </div>
                                                      <div class="col-xs-6"> <label for="" class="lead "><b>Correo </b>:</label><span class="lead">    <?php if(!empty($row['correo'] )){echo $row['correo'] ;}else{ echo 'NO';}   ?></span>
                                                      </div>
                                                      <div class="col-xs-6"> <label for="" class="lead "><b>Fecha de Registro</b>:</label><span class="lead">    <?php  echo $row['fecha_registro'] ; ?></span>
                                                      </div>
                                                  </div>
                                                   <div class="panel panel-default">
                                              <div class="panel-heading lead">Licencia</div>
                                                   <div class="panel-body">
                                                  
                                            <?php
//                                              CONSULTA DE  LICENCIA 
                                                if(!empty($row['dni_cliente'])){
                                                    
                                                    $buscalicencia=$row['dni_cliente'];
                                                    $licencia="select * from tp_licencia_conductor where dni_lic= '$buscalicencia' ";
                                                    $mostrar=$Conexion->query($licencia);
                                                   if(mysqli_num_rows($mostrar)>0){
                                                    while($row2=mysqli_fetch_array($mostrar)){
                                                 
                                               ?>
                                                  <div class="row">
                                                    <div class="col-xs-5">
                                                      <label for="" class="lead "><b>Nª Licencia</b>:</label>
                                                      <span class="lead"><?php  echo $row2['nro_licencia'] ;?> </span>
                                                      </div> 
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Clase</b>:</label>
                                                      <span class="lead"><?php  echo $row2['clase_lic'] ;?> </span>
                                                      </div> 
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Categoria</b>:</label>
                                                      <span class="lead"><?php  echo $row2['categoria_lic'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-4">
                                                      <label for="" class="lead "><b>Fecha vencimiento</b>:</label>
                                                      <span class="lead"><?php  echo $row2['fecha_revalidacion_lic'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-6">
                                                      <label for="" class="lead "><b>Docmicilio</b>:</label>
                                                      <span class="lead"><?php  echo $row2['domicilio_lic'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-4">
                                                      <label for="" class="lead "><b>Restrinción</b>:</label>
                                                      <span class="lead"><?php  echo $row2['restrinciones_lic'] ;?> </span>
                                                      </div>
                                                  </div>
                                                <?php
                                                        
                                                        
                                                    }
                                                   }else{echo '<span class="lead label-danger">No existe licencia </span>';}
                                                }else{
                                                    echo"No exíste licencia";
                                                }
                                             ?>
                                                       </div>
                                                      </div>
                                             <div class="panel panel-default">
                                                  <div class="panel-heading lead">Tarjeta Unica de Circulación</div>
                                                   <div class="panel-body">
                                                  
                                            <?php
//                                              CONSULTA DE TARJETA UNICA DE CIRCULACIÓN
                                                if(!empty($row['dni_cliente'])){
                                                    
                                                    $buscadniCirculacion=$row['dni_cliente'];
                                                    $tarjeta="select * from tp_tarjeta_circulacion where dni= '$buscadniCirculacion' ";
                                                    $mostrarTarjeta=$Conexion->query($tarjeta);
                                                   if(mysqli_num_rows($mostrarTarjeta)>0){
                                                    while($row3=mysqli_fetch_array($mostrarTarjeta)){
                                                 
                                               ?>
                                                  <div class="row">
                                                    <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Nª Placa </b>:</label>
                                                      <span class="lead"><?php  echo $row3['placa'] ;?> </span>
                                                      </div> 
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Año de Fabricación</b>:</label>
                                                      <span class="lead"><?php  echo $row3['ano_de_fabr'] ;?> </span>
                                                      </div> 
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Nª Asientos</b>:</label>
                                                      <span class="lead"><?php  echo $row3['n_asientos'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Nª Motor</b>:</label>
                                                      <span class="lead"><?php  echo $row3['n_motor'] ;?> </span>
                                                      </div>
                                                 </div>
                                                  <div class="row">
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Nª Ejes</b>:</label>
                                                      <span class="lead"><?php  echo $row3['ejes'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Nª Series Chasis</b>:</label>
                                                      <span class="lead"><?php  echo $row3['n_serie_chasis'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Marca del Vehículo</b>:</label>
                                                      <span class="lead"><?php  echo $row3['marca_vehi'] ;?> </span>
                                                      </div>
                                                       <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Modelo del vehículo</b>:</label>
                                                      <span class="lead"><?php  echo $row3['modelo_vehi'] ;?> </span>
                                                      </div>
                                                 </div>
                                                  <div class="row">
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Carroceria</b>:</label>
                                                      <span class="lead"><?php  echo $row3['carroceria'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Medidas del Vehículo</b>:</label>
                                                      <span class="lead"><?php  echo $row3['largo_mt'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Peso Neto</b>:</label>
                                                      <span class="lead"><?php  echo $row3['peso_neto'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-3">
                                                      <label for="" class="lead "><b>Peso Bruto</b>:</label>
                                                      <span class="lead"><?php  echo $row3['peso_bruto'] ;?> </span>
                                                      </div>
                                                </div>   
                                                  <div class="row">  
                                                      <div class="col-xs-4">
                                                      <label for="" class="lead "><b>Carga Util</b>:</label>
                                                      <span class="lead"><?php  echo $row3['carga_util'] ;?> </span>
                                                      </div>
                                                      <div class="col-xs-4">
                                                      <label for="" class="lead "><b>Fecha Vencimiento Tarjeta</b>:</label>
                                                      <span class="lead"><?php  echo $row3['fecha_vencimiento_tarjeta'] ;?> </span>
                                                      </div>
                                                  </div> 
                                                  <div class="row">
                                                      <div class="col-xs-12">
                                                          <div class="panel panel-default">
                                                             <div class="panel-heading lead">Inspección Técnica</div>
                                                              <div class="panel-body">
                                                                 <?php
                                                                    if(!empty($row3['placa'])){ 
                                                                     $inspecion=$row3['placa'];
                                                                     $tarjetaInsp="select * from tp_inspeccion_tecnica where placa_insp='$inspecion' ";
                                                                        $mostrarInsp=$Conexion->query($tarjetaInsp);
                                                                    if(mysqli_num_rows($mostrarInsp)>0){
                                                                    while($row4=mysqli_fetch_array($mostrarInsp)){
                                                                                
                                                                    ?>
                                                                  <div class="row">
                                                                      <div class="col-xs-6">
                                                                      <label for="" class="lead ">
                                                                      <b>Fecha de Vencimiento Inspección</b>:</label>
                                                                      <span class="lead"><?php  echo $row4['fecha_de_proxima_insp'] ;?> </span>
                                                                      </div>
                                                                      <div class="col-xs-6">
                                                                      <label for="" class="lead ">
                                                                      <b>Detalle de Inspección</b>:</label>
                                                                      <span class="lead"><?php  echo $row4['detalle_insp'] ;?> </span>
                                                                      
                                                                      </div>
                                                                  </div>
                                                                  <?php 
                                                                            }   
                                                                        }else{echo '<span class="lead label-danger">No existe TInspección </span>';}
                                                                    }else{
                                                                            echo"No exíste Inspección";
                                                                        }
                                                                    ?>
                                                                  
                                                              </div>
                                                          
                                                          
                                                          </div>
                                                          
                                                      </div>
                                                  </div> 
                                                  
                                                <?php  
                                                    }
                                                   }else{echo '<span class="lead label-danger">No existe licencia </span>';}
                                                }else{
                                                    echo"No exíste licencia";
                                                }
                                             ?>
                                                       </div>
                                                      </div>
                                                   
                                                    </div>
                                             </div>
                                        </div>
                                          
                                        <?php 
                                            } 
                                     
                                         mysqli_close($Conexion);
                                      }
                                 ?>
                            
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
<!--
    <script src="../js/plugin/raphael.min.js"></script>
    <script src="../js/plugin/morris.min.js"></script>
    <script src="../js/plugin/morris-data.js"></script>
-->
 
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