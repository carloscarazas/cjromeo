<?php
require_once "../model/Cliente_dni.php";
$objClientes = new clientes();

switch($_GET["Categoria"]){
          case 'SaveOrUpdate':
             $tipodocumento= $_POST["tipo_doc"];
            $dni= $_POST["dni_reniec"];
            $nombre= $_POST["nombre_reniec"];
            $paterno= $_POST["paterno_reniec"];
            $materno= $_POST["materno_reniec"];
            $ciudad= $_POST["ciudad"];
            $provincia= $_POST["provincia"];
            $distrito= $_POST["distrito"];
            $direccion= $_POST["direccion"];
            $correo= $_POST["correo"];
            $telefono1= $_POST["telefono1"];
            $telefono2= $_POST["telefono2"];
            $fecha_reg = $_POST["fecha_reg"];
            $fecha_nac= $_POST["fecha_nac_reniec"];
            $fecha_emision= $_POST["fecha_emision_reniec"];
//        licencia 
        $licencia_lic= $_POST["numero_lic"];
            $documento_lic= $_POST["documento_lic"];
            $clase_lic= $_POST["clase_lic"];
            $categoria_lic= $_POST["categoria_lic"];
            $fecha_revalidacion= $_POST["fecha_reval_lic"];
            $direccion_lic= $_POST["direccion_lic"];
            $restrincion_lic= $_POST["restrinciones_lic"];
        
//        Tarjeta de circulacion 
        $placaT=$_POST['placaT'];
        $fabricacionT=$_POST['f_fabricacionT'];
        $asientoT=$_POST['asientoT'];
        $motorT=$_POST['motorT'];
        $ruedasT=$_POST['ejes_ruedasT'];
        $chasisT=$_POST['chasisT'];
        $modeloT=$_POST['modeloT'];
        $marcaT=$_POST['marcaT'];
        $carroceriaT=$_POST['carroceriaT'];
        $dimensionT=$_POST['dimensionT'];
        $p_netoT=$_POST['peso_netoT'];
        $p_brutoT=$_POST['peso_brutoT'];
        $c_utilT=$_POST['carga_utilT'];
        $venceT=$_POST['f_vencimientoT'];
        $dniT=$_POST['dniT'];
        
//        inspeccion tecnica vehicular
        $fecha_inspeccion=$_POST['f_inspeccion'];
        $detalle_insp=$_POST['detalle_insp'];
        
             if(empty($_POST["idcliente"])){
                
                  if(!empty($_POST["numero_lic"])){
                          if($objClientes->Registrarlicencia($licencia_lic, $documento_lic, $clase_lic, $categoria_lic, $fecha_revalidacion, $direccion_lic, $restrincion_lic)){
                              echo " Se a registrado una licencia / ";
                         }else{
                              echo " No se a regsitrado la licencia";
                           }
                      }else{
                      echo ' Licencia vacia <br>';
                  }
                 
                  if(!empty($_POST["placaT"])){
                 if($objClientes->RegistrarCirculacion($placaT, $fabricacionT, $asientoT, $motorT, $ruedasT, $chasisT, $modeloT, $marcaT, $carroceriaT, $dimensionT, $p_netoT, $p_brutoT, $c_utilT, $venceT,$dniT )){
                     echo " Tarjeta Registrado / ";
                }else{
                          echo " El Tarjeta  no ha podido ser registrado ";
                       }
                      
               
                  }else{
                      echo 'Tarjeta unica  vacia <br> ';
                  }
                 
                    if(!empty($_POST["f_inspeccion"])){
                        if($objClientes->RegistrarInspecion($placaT,$fecha_inspeccion,$detalle_insp)){
                                 echo " Inspeción resgistada / ";
                            }else{
                                 echo " No se Registrado la Inspección ";
                            }
                      }else{
                          echo 'No se registro inspección','<br> ';
                      }
                 
                 
                 
                  
                 
                 if($objClientes->Registrar($tipodocumento,$dni,$nombre, $paterno, $materno, $ciudad, $provincia, $distrito, $direccion, $correo, $telefono1, $telefono2, $fecha_reg, $fecha_nac, $fecha_emision)){
                          echo "Cliente Registrado";
                     }else{
                          echo "El Cliente no ha podido ser registrado ";
                       }
                 
                
             }else{
                     $idlicencia = $_POST["id_lic"];
                     if($objClientes->Modificarlicencia($idlicencia,$licencia_lic, $documento_lic, $clase_lic, $categoria_lic, $fecha_revalidacion, $direccion_lic, $restrincion_lic)){
                           echo "Informacion del Cliente ha sido Actulizada";
                   }else{
                           echo "  Informacion  del cliente no ha podido ser Actualizada";
                        }
                   }
        
//                 if(empty($_POST["idcliente"])){
//                     
//                      if($objClientes->Registrar($tipodocumento,$dni,$nombre, $paterno, $materno, $ciudad, $provincia, $distrito, $direccion, $correo, $telefono1, $telefono2, $fecha_reg, $fecha_nac, $fecha_emision)){
//                          echo "Cliente Registrado";
//                     }else{
//                          echo "El Cliente no ha podido ser registrado";
//                       }
//					 
//                
//                 
//                 }else{
//                     $idcliente = $_POST["idcliente"];
//                     if($objClientes->Modificar($idcliente,$tipodocumento,$dni,$nombre, $paterno, $materno, $ciudad, $provincia, $distrito, $direccion, $correo, $telefono1,$telefono2,$fecha_reg, $fecha_nac, $fecha_emision)){
//                           echo "Informacion del Cliente ha sido Actulizada";
//                   }else{
//                           echo "  Informacion  del cliente no ha podido ser Actualizada";
//                        }
//                   }
//          
           break;
        
      
           case "delete":

                $id = $_POST["id"];
                $results= $objClientes->Eliminar($id);
                if($results){
                      echo"Eliminado Exitosamente";
                }else{
                  echo"No fue Eliminado ";
                }                 
            break;
       
           case "lista":
           $query_Tipo = $objClientes->Listar(); 
           $data = Array();
           $i = 1;
           while($reg =$query_Tipo->fetch_object()){
                   $data[] = array(
                      "id"=>$i,
                    "1"=>$reg->dni,
                    "2"=>$reg->nombre,
                    "3"=>$reg->detalle,
                    "4"=>$reg->fecha,
                    "5"=>'<button class="btn btn-primary" data-toggle="tooltip" title="Agregar Licencia" onclick="agregar_licencia(\''.$reg->dni.'\',\''.$reg->direccion.'\')"><i class="fa fa-upload" aria-hidden="true"></i></button>',
                    "6"=>'<button class="btn btn-success" data-toggle="tooltip" title="Ver Información" onclick="ver_cliente(\''.$reg->tipo_documento.'\',\''.$reg->dni.'\',\''.$reg->nombres_clientes.'\',\''.$reg->apellido_pater.'\',\''.$reg->apellido_mater.'\',\''.$reg->ciudad.'\',\''.$reg->provincia.'\',\''.$reg->distrito.'\',\''.$reg->direccion.'\',\''.$reg->correo.'\',\''.$reg->telefono1.'\',\''.$reg->telefono2.'\' ,\''.$reg->fecha_registro.'\',\''.$reg->fecha_nac.'\',\''.$reg->fecha_emision.'\')"><i class="fa fa-eye" aria-hidden="true"></i></button>&nbsp;'.'<button class="btn btn-warning" data-toggle="tooltip" title="Modificar"   onclick="cargarDataCliente('.$reg->idcliente.',\''.$reg->tipo_documento.'\','.$reg->dni.',\''.$reg->nombres_clientes.'\',\''.$reg->apellido_pater.'\',\''.$reg->apellido_mater.'\',\''.$reg->ciudad.'\',\''.$reg->provincia.'\',\''.$reg->distrito.'\',\''.$reg->direccion.'\',\''.$reg->correo.'\',\''.$reg->telefono1.'\',\''.$reg->telefono2.'\' ,\''.$reg->fecha_registro.'\',\''.$reg->fecha_nac.'\',\''.$reg->fecha_emision.'\' ) "><i class="fa fa-pencil"></i> </button>');
                    $i++;      
           }
        
           $results = array(
               "sEcho" => 1,
               "iTotalRecords"=> count($data),
               "iTotalDisplayRecords"=> count($data),
               "aaData"=>$data);
               echo json_encode($results);

               break;

            case "comboDocumento":
            require_once "../model/Tipo_Documento.php";
            $objcmbTipo_doc = new cmbTipo_doc();
            $query_Documento = $objcmbTipo_doc->combo_de_documento();
            while($reg = $query_Documento->fetch_object()){
                
                
                   echo'<option title="'.$reg->descripcion_doc.'" value= "'.$reg->nombre_tipo_doc.' " >'.$reg->nombre_tipo_doc.'</option>';
            }
            break;
            case "comboLicencia_Categoria":
            require_once "../model/cmbClase_Categoria_Licencia.php";
            $objcmbLicenciaCategoria = new cmbLicenciaCategoria();
            $query_clase_categoria = $objcmbLicenciaCategoria->cmbLicencia_Categoria();
            while($reg = $query_clase_categoria->fetch_object()){
                
                
                   echo'<option title="'.$reg->descripcion_categoria.'" value="'.$reg->nombre_categoria.'">'.$reg->nombre_categoria.'</option>';
            }
            break;
            case "comboLicencia_Clase":
            require_once "../model/cmbClase_Licencia.php";
            $objcmbLicenciaClase = new cmbLicenciaClase();
            $query_clase = $objcmbLicenciaClase->cmbLicencia_Clase();
            while($reg = $query_clase->fetch_object()){
                   echo'<option title="'.$reg->descripcion_clase.'" value="'.$reg->nombre_clase.'">'.$reg->nombre_clase.'</option>';
            }
            break;       
}
?>