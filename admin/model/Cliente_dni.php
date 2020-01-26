<?php
require_once "Conexion.php";

class clientes{
    private $opciones = [PDO::ATTR_CASE => PDO::CASE_LOWER, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS =>PDO::NULL_EMPTY_STRING, PDO:: ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ];

    public function __construct(){
    }
     public function Registrarlicencia($licencia_lic, $documento_lic, $clase_lic, $categoria_lic, $fecha_revalidacion, $direccion_lic, $restrincion_lic){

          global $Conexion;
          $sw =true;
  try{
      
  
       
       	while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
//				    $item1 = current($items1);
				    $item2 = current($licencia_lic);
				    $item3 = current($documento_lic);
				    $item4 = current($clase_lic);
                    $item5 = current($categoria_lic);
                    $item6= current($fecha_revalidacion);
                    $item7= current($direccion_lic);
                    $item8=current($restrincion_lic);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
//				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $licencia=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $dni=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $clase=(( $item4 !== false) ? $item4 : ", &nbsp;");
				    $categoria=(( $item5 !== false) ? $item5 : ", &nbsp;");
				    $vence=(( $item6 !== false) ? $item6 : ", &nbsp;");
				    $domicilio=(( $item7 !== false) ? $item7 : ", &nbsp;");
				    $restrin=(( $item8 !== false) ? $item8 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='("","'.$licencia.'","'.$dni.'","'.$clase.'","'.$categoria.'","'.$vence.'","'.$domicilio.'","'.$restrin.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO tp_licencia_conductor (id_licencia,nro_licencia, dni_lic, clase_lic,categoria_lic,fecha_revalidacion_lic,domicilio_lic,restrinciones_lic) 
					VALUES $valoresQ";

					
					$sqlRes=$Conexion->query($sql) or mysql_error();

				    
				    // Up! Next Value
//				    $item1 = next( $items1 );
				    $item2 = next( $licencia_lic );
				    $item3 = next( $documento_lic );
				    $item4 = next( $clase_lic );
				    $item5 = next( $categoria_lic );
				    $item6 = next( $fecha_revalidacion );
				    $item7 = next( $direccion_lic );
				    $item8 = next( $restrincion_lic );
				    
				    // Check terminator
//				    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
				    if($item2 === false && $item3 === false && $item4 === false && $item5 === false && $item6 === false && $item7 === false && $item8 === false) break;
    
				}
      }catch(Exception $e){
              $Conexion->roollback();
          }    
          return $sw;
    }    
    public function RegistrarCirculacion($placaT, $fabricacionT, $asientoT, $motorT, $ruedasT, $chasisT, $modeloT, $marcaT, $carroceriaT, $dimensionT, $p_netoT, $p_brutoT, $c_utilT, $venceT,$dniT){
        global $Conexion;
          $sw =true;
    try{
       
       	while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
//				    $item1 = current($items1);
				    $item2 = current($placaT);
				    $item3 = current($fabricacionT);
				    $item4 = current($asientoT);
                    $item5 = current($motorT);
                    $item6 = current($ruedasT);
                    $item7 = current($chasisT);
                    $item8 = current($modeloT);
                    $item9 = current($marcaT);
                    $item10 = current($carroceriaT);
                    $item11 = current($dimensionT);
                    $item12 = current($p_netoT);
                    $item13 = current($p_brutoT);
                    $item14 = current($c_utilT);
                    $item15 = current($venceT);
                    $item16 = current($dniT);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
//				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $placa=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $ano=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $asiento=(( $item4 !== false) ? $item4 : ", &nbsp;");
				    $motor=(( $item5 !== false) ? $item5 : ", &nbsp;");
				    $ruedas=(( $item6 !== false) ? $item6 : ", &nbsp;");
				    $chasis=(( $item7 !== false) ? $item7 : ", &nbsp;");
				    $modelo=(( $item8 !== false) ? $item8 : ", &nbsp;");
				    $marca=(( $item9 !== false) ? $item9 : ", &nbsp;");
				    $carroceria=(($item10 !== false) ? $item10 : ", &nbsp;");
				    $dimension=(( $item11 !== false) ? $item11 : ", &nbsp;");
				    $neto=(( $item12 !== false) ? $item12 : ", &nbsp;");
				    $bruto=(( $item13 !== false) ? $item13 : ", &nbsp;");
				    $carga=(( $item14 !== false) ? $item14 : ", &nbsp;");
				    $vence1=(( $item15 !== false) ? $item15 : ", &nbsp;");
				    $cliente=(( $item16 !== false) ? $item16 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores1='("","'.$placa.'","'.$ano.'","'.$asiento.'","'.$motor.'","'.$ruedas.'","'.$chasis.'","'.$modelo.'","'.$marca.'","'.$carroceria.'", "'.$dimension.'","'.$neto.'","'.$bruto.'","'.$carga.'","'.$vence1.'","'.$cliente.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ1= substr($valores1, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql1 = "INSERT INTO tp_tarjeta_circulacion (id_tarjeta_circ, placa, ano_de_fabr, n_asientos,  n_motor, ejes, n_serie_chasis, modelo_vehi, marca_vehi, carroceria, largo_mt, peso_neto, peso_bruto, carga_util, fecha_vencimiento_tarjeta,dni )VALUES $valoresQ1";

					$sqlRes1= $Conexion->query($sql1);

				    // Up! Next Value
//				    $item1 = next( $items1 );
				    $item2 = next( $placaT );
				    $item3 = next( $fabricacionT );
				    $item4 = next( $asientoT );
				    $item5 = next( $motorT );
				    $item6 = next( $ruedasT );
				    $item7 = next( $chasisT );
				    $item8 = next( $modeloT );
				    $item9 = next( $marcaT );
				    $item10 = next( $carroceriaT );
				    $item11 = next( $dimensionT );
				    $item12 = next( $p_netoT );
				    $item13 = next( $p_brutoT );
				    $item14 = next( $c_utilT );
				    $item15 = next( $venceT );
				    $item16 = next( $dniT );
				    
				    // Check terminator
//				    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
				    if($item2 === false && $item3 === false && $item4 === false && $item5 === false && $item6 === false && $item7 === false &&
                       $item8 === false && $item9 === false && $item10 === false && $item11 === false && $item12 === false && $item13 === false && $item14 === false && $item15 === false && $item16 === false)break;
    
				}
             }catch(Exception $e){
              $Conexion->roollback();
          }
          return $sqlRes1;
//          return $sw;
        
    }
    
    public function RegistrarInspecion($placaT,$fecha_inspeccion,$detalle_insp){
          global $Conexion;
          $sw =true;
    try{
       
       	while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
//				    $item1 = current($items1);
				    $item2 = current($placaT);
				    $item3 = current($fecha_inspeccion);
				    $item4 = current($detalle_insp);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
//				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $placa=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $fecha_insp=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $detalle=(( $item4 !== false) ? $item4 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='("","'.$placa.'","'.$fecha_insp.'","'.$detalle.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO tp_inspeccion_tecnica (id_inspeccion, placa_insp, fecha_de_proxima_insp,detalle_insp) 
					VALUES $valoresQ";

					
					$sqlRes=$Conexion->query($sql) or mysql_error();

				    
				    // Up! Next Value
//				    $item1 = next( $items1 );
				    $item2 = next( $placaT ); 
				    $item3 = next( $fecha_inspeccion );
				    $item4 = next( $detalle_insp );
				 
				    
				    // Check terminator
//				    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
				    if($item2 === false && $item3 === false && $item4 === false ) break;
    
				}
                }catch(Exception $e){
              $Conexion->roollback();
          }
          return $sw;
    }
      public function Registrar($tipodocumento, $dni, $nombre, $paterno, $materno, $ciudad, $provincia, $distrito, $direccion, $correo, $telefono1,$telefono2,$fecha_reg, $fecha_nac, $fecha_emision){

          global $Conexion;
          $sw =true;
          try{
             
              $sql_articulo ="INSERT INTO tp_cliente_dni (idcliente,
                                                       tipo_documento,
                                                       dni_cliente,
                                                       nombres_clientes,
                                                       apellido_pater,
                                                       apellido_mater,
                                                       ciudad,
                                                       provincia,
                                                       distrito,
                                                       direccion,
                                                       correo,
                                                       telefono1,
                                                       telefono2,
                                                       fecha_registro,
                                                       fecha_nac,
                                                       fecha_emision
                                                       
                                                      
                                                       )
                                          VALUES('','$tipodocumento','$dni','$nombre', '$paterno', '$materno', '$ciudad', '$provincia', '$distrito', '$direccion', '$correo', '$telefono1','$telefono2', '$fecha_reg', '$fecha_nac', '$fecha_emision')";
              $Conexion->query($sql_articulo);
              if($Conexion !=null){
                  $Conexion->close();
              }
          }catch(Exception $e){
              $Conexion->roollback();
          }
          return $sw;
    }
   public function Modificar($idcliente, $tipodocumento, $dni,$nombre, $paterno, $materno, $ciudad, $provincia, $distrito, $direccion, $correo, $telefono1, $telefono2, $fecha_reg, $fecha_nac, $fecha_emision){

           global $Conexion;
           $sql = "UPDATE tp_cliente_dni   SET         tipo_documento='$tipodocumento',  
                                                       dni_cliente='$dni',
                                                       nombres_clientes='$nombre',
                                                       apellido_pater='$paterno',
                                                       apellido_mater='$materno',
                                                       ciudad='$ciudad',
                                                       provincia='$provincia',
                                                       distrito='$distrito',
                                                       direccion='$direccion',
                                                       correo='$correo',
                                                       telefono1='$telefono1',
                                                       telefono2='$telefono2',
                                                       fecha_registro='$fecha_reg',
                                                       fecha_nac='$fecha_nac',
                                                       fecha_emision='$fecha_emision'
                                            WHERE idcliente = $idcliente";
            $query=$Conexion->query($sql);
            return $query;
    }
   
 public function Eliminar ($id){
        global $Conexion;
        $sql="DELETE FROM tp_cliente_dni  where Id_Categoria = '$id' ";
        $query=$Conexion->query($sql);
        return $query;
    }
      /*public function Eliminar ($id){
        global $Conexion;
        $sql="UPDATE cl_categoria set estado = 'A' where Id_Categoria = $id";
        $query=$Conexion->query($sql);
        return $query;
    }*/
    
    public function Listar(){
        global $Conexion;
        date_default_timezone_set("America/Lima");
       $hoy= date("Y/m/d"); 

   
        $sql = "SELECT *,dni_cliente as dni,
                        concat(nombres_clientes,', ',apellido_pater,' ',apellido_mater) as nombre,
                        telefono1 as  detalle,
                        fecha_registro as fecha
                      
                        FROM tp_cliente_dni  
                        where fecha_registro='".$hoy."' order by fecha_registro desc ";
        $query = $Conexion->query($sql);
        return $query;
    }
    /*public function Listar(){
        global $Conexion;
        $sql = "select p.*, sc.nombre_sub_cat as nombre_sub
        from productos p inner join sub_categoria sc on p.id_sub_categoria=sc.id_sub_categoria where p.estado = 'A' order by p.descripcion  asc";
        $query = $Conexion->query($sql);
        return $query;
    }*/
    
}



?>