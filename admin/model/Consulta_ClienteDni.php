<?php
require_once "Conexion.php";
class Consulta_ClienteDNI {
    public function __construct(){
        
    }
   
    
    public  function Listar_ClienteDni(){
        global $Conexion ;
      
        $sql = "SELECT *,dni_cliente as dni,
                         tipo_documento as tipo,
                         concat(nombres_clientes ,', ',  apellido_pater   ,' ', apellido_mater ) as nombres,
                         concat(ciudad ,' - ', provincia ,' - ', distrito ,' - ', direccion )as lugar,
                         concat(telefono1 ,' - ', telefono2) as telefono
                        FROM tp_cliente_dni  
                        order by fecha_registro asc ";
        $query = $Conexion->query($sql);
        return $query;
        
        
    }
    
    
}



?>