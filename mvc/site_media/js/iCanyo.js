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
$(document).ready(function() {
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
$(document).ready(function(){
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
	
	/**
	* Función que controla que el campo de titulo y de cuerpo de los anuncions tengan datos 
	*/
	var texto = $('#texto_titulo').val();

	$(	'#publicar_button').click(function(){

		if ( texto == "" ){
			alert("Debes incluir un título para tu pubicación.")
		}

	});

	/**
	* Funcion que hace los cambios de color cuando el usuario quiere personalizar la aplicación
	*/
	$(".changecolorBN").click(function(){
		var o = $(".bg-orange");
		var a = $(".bg-amber");
		var t = $(".bg-teal");
		var C = $(".bg-darkCyan");
		var co = $(".bg-cobalt");
		var y = $(".bg-cyan");
		var da = $(".bg-darker");
		var gr = $(".bg-grey");
		
		o.each(function(){
			$(this).removeClass("bg-orange").addClass("bg-gray");
		});
		
		/* t.each(function(){		
			$(this).removeClass("bg-teal").addClass("bg-grey");
		}) */;

		a.each(function(){
			$(this).removeClass("bg-amber").addClass("bg-grey");
		});
		co.each(function(){
			$(this).removeClass("bg-cobalt").addClass("bg-gray");
		});
		
		t.each(function(){
			$(this).removeClass("bg-teal").addClass("bg-darker");
		});
		y.each(function(){
			$(this).removeClass("bg-cyan").addClass("bg-grey");
		}); 
		C.each(function(){
			$(this).removeClass("bg-darkCyan").addClass("bg-dark");
		});

	});
	
	
	$(".changecolorRelax").click(function(){
		var o = $(".bg-orange");
		var a = $(".bg-amber");
		var t = $(".bg-teal");
		var C = $(".bg-darkCyan");
		var co = $(".bg-cobalt");
		var y = $(".bg-cyan");
		var da = $(".bg-darker");
		var gr = $(".bg-grey");
		var gra = $(".bg-gray");
		
		o.each(function(){
			$(this).removeClass("bg-orange").addClass("bg-cobalt");
		});
		
		gr.each(function(){	
			$(this).removeClass("bg-grey").addClass("bg-cyan");

		});

		a.each(function(){
			$(this).removeClass("bg-amber").addClass("bg-cyan");
		});
		
		gra.each(function(){
			$(this).removeClass("bg-gray").addClass("bg-cobalt");
		});
		
	 	da.each(function(){
			$(this).removeClass("bg-darker").addClass("bg-teal");
		}); 
		
		/* s.each(function(){
			$(this).removeClass("bg-dark").addClass("bg-darkCobalt");
		}); */

	});
	
	$(".changecolorClassic").click(function(){
		var o = $(".bg-orange");
		var a = $(".bg-amber");
		var t = $(".bg-teal");
		var C = $(".bg-darkCyan");
		var co = $(".bg-cobalt");
		var y = $(".bg-cyan");
		var da = $(".bg-darker");
		var gr = $(".bg-grey");
		var gra = $(".bg-gray");
		
		gra.each(function(){
			$(this).removeClass("bg-gray").addClass("bg-orange");
		});
		
		y.each(function(){		
			$(this).removeClass("bg-cyan").addClass("bg-amber");
		}); 

		gr.each(function(){
			$(this).removeClass("bg-grey").addClass("bg-amber");
		});
		C.each(function(){
			$(this).removeClass("bg-darkCyan").addClass("bg-teal");
		});
		
		da.each(function(){
			$(this).removeClass("bg-darker").addClass("bg-teal");
		});
		co.each(function(){
			$(this).removeClass("bg-cobalt").addClass("bg-orange");
		}); 
		
	/* 	y.each(function(){
			$(this).removeClass("bg-dark").addClass("bg-teal");
		}); */

	});
	
	/**
	* Funciones de carrousel muestra (página de personaliación)
	*/
	$(".selector_velocidad").change(function(){
	alert (1111);
	var valor = $(".selector_velocidad").val();
	alert (valor);
	});
	
	$(".changeVelocidad_1").click(function(){
		$('.carousel').carousel({
		auto: true,
		period: 6000,
		duration: 3000,
		markers: {
		type: "square"
		}
		});
	});
	
	$(".changeVelocidad_2").click(function(){
		$('.carousel').carousel({
		auto: true,
		period: 3000,
		duration: 2000,
		markers: {
		type: "square"
		}
		});
	});
	
	$(".changeVelocidad_3").click(function(){
		$('.carousel').carousel({
		auto: true,
		period: 2000,
		duration: 1000,
		markers: {
		type: "square"
		}
		});
	});
	
});


