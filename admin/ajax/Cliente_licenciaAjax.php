<?php
require_once "../model/Cliente_licencia.php";
$objLicencia = new Licencia();
switch($_GET["licencia"]){

          case 'SaveOrUpdateLicencia':
        
             $items2= $_POST["numero_lic"];
        
            
				 
            $items3= $_POST["documento_lic"];
            $items4= $_POST["clase_lic"];
            $categoria_lic= $_POST["categoria_lic"];
           
            $fecha_revalidacion= $_POST["fecha_reval_lic"];
            $direccion_lic= $_POST["direccion_lic"];
            $restrincion_lic= $_POST["restrinciones_lic"];
        
        
        
                 if(empty($_POST["id_lic"])){
                      if($objLicencia->Registrar($items2, $items3, $items4, $categoria_lic, $fecha_revalidacion, $direccion_lic, $restrincion_lic
                          )){
                          echo "Se a regsitrado una licencia";
                     }else{
                          echo " No se a regsitrado la licencia";
                       }
                }else{
                     $idlicencia = $_POST["id_lic"];
                     if($objLicencia->Modificar($idlicencia,$items2, $items3, $items4, $categoria_lic, $fecha_revalidacion, $direccion_lic, $restrincion_lic)){
                           echo "Informacion del Cliente ha sido Actulizada";
                   }else{
                           echo "  Informacion  del cliente no ha podido ser Actualizada";
                        }
                   }
          
        
        
        
        
                    break;
        
      
                                                       
}



?>