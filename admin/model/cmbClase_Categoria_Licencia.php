<?php
require_once "Conexion.php";

class cmbLicenciaCategoria{

    public function __construct(){
        }
        public function cmbLicencia_Categoria(){
            global $Conexion;
            $sql = "SELECT * FROM tp_clase_categoria_licencia ";
            $query = $Conexion->query($sql);
            return $query;
        }
    }

?>