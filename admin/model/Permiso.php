<?php

require_once "Conexion.php";

class Permiso{

    public function __construct(){
    }

    public function Registrar(
							   $empleado, $nombre, $fecha, $manto, $almacen, $consulta, $usuarios,$estado){

          global $Conexion;
          $sw =true;
		
		
          try{
          
              $sql_articulo ="INSERT INTO mk_usuario (idusuario,
                                                       idempleado,
                                                       tipo_usuario,
                                                       fecha_registro,
													   mnu_mantenimiento,
													   mnu_almacen,
													 
													   mnu_consultas,
													   mnu_usuarios,
													   estado)
											  VALUES('',
													'$empleado',
													'$nombre',
													'$fecha',
													'$manto',
													'$almacen',
													
													'$consulta',
													'$usuarios',
													'$estado'
													)";
              $Conexion->query($sql_articulo);
              if($Conexion !=null){
                  $Conexion->close();
              }
          }catch(Exception $e){
              $Conexion->roollback();
          }
          return $sw;
    }
    
    public function Modificar($usuario,$nombre,
                          $empleado, $manto, $almacen, $consulta, $usuarios, $estado){

           global $Conexion;
           $sql = "UPDATE mk_usuario   
		   				SET 
						    idempleado='$empleado',
						     tipo_usuario='$nombre',
						     mnu_mantenimiento='$manto',
						     mnu_almacen='$almacen',
						   
						     mnu_consultas='$consulta',
						     mnu_usuarios='$usuarios',
						     estado='$estado'
                        WHERE idusuario =$usuario";
            $query=$Conexion->query($sql);
            return $query;
    }
      
   public function Eliminar ($id){
        global $Conexion;
        $sql="DELETE FROM mk_usuario where idusuario= '$id' ";
        $query=$Conexion->query($sql);
        return $query;
    }
   
    public function Listar(){
        global $Conexion;
		
        $sql = "SELECT u.*, concat(e.nombre, ' ', e.apellidos) as empleado, 
                       e.*, u.estado as estadousuario
			   FROM mk_usuario u 
                	INNER JOIN mk_empleado e 
                		ON u.idempleado = e.idempleado 
					ORDER BY idusuario  ASC ";
       
        $query = $Conexion->query($sql);
        return $query;
    }
  
    
}
?>