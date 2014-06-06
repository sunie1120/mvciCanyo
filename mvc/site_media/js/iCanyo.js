/**
 * enviaPHP
 * Funcion para que se envien los datos mediante submit (que es lo que enlaza con php)
 * @return void
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
* envia_usuarios
* Función  que envia al controlador los datos de los usuarios para que se inserten en la base de datos
* Creamos las variables que contendrán los datos recogidos del DOM y mediante ajax los enviamos al controler
* SI no puede hacer la petición devuelve un error por pantalla a modo de alert
* @return void
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
* función anónima
* Validacion de los inputs de texto y pass
* Recogemos los datos mediate javascript según el usuario los escribe, controla que coincidan los patrones y cambia las clases de los inputs dependiendo de si halla coincidencias.
* @return void
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
	* Validacion de password: Entre 6 y 20 caracteres,  un digito minimo y un alfanumérico, y no puede contener caracteres especiales
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
* función anónima
* Funcion para ir mostrando los datos de usuario según se escriben
* Recibe los datos al recorrer el DOM
* @return void
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
* función anónima
* Función para recargar los anuncios 
* Recarga los elementos con id "anuncios" dependiendo del valor de la variable intervalo
* @return void
*/

var intervalo;
//window.setInterval("javascript function", milliseconds);

window.setInterval(function(){
	$('#anuncios').load('anuncios.php');
},intervalo);


/**
* función anónima
* Función de carrousel
* Fución que ejecuta el efecto carousel sobre los div con clase carousel y les asigna una duración y un perido de visualización,
* además de establecer que sea automático el comienzo de la función
* @return void
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
* función anónima
* Funcion que controla que los checkboxes de la vista_crear_anuncios estén seleccionado o no, para que los anuncios sean públicos o no
* recoge las propiedades checked de los dos tipos de div y en consecuencia habilita o deshabilita las siguientes opciones para que si un usuario seelecciona público, 
* no pueda a su vez elegir grupos de usuarios para su visualización
* @retun void
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
	
/**
* función anónima
* Funcion que controla que los checkboxes de departamento y puestos estén seleccionado o no, para que si se elige un tipo el oro tipo de deshabilite
* recoge las propiedades checked de los dos tipos de div y en consecuencia habilita o deshabilita las siguientes opciones para que si un usuario seelecciona departamentos, 
* no pueda a su vez elegir puestos
* @retun void
*/
		  
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
* función anónima
* Función para controlar si los anuncios tienen cuerpo y mostrarlo al clicar en una ventana emergente
* Recoge los valores de id, value y name y los asigna a una ventana emergente de tipo Dialog al clicka encima del div que pasa en el carousel de los anuncios
* Si cuerpo de anuncio no recibe ningún valor, no se ejecuta, pues no hay nada que mostrar en la ventana emergente y elanuncio solamente tiene título y autor.
* @retun void
*/			

$(document).ready(function(){

	
	var titulo_anuncio = "";
	var autor_anuncio;

	$('.con_cuerpo').click( function(){
	var cuerpo_anuncio = $(this).attr("value");
	var autor_anuncio = $(this).attr("id");
	var titulo_anuncio = $(this).attr("name");
		
		if(cuerpo_anuncio != ""){
			$.Dialog({
				shadow: true,
				overlay: false,
				icon: '<span class="icon-rocket fg-red"></span>',
				title: autor_anuncio,
				width: 500,
				padding: 10,
				content:titulo_anuncio+"<br/>"+cuerpo_anuncio
			});
		}
	});
	
/**
* función anónima
* Función que controla que el campo de titulo y de cuerpo de los anuncions tengan datos y avisa al suuario con un alert en caso de que esté vacio
* @retun void
*/
	
	var texto = $('#texto_titulo').val();

	$('#publicar_button').click(function(){

		if ( texto == "" ){
			alert("Debes incluir un título para tu pubicación.")
		}

	});

/**
* función anónima
* Funcion que hace los cambios de color cuando el usuario quiere personalizar la aplicación
* Hay una qequivalencia entre tres colores dferentes por cada opción de color, de tal manera que cuando el usuario elige un tono, se sustituyen todos.
* La función controla que colores hay en ese momento y los elimina para aplicar los que el usuario a elegido.
* Los colores son modificados mediante el cambio de las clases que le asignan el color al fondo de los divs.
* Hay tres opciones de cambio iCanyoClassic, iCanyoRelax e iCanyoVintage
* @retun void
*/	
	/**
	*  iCanyoVintage
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
	/**
	*  iCanyoRelax
	*/	
	
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
	});
	
	/**
	*  iCanyoClassic
	*/
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
	});
	
	

/**
* función anónima
* Funciones de carrousel muestra (sólo página de personaliación).
* Hay tres posibles velocidades que el usuario puede elegir
* @retun void
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


