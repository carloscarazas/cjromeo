$(document).ready(function() {
	    init();
	$("form#frmIngresar").submit(IngresarSistema);
	$.backstretch("pintasqa.jpg");
	
	function IngresarSistema(e){
		e.preventDefault();
		var user = $("#form-username").val();
		var pass = $("#form-password").val();
		$.getJSON("admin/ajax/AccederAjax.php?permisoUser=IngresarSistema", {user: user, pass: pass}, function(r){
			if (r){
				$(location).attr("href", "admin/Principal.php");
                 }else{
					bootbox.alert("usuario o contraseña incorrecto");
					$("#form-username").val("");
					$("#form-password").val("");
					$("#form-username").focus();
					}
			
			});
		
		}
	
    
});

function init(){
		if ($("#txtMnuMantenimiento").val() == "0"){
		$("#liMantenimiento").hide();
		};
		
		if ($("#txtMnuAlmacen").val() == "0"){
		$("#liAlmacen").hide();
		};
		if ($("#txtMnuCajas").val() == "0"){
		$("#liCajas").hide();
		};
		if ($("#txtMnuCompras").val() == "0"){
		$("#liCompras").hide();
		};
		if ($("#txtMnuVentas").val() == "0"){
		$("#liVentas").hide();
		};
		if ($("#txtMnuConsultaCompras").val() == "0"){
		$("#liConsultaCompras").hide();
		};
		if ($("#txtMnuConsultaVentas").val() == "0"){
		$("#liConsultaVentas").hide();
		};
	}

