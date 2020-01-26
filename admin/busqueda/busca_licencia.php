

<?php

 
      $buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
          require_once "../model/Conexion.php";
           
            $sql = "SELECT * FROM tp_licencia_conductor WHERE nro_licencia LIKE '%".$b."%'";
             $query= $Conexion->query($sql);
            $contar = mysqli_num_rows($query);
             
            if($contar == 0){
                  echo "Tienes una nueva licencia : '<b>".$b."</b>'.";
            }else{
                  while($row=mysqli_fetch_array($query)){
                        $nombre = $row['nro_licencia'];
                        echo "¡ Esta Licencia :".$nombre.", Ya exíste !";    
                  }
            }
      }
       
?>