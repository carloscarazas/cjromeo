<?php
require_once "Conexion.php";

class cmbTipo_doc{

    public function __construct(){
    }

    public function combo_de_documento(){
        global $Conexion;
        $sql = "SELECT * FROM tp_tipos_documentos order by id_tipo_doc";
        $query = $Conexion->query($sql);
        return $query;
    }
}
?>