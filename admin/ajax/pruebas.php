<?php

require_once "./model/Conexion.php";

            <?php

				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
				


//				$items1 = ($_POST['idalumno']);
				$items2 = ($_POST['documento_lic']);
				$items3 = ($_POST['numero_lic']);
				$items4 = ($_POST['clase_lic']);
				 
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
//				    $item1 = current($items1);
				    $item2 = current($items2);
				    $item3 = current($items3);
				    $item4 = current($items4);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
//				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $carr=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='("","'.$nom.'","'.$carr.'","'.$gru.'"),';

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
		
			

			?>
?>