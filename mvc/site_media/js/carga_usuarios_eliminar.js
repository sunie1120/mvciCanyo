/**
* función carga_resultados
* Funcion que recoge del DOM los valores de los inputs donde el usuario ha escrito los datos y los envía mendiante ajax  por post
* EN caso de que no pueda realizarse la llamada ajax aparece un error en foma de alert.
* @retun void
*/	

function carga_resultados(){

var id_usuario = $("input[name='id_usuario']").prop("value");
var nombre = $("input[name='nombre']").prop("value");
var primer_apellido = $("input[name='primer_apellido']").prop("value");
var segundo_apellido = $("input[name='segundo_apellido']").prop("value");
var nick_usuario = $("input[name='nick_usuario']").prop("value");


	 var request = $.ajax({
	 url: "../php/eliminar_usuario.php",
	 type: "POST",
	 data: 'nombre='+nombre+'&primer_apellido='+primer_apellido+'&segundo_apellido='+segundo_apellido+'&nick_usuario='+nick_usuario+'&id_usuario='+id_usuario,
	 dataType: "html"
	 });
	 request.done(function( msg ) {
	 $( "#usuario_eliminar" ).html( msg );
	 });
	 request.fail(function( jqXHR, textStatus ) {
	 alert( "Request failed: " + textStatus );
	 });
}

/**
* función anónima
* Funcion que carga los resultados de la función carga_resultados de manera que al cargar la página ya se realiza la consuta y según el usuario escribe en los intups de tipo textpo
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


/**
* función envia_usuario_eliminar
* que envia el id del usuario que debe ser eliminado de la base de datos mediante una llamada ajax. Si no puede realizar la llamada aparece un error en forma de alert
* @retun void
*/
function envia_usuario_eliminar(){

var id_usuario = $("input[name='id_usuario']").prop("value");

	 var request = $.ajax({
	 url: "../php/eliminar_usuario.php",
	 type: "POST",
	 data: 'nombre='+nombre+'&primer_apellido='+primer_apellido+'&segundo_apellido='+segundo_apellido+'&nick_usuario='+nick_usuario+'&id_usuario='+id_usuario,
	 dataType: "html"
	 });
	 request.done(function( msg ) {
	 $( "#usuario_eliminar" ).html( msg );
	 });
	 request.fail(function( jqXHR, textStatus ) {
	 alert( "Request failed: " + textStatus );
	 });
}