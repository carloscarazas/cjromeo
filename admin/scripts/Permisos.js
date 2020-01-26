
// JavaScript Document

$(document).ready(function() {
    init();
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