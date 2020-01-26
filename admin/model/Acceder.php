<?php

require "Conexion.php";
class acceder{
	
	public function __construct(){
		}
		
		public function Ingresar_Sistema ($user, $pass){
			global $Conexion ;
			$sql = "select 
                    u.*, concat(e.nombre, ' ', e.apellidos) as empleado, 
                    e.*, e.estado as superadmin
			 from tp_usuario u 
                INNER JOIN tp_empleado e 
                ON u.idempleado = e.idempleado 
            WHERE e.login = '$user'
                and e.clave = '$pass' 
                and u.estado <> 'C'";
			$query = $Conexion->query($sql);
			
			
			return $query;
			}
			
	}
	


?>

