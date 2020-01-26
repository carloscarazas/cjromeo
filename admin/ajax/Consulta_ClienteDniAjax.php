<?php
    require_once "../model/Consulta_ClienteDni.php";

$objConsulta_ClienteDni = new Consulta_ClienteDni();

switch($_GET["Consulta_ClienteDni"]){
        
    
        
 
    case 'listaDni':
       
        
        $query_tipo = $objConsulta_ClienteDni->Listar_ClienteDni();
        $data= Array();
        $i=1;
        while($reg=$query_tipo -> fetch_object()){
            $data[] = array(
                    "id"=>$i,
                    "1"=>$reg->tipo,
                    "2"=>$reg->dni,
                    "3"=>$reg->nombres,
                    "4"=>$reg->lugar,
                    "5"=>$reg->correo,
                    "6"=>$reg->telefono,
                    "7"=>$reg->fecha_nac,
                    "8"=>$reg->fecha_emision,
                    "9"=>$reg->fecha_registro,
                    "10"=>'<button class="btn btn-primary" data-toggle="tooltip" title="Ver Informaión del Cliente" onclick="ver_InfoCliente(\''.$reg->dni.'\',\''.$reg->lugar.'\')"><i class="fa fa-file-text" aria-hidden="true"></i></button>'
                   
                   
            );
          
         $i++;      
        }
        $results = array(
               "sEcho" => 1,
               "iTotalRecords"=> count($data),
               "iTotalDisplayRecords"=> count($data),
               "aaData"=>$data);
               echo json_encode($results);

               break;
}
?>