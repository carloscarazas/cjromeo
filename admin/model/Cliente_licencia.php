<?php
require_once "Conexion.php";

class Licencia{

    public function __construct(){
    }
    
   public function Registrar($items2, $items3, $items4, $categoria_lic, $fecha_revalidacion, $direccion_lic, $restrincion_lic){

          global $Conexion;
          $sw =true;
          try{
  
       
       	while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
//				    $item1 = current($items1);
				    $item2 = current($items2);
				    $item3 = current($items3);
				    $item4 = current($items4);
                    $categoria_lic = current($categoria_lic);
                    $fecha_revalidacion= current($fecha_revalidacion);
                    $direccion_lic= current($direccion_lic);
                    $restrincion_lic=current($restrincion_lic);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
//				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $licencia=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $dni=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $clase=(( $item4 !== false) ? $item4 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='("","'.$licencia.'","'.$dni.'","'.$clase.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO tp_licencia_conductor (id_licencia,nro_licencia, dni_lic, clase_lic) 
					VALUES $valoresQ";

					
					$sqlRes=$Conexion->query($sql) or mysql_error();

				    
				    // Up! Next Value
//				    $item1 = next( $items1 );
				    $item2 = next( $items2 );
				    $item3 = next( $items3 );
				    $item4 = next( $items4 );
				    
				    // Check terminator
//				    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
				    if($item2 === false && $item3 === false && $item4 === false) break;
    
				}
              if($Conexion !=null){
                  $Conexion->close();
              }
          }catch(Exception $e){
              $Conexion->roollback();
          }
          return $sw;
    }    
}
?> 