/**
* función carga_resultados
* Funcion que recoge del DOM los valores de los inputs donde el usuario ha escrito los datos y los envía mendiante ajax  por post
* En caso de que no pueda realizarse la llamada ajax aparece un error en foma de alert.
* @retun void
*/
function carga_resultados(){

var id_usuario = $("input[name='id_usuario']").prop("value");
var nombre = $("input[name='nombre']").prop("value");
var primer_apellido = $("input[name='primer_apellido']").prop("value");
var segundo_apellido = $("input[name='segundo_apellido']").prop("value");
var nick_usuario = $("input[name='nick_usuario']").prop("value");


	 var request = $.ajax({
	 url: "../php/usuarios_modificar.php",
	 type: "POST",
	 data: 'nombre='+nombre+'&primer_apellido='+primer_apellido+'&segundo_apellido='+segundo_apellido+'&nick_usuario='+nick_usuario+'&id_usuario='+id_usuario,
	 dataType: "html"
	 });
	 request.done(function( msg ) {
	 $( "#usuario_modificar" ).html( msg );
	 boton_modificar();
	 });
	 
	 request.fail(function( jqXHR, textStatus ) {
	 alert( "Request failed: " + textStatus );
	 });
}
/**
* función boton_modificar
* Funcion que recoge del DOM los valores de los inputs donde el usuario ha escrito los datos y genera una ventana emergente que incluye un formulario con inputs de nuevo para poder
* modificar los datos en la base de datos, excepto el id que no puede ser modificado
* @retun void
*/
function boton_modificar(){

$(".modificar_user").on("click", function(){
var nombre_usuario = $(this).attr("name");
var nick_usuario;
var myId = $(this).attr("id");
var contenido_usuario_modificar = "<form method='post' action='#'><div class='input-control text size3 mg3 info-state'><input type='text' id='name' name='nombre' placeholder='Nuevo nombre'></input></div><br/><div class='input-control text size3 mg3  info-state' data-role='input-control'><input type='text'  id='papellido' name='primer_apellido'  placeholder='Nuevo primer apellido'></input></div><br/><div class='input-control text size3 mg3  info-state'><input type='text'  id='sapellido' name='segundo_apellido'  placeholder='Nuevo segundo Apellido'></input></div><br/><div class='input-control text size3 mg3  info-state'><input type='text'  id='alias' name='nick_usuario'  placeholder='Nuevo nick de usuario' ></input></div><br/><input type='hidden' name='id_usuario_oculto' value="+myId+"><br/><input type='checkbox' id='aprobador_vacaciones' name='aprobar_vacaciones'/><p>Aprueba vacaciones</p><input type='submit' name='modificar_usuario' id="+myId+" class='bg-orange fg-white bg-hover-amber modificar_user' value='Modificar'></input></form>"; 

	$.Dialog({
	flat: false,
	shadow: true,
	title: 'Usuario a modificar',
	content: contenido_usuario_modificar,
	height: 300,
	widht: 300
	});
});
}
/**
* función anónima
* Funcion que carga los resultados de la función carga_resultados de manera que al cargar la página ya se realiza la consuta y según el usuario escribe en los intups de tipo texto
* se va acotando la búsqueda en la base de datos
* @retun void
*/

$(document).ready(function() {

  carga_resultados();
	$("input").keyup(function(){
	carga_resultados();

	});
	$("#restaurar").click(function(){
	   $("#datos_usuarios")[0].reset();
		carga_resultados();
	});
}); 


