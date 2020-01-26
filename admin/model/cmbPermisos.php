<?php
require_once "Conexion.php";

class cmbempleado{

    public function __construct(){
    }

    public function ListarUM(){
        global $Conexion;
        $sql = "SELECT *, concat(nombre,apellidos) as empleado FROM mk_empleado order by idempleado desc";
        $query = $Conexion->query($sql);
        return $query;
    }
}
?>