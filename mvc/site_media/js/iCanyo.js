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
var num_departs;
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
/**
*Validacion de los inputs de texto y pass
*/
$( document ).ready(function() {
	/**
	*Validacion de los inputs de texto
	*/
	$("input[type=text]").on("keypress", function(){
		var x = $(this).val();
		
		if (x.match(/^[a-zA-Z]+$/)) {
			$(this).parent().removeClass("info-state").removeClass("warning-state").addClass("success-state");
			
		} else {
			$(this).parent().removeClass("info-state").removeClass("success-state").addClass("warning-state");
			
		}
	});
	
	/**
	* Validacion de pass: Entre 6 y 20 caracteres,  un digito minimo y un alfanumérico, y no puede contener caracteres especiales
	*/
		$("input[type=password]").on("keypress", function(){
		var x = $(this).val();
		
		if (x.match(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,20})$/)) {
			$(this).parent().removeClass("info-state").removeClass("warning-state").addClass("success-state");
			
		} else {
			$(this).parent().removeClass("info-state").removeClass("success-state").addClass("warning-state");
			
		}
	});
	
});





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
		
		if(nombre!="" && nombre!=" "){
		document.getElementById("name").className= "validado";
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
/**
* Función para recargar los anuncios 
*/

var intervalo = /*milisegundos, depende de los usuarios conectados*/

//window.setInterval("javascript function", milliseconds);


window.setInterval(function(){
	$('#anuncios').load('anuncios.php');
},intervalo);

/**
* Funciones de carrousel
*/
$('.carousel').carousel({
auto: true,
period: 3000,
duration: 2000,
markers: {
type: "square"
}
});

/**
* Funcion que controla que los checkbox de la vista_crear_anuncios estén seleccionado o no, para que los anuncios sean públicos o no
*/

$(document).ready(function() {
			//	alert('111');
		$("input[type='radio']").click(function(){
			var anuncio_publico = $("#publico").prop('checked');
			var anuncio_privado = $("#no_publico").prop('checked');

			if(anuncio_privado == true){
			$("input[name='departamento']").removeAttr("disabled");
			$("input[name='puesto']").removeAttr("disabled");
			}else{
			$("input[name='departamento']").attr("disabled","enabled");
			$("input[name='puesto']").attr("disabled","enabled");
			}
			
			$("input[type='reset']").click(function(){
				$("input[name='departamento']").attr("disabled","disabled");
				$("input[name='puesto']").attr("disabled","disabled");
			});
			
		});	
});
		
//Para habilitar o dehabilitar los botones para selecionar tipos de vista, dependiendo de si el usuario ha elegido por puesto o por departamento,
//excluyendo unas opciones a las otras.
		  
		$(document).ready(function(){			
  			$('input[name="departamento"]').change(function() {
			num_departs=0;
				$('input[name="departamento"]').each(function(i,o) {
				   var actual=$(this).prop('checked');
					if(actual){
						num_departs++;
					}
				});
				if (num_departs==0){
				$("input[name='puesto']").attr("disabled",false);
				}
				else{
				$("input[name='puesto']").attr("disabled","disabled");
				}
				});
				
			$('input[name="puesto"]').change(function() {
			num_puestos=0;
				$('input[name="puesto"]').each(function(i,o) {
				   var actual=$(this).prop('checked');
					if(actual){
						num_puestos++;
					}
				});
				if (num_puestos==0){
				$("input[name='departamento']").attr("disabled",false);
				}
				else{
				$("input[name='departamento']").attr("disabled","disabled");
				}
				});
			});
			
/**
* Función para controlar si los anuncios tienen cuerpo y mostrarlo al clicar en una ventana emergente
*/

var cuerpo_anuncio = "Olaia!!!";
var titulo_anuncio = "Titulo del anuncio";
if ( cuerpo_anuncio != "") {
	$ (".slide").click( function(){
		$.Dialog({
			shadow: true,
			overlay: false,
			icon: '<span class="icon-rocket fg-red"></span>',
			title: titulo_anuncio,
			width: 500,
			padding: 10,
			content: cuerpo_anuncio
		});
	});
}
