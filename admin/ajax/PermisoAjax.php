<?php 
require_once "../model/Permiso.php";

$objPermiso = new Permiso();

switch($_GET["permiso"]){

          case 'SaveOrUpdate':
           
            $nombre= $_POST["txtnombre"];
		
		   	$empleado = $_POST["txtusuario"];
            $manto = $_POST["txtmanto"];
            $almacen= $_POST["txtalmacen"];
           
            $consulta= $_POST["txtconsultacompra"];
            $usuarios= $_POST["txtconsultaventas"];
            $estado= $_POST["txtestado"];
            	$fecha = date("Y-m-d");
         
        
           
                 if(empty($_POST["txtIdArticulo"])){
                     
                      if($objPermiso->Registrar( $empleado, $nombre, $fecha, $manto, $almacen, $consulta, $usuarios,$estado)){
                          echo "Usuario Registrado";
                     }else{
                          echo "Usuario no ha podido ser  registrado";
                       }
                }else{
                     $usuario= $_POST["txtIdArticulo"];
                     if($objPermiso->Modificar($usuario,$nombre, $empleado,$manto, $almacen, $consulta,$usuarios,$estado)){
                           echo "Informacion del Usuario ha sido Actulizada";
                   }else{
                           echo "  Informacion del Usuario no ha podido ser Actualizada";
                        }
                   }
          
           break;
   
           case "delete":

                $id = $_POST["id"];
                $results= $objPermiso->Eliminar($id);
                if($results){
                      echo"Eliminado Exitosamente";
                }else{
                  echo"No fue Eliminado ";
                }                 
            break;
       
           case "list":
           $query_Tipo = $objPermiso->Listar();
           $data = Array();
           $i = 1;
           while($reg =$query_Tipo->fetch_object()){
                   $data[] = array(
                    "id"=>$i,
                    "1"=>$reg->empleado,
                    "2"=>$reg->tipo_usuario,
                    "3"=>$reg->fecha_registro ,
                    "4"=>$reg->mnu_mantenimiento,
                    "5"=>$reg->mnu_almacen,
                  
                    "6"=>$reg->mnu_consultas,
                    "7"=>$reg->mnu_usuarios,
                    "8"=>$reg->estadousuario,
					"9"=>'<button class="btn btn-warning" data-toggle="tooltip" title="Modificar"
						onclick="cargarDataArticulos('.$reg->idusuario.',
						\''.$reg->tipo_usuario.'\' ,
						\''.$reg->fecha_registro.'\' ,
						\''.$reg->mnu_mantenimiento.'\' ,
						\''.$reg->mnu_almacen.'\' ,
					
						\''.$reg->mnu_consultas.'\' ,
						\''.$reg->mnu_usuarios.'\' ,
						\''.$reg->estadousuario.'\', 
						\''.$reg->idempleado.'\' 
						) "><i class="fa fa-pencil"></i> </button>&nbsp;'.'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarArticulo('.$reg->idusuario.')"><i class="fa fa-trash"></i> </button>' 
					   
				  /*"5"=>'<button class="btn btn-success" data-toggle="tooltip" title="Ver Imagen"
                          onclick="verImagen(\'./'.$reg->imagen.'\',\''.$reg->nombre.'\')">
                          <i class="fa fa-file-image-o"></i> </button>',*/
                     );
                    
                    $i++;      
           }
        
           $results = array(
               "sEcho" => 1,
               "iTotalRecords"=> count($data),
               "iTotalDisplayRecords"=> count($data),
               "aaData"=>$data);
               echo json_encode($results);

               break;
		
            case "listUM":
            require_once "../model/cmbPermisos.php";
            $objcmbempleado = new cmbempleado();
            $query_Categoria = $objcmbempleado->ListarUM();
            while($reg = $query_Categoria->fetch_object()){
                
                   echo'<option value=' .$reg->idempleado. '> ' .$reg->empleado.'(' .$reg->num_documento. ')</option>';
            }
            break; 
}
?>
