/*
POWERED BY GENESIS VARGAS J
Visita mi pagina: www.genesisvargasj.com
¡¡Tutoriales y Descargas!!
*/
window.onload = function () {
	Cargar();	
}
function Registrar()
{
	var cedu = $("#cedula").val();
	var nom = $("#nombre").val();
	var fech = $("#fecha").val();
	var carg = $("#cargo").val();
	if (cedu == "" || nom == "" || fech == "" || carg == "")
	{
		$("#respuesta").html("<span>Por favor completa todos los campos</span>");
	}	
	else
	{
		$("#respuesta").html("<img src='loader.gif'><span> Por favor espera un momento</span>");
		$.ajax({
			type: "POST",
			dataType: 'html',
			url: "registro.php",
			data: "cedula="+cedu+"&nombre="+nom+"&fecha="+fech+"&cargo="+carg,
			success: function(resp){
				$('#respuesta').html(resp);
				Limpiar();
				Cargar();
			}
		});
	}
}  
function Cargar()
{
	$('#datagrid').html("<img src='loader.gif'><span> Por favor espera un momento</span>");	
	$('#datagrid').load('consulta.php');	
}
function Limpiar()
{
	$("#cedula").val("");
	$("#nombre").val("");
	$("#fecha").val("");
	$("#cargo").val("");
}
