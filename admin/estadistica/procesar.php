<?php
	
include_once("Conexion.php");
	class Procesar extends Model{
		public function __construct(){
			parent::__construct();
		}
		
		public function build_report($year){
			$total = array();
			for($i=0; $i<12; $i++){
				$month = $i+1;
				$sql = $this->db->query("SELECT SUM(Total_Compra) AS total
				FROM cl_compra_carrito WHERE MONTH(Fecha_Compra) = '$month'
				AND YEAR(Fecha_Compra) = '$year' AND Estado_Compra='Enviado' LIMIT 1");
										
				$total[$i] = 0;
				foreach ($sql as $key){
					$total[$i] = ($key['total'] == null)? 0 : $key['total'];
				}
			}
			return $total;
		}
	}
	
	if($_POST['year']){
		$class = new Procesar;
		$run = $class->build_report($_POST['year']);
		exit(json_encode($run));
	}
?>