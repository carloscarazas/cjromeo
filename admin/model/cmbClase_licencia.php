<?php
require_once "Conexion.php";

class cmbLicenciaClase{

    public function __construct(){
        }
        public function cmbLicencia_Clase(){
            global $Conexion;
            $sql = "SELECT * FROM tp_clase_licencia ";
            $query = $Conexion->query($sql);
            return $query;
        }
    }

?>