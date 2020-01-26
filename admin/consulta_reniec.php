<?php
require 'simple_html_dom.php';
error_reporting(E_ALL ^ E_NOTICE);
	
$dni = $_POST['dni'];


//OBTENEMOS EL VALOR
$consulta = file_get_html('http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI='.$dni)->plaintext;

//LA LOGICA DE LA PAGINAS ES APELLIDO PATERNO | APELLIDO MATERNO | NOMBRES

$partes = explode("|", $consulta);




 if($_SERVER["REQUEST_METHOD"] == "POST"){
       include 'model/Conexion.php';
         $dni = $_POST['dni'];
        $alerta = '¡Este parece un nuevo cliente!';
        $return = '¡El DNI ya se encuentra registrado!';
        $vacio= 'ingrese el DNI';

         //Procederemos a hacer una consulta que buscara el correo del usuario
         $buscarCorreo = "SELECT * from tp_cliente_dni WHERE dni_cliente='$dni'";

         //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php
         $resultado = $Conexion->query($buscarCorreo);

         //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
         //esta funcion nos regresa el numero de filas en el resultado
         $contador = mysqli_num_rows($resultado);

         //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
//         if($contador != 0) {
//         $datos = array(
//              0 => $partes[''], 
//            1 => $partes[''], 
//            2 => $partes[''],
//            3 => $partes[''],
//            4 => $partes[''],
//            5 => $partes[''],
//            6 => $vacio,
//              );
//          
//  
//         }
     if($contador == 1) {
         $datos = array(
              0 => $partes[''], 
            1 => $partes[''], 
            2 => $partes[''],
            3 => $partes[''],
            4 => $partes[''],
            5 => $return,
            6 => $partes[''],
              );
          
  
         } else {
          $datos = array(
		0 => $dni, 
		1 => $partes[0], 
		2 => $partes[1],
		3 => $partes[2],
        4 => $alerta,
        5 => $partes[''],
        6 => $partes[''],
            );
         }
    }

echo json_encode($datos);
    

?>
