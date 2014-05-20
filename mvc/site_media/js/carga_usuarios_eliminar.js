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

$( document ).ready(function() {
 //alert(4444);
  carga_resultados();
	$("input").keyup(function(){
	carga_resultados();

	});
	$("#restaurar").click(function(){
	   $("#datos_usuarios")[0].reset();
		carga_resultados();
	});
});

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
