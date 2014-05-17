/**
 * Funcion para que se envien los datos mediante submit (que es lo que enlaza con php)
*/
function enviaPHP()
{
var nombreusuario=$("#user").val();
var passusuario=$("#contra").val();
	if(nombreusuario=="" || passusuario==""){//comprovamos que no sean campos vacios
	$("#errores").html("Todos los campos deben estar completos.");//si están vacios sacamos un mensaje por pantalla en el div "errores"
	$( "#shake" ).effect( "shake",{distance: 10},2000,oculta);//hacermos el efecto shake
	
	}else{
	$("#loginsusuario").submit();//lo enviamos a la página de php para que compruebe en el servidor si el usuario existe
	}
};

/**
* Función envia al controlador para que se inserten en la base de datos
*/
function envia_usuarios(){

			var nombre = $("input[name='nombre']").prop("value");
			var papellido = $("input[name='primer_apellido']").prop("value");
			var sapellido = $("input[name='segundo_apellido']").prop("value");
			var nick = $("input[name='nick']").prop("value");
			var contrasenya = $("input[name='contrasena']").prop("value");
			var rol = $("select[name='rol']").prop("value");
			var puesto = $("select[name='puesto']").prop("value");
			var departamento = $("select[name='departamento']").prop("value");
			var foto = $("input[name='foto']").prop("value");

			 var request = $.ajax({
			 url: "../../mvc/login/controller.php",
			 type: "POST",
			 data: 'nombre='+ nombre +'&primer_apellido='+ papellido+'&segundo_apellido='+ sapellido+'&nick='+ nick+'&contrasena'+contrasenya+'&rol'+rol+'&puesto'+puesto+'&departamento'+departamento+'&foto'+foto,
			 dataType: "html"
			 });
			 request.done(function( msg ) {
			 $( "#resultado_consulta" ).html( msg );
			 });
			 request.fail(function( jqXHR, textStatus ) {
			 alert( "Request failed: " + textStatus );
			 });
}
/*
$( document ).ready(function() {

	$("input").keyup(function(){
 carga_resultados();

	});
	
		$("select").change(function(){
 carga_resultados();

	});
});
*/


/**
* Funcion para ir mostrando los datos de usuario según se escriben
*/
	function controla_datos(){
		var nombre = $("input[name='nombre']").val();
		var papellido = $("input[name='primer_apellido']").prop("value");
		var sapellido = $("input[name='segundo_apellido']").prop("value");
		var nick = $("input[name='nick']").prop("value");
		var contrasenya = $("input[name='contrasena']").prop("value");
		var rol = $("select[name='rol']").prop("value");
		var puesto = $("select[name='puesto']").prop("value");
		var departamento = $("select[name='departamento']").prop("value");
		
		if(nombre){
		}
		
		$("#nombre").val(nombre);
		$("#papellido").val(papellido);
		$("#sapellido").val(sapellido);
		$("#nick").val(nick);
		$("#contrasenya").val(contrasenya);
		$("#rol").val(rol);
		$("#puesto").val(puesto);
		$("#departamento").val(departamento);
	}


