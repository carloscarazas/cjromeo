<?php 
require_once "../model/Usuario.php";

$objUsuario = new Usuario();

switch($_GET["usuario"]){

//          case 'SaveOrUpdate':
//           
//            $nombre= $_POST["txtnombre"];
//            $apellido = $_POST["txtapellido"];
//            $t_documento= $_POST["txttipo_documento"];
//            $n_documento= $_POST["txtnum_documento"];
//            $direccion = $_POST["txtdireccion"];
//            $tel= $_POST["txttelefono"];
//            $email = $_POST["txtemail"];
//            $fecha = $_POST["txtfecha_nac"];
//            $estado = $_POST["txtestado"];
//            $login = $_POST["txtlogin"];
//        
//                
//            $clave = $_POST["txtclave"];
//            
//        
//           
//                 if(empty($_POST["txtIdArticulo"])){
//                     
//                      if($objUsuario->Registrar($nombre,
//												$apellido,
//												$t_documento,
//												$n_documento,
//												$direccion,
//												$tel,
//												$email,
//												$fecha,
//												$estado,
//												$login,
//												$clave)){
//                          echo "Usuario Registrado";
//                     }else{
//                          echo "Usuario no ha podido ser  registrado";
//                       }
//                }else{
//                     $empleado = $_POST["txtIdArticulo"];
//                     if($objUsuario->Modificar($empleado,$nombre,
//                          $apellido,$t_documento,$n_documento,$direccion,$tel,$email,$fecha,$estado,$login,$clave)){
//                           echo "Informacion del Usuario ha sido Actulizada";
//                   }else{
//                           echo "  Informacion del Usuario no ha podido ser Actualizada";
//                        }
//                   }
//          
//           break;
//   
//           case "delete":
//
//                $id = $_POST["id"];
//                $results= $objUsuario->Eliminar($id);
//                if($results){
//                      echo"Eliminado Exitosamente";
//                }else{
//                  echo"No fue Eliminado ";
//                }                 
//            break;
       
           case "list":
           $query_Tipo = $objUsuario->Listar();
           $data = Array();
           $i = 1;
           while($reg =$query_Tipo->fetch_object()){
                   $data[] = array(
                    "id"=>$i,
                    "1"=>$reg->tipo_usuario,
                    "2"=>$reg->empleado,
                    "3"=>$reg->tipo_documento ,
                    "4"=>$reg->num_documento,
                    "5"=>$reg->direccion,
                    "6"=>$reg->telefono,
                    "7"=>$reg->email,
                    "8"=>$reg->fecha_nacimiento,
                    "9"=>$reg->login,
                    "10"=>$reg->clave,
                    "11"=>$reg->estadoempleado,
					"12"=>'<button class="btn btn-warning" data-toggle="tooltip" title="Modificar"
						onclick="cargarDataArticulos(
                        '.$reg->idempleado.',
						\''.$reg->nombre.'\' ,
						\''.$reg->apellidos.'\' ,
						\''.$reg->tipo_documento.'\' ,
						\''.$reg->num_documento.'\' ,
						\''.$reg->direccion.'\' ,
						\''.$reg->telefono.'\' ,
						\''.$reg->email.'\' ,
						\''.$reg->fecha_nacimiento.'\' ,
						\''.$reg->login.'\' ,
						\''.$reg->clave.'\' ,
						\''.$reg->estadoempleado.'\',\''.$reg->tipo_usuario.'\') "><i class="fa fa-pencil"></i> </button>&nbsp;'.'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarArticulo('.$reg->idempleado.')"><i class="fa fa-trash"></i> </button>' 
					   
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
		
            /*case "listUM":
            require_once "../model/cmbPermisos.php";
            $objcmbusuario = new cmbusuario();
            $query_Categoria = $objcmbusuario->ListarUM();
            while($reg = $query_Categoria->fetch_object()){
                
                   echo'<option value=' .$reg->idusuario. '>' .$reg->tipo_usuario. '</option>';
            }
            break; */
}
?>
