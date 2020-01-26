<?php

session_start();
require_once "../model/Acceder.php";

$objacceder = new  acceder();

switch ($_GET["permisoUser"]){
    
	case "IngresarSistema":
	$user = $_REQUEST["user"];
	$pass = $_REQUEST["pass"];
	
	$query = $objacceder->Ingresar_Sistema($user, md5($pass));
	$fetch = $query->fetch_object();
	
	echo json_encode($fetch);
	
	
	if (isset($fetch)){
	    
		$_SESSION["idusuario"] = $fetch->idusuario;
		$_SESSION["idempleado"] = $fetch->idempleado;
		$_SESSION["empleado"] = $fetch->empleado;
		$_SESSION["tipo_documento"] = $fetch->tipo_documento;
		$_SESSION["tipo_usuario"] = $fetch->tipo_usuario;
		$_SESSION["num_documento"] = $fetch->num_documento;
		$_SESSION["direccion"] = $fetch->direccion;
		$_SESSION["mnu_mantenimiento"] = $fetch->mnu_mantenimiento;
		$_SESSION["mnu_almacen"] = $fetch->mnu_almacen;
		$_SESSION["mnu_consultas"] = $fetch->mnu_consultas;
		$_SESSION["mnu_usuarios"] = $fetch->mnu_usuarios;
		$_SESSION["superadmin"] = $fetch->superadmin;
		
		}

		break;
		case "Salir":
	    	session_unset();
	    	session_destroy();
	    
	    echo "<script>
                alert('Se cerro sesión');
                window.location= 'http://taxipaezperu.com'
    </script>";
		break;
	}
// 		$_SESSION["telefono"] = $fetch->telefono;
// 		$_SESSION["foto"] = $fetch->foto;
// 		$_SESSION["email"] = $fetch->email;
// 		$_SESSION["login"] = $fetch->login;
	

// 		$_SESSION["mnu_mantenimiento"] = $fetch->mnu_mantenimiento;
// 		$_SESSION["mnu_almacen"] = $fetch->mnu_almacen;
// 		$_SESSION["mnu_consultas"] = $fetch->mnu_consultas;
// 		$_SESSION["mnu_usuarios"] = $fetch->mnu_usuarios;
// 		$_SESSION["superadmin"] = $fetch->superadmin;

?>