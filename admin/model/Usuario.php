<?php

require_once "Conexion.php";

class Usuario{

    public function __construct(){
    }
 
//    public function Registrar($nombre,$apellido,$t_documento,$n_documento,$direccion,$tel,$email,$fecha,$estado,$login,$clave){
//
//          global $Conexion;
//          $sw =true;
//		
//		
//          try{
//         
//              $sql_articulo ="INSERT INTO mk_empleado (idempleado,
//                                                       apellidos,
//                                                       nombre,
//                                                       tipo_documento,
//													   num_documento,
//													   direccion,
//													   telefono,
//													   email,
//													   fecha_nacimiento,
//													   foto,
//													   login,
//													   clave,
//													   estado)
//											  VALUES('',
//													'$apellido',
//													'$nombre',
//													'$t_documento',
//													'$n_documento',
//													'$direccion',
//													'$tel',
//													'$email',
//													'$fecha',
//													'Files/Empleado/empleado01.png',
//													'$login',
//													'".md5($clave)."',
//													'$estado'
//													)";
//              $Conexion->query($sql_articulo);
//              if($Conexion !=null){
//                  $Conexion->close();
//              }
//          }catch(Exception $e){
//              $Conexion->roollback();
//          }
//          return $sw;
//    }
//    
//    public function Modificar($empleado,$nombre,
//                          $apellido,$t_documento,$n_documento,$direccion,$tel,$email,$fecha,$estado,$login,$clave){
//
//           global $Conexion;
//           $sql = "UPDATE mk_empleado   
//		   				SET  apellidos='$apellido',  
//						     nombre='$nombre',
//						     tipo_documento='$t_documento',
//						     num_documento='$n_documento',
//						     direccion='$direccion',
//						     telefono='$tel',
//						     email='$email',
//						     fecha_nacimiento='$fecha',
//						     foto='Files/Empleado/empleado01.png',
//						     login='$login',
//						     clave='".md5($clave)."',
//						    
//						     estado='$estado'
//						    
//                        WHERE idempleado = $empleado";
//            $query=$Conexion->query($sql);
//            return $query;
//    }
//      
//   public function Eliminar ($id){
//        global $Conexion;
//        $sql="DELETE FROM mk_empleado  where idempleado = '$id' ";
//        $query=$Conexion->query($sql);
//        return $query;
//    }
   
    public function Listar(){
        global $Conexion;
		
        $sql = "SELECT u.*, concat(e.nombre, ' ', e.apellidos) as empleado, 
                       e.*, e.estado as estadoempleado
                      
			   FROM tp_usuario u 
                	RIGHT JOIN tp_empleado e 
                		ON u.idempleado = e.idempleado 
					ORDER BY u.idusuario  ASC ";
       
		/*$sql = "SELECT u.*, concat(e.nombre, ' ', e.apellidos) as empleado, 
                    e.*, e.estado as superadmin
			   FROM cl_usuario u 
                	INNER JOIN cl_empleado e 
                		ON u.idempleado = e.idempleado 
					ORDER BY e.idempleado  ASC ";*/
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