function carga_resultados(){

var id_usuario = $("input[name='id_usuario']").prop("value");
var nombre = $("input[name='nombre']").prop("value");
var papellido = $("input[name='papellido']").prop("value");
var sapellido = $("input[name='sapellido']").prop("value");
var nick = $("input[name='nick']").prop("value");


	 var request = $.ajax({
	 url: "../php/eliminar_usuario.php",
	 type: "POST",
	 data: 'id_usuario='+ id_usuario +'&nombre='+ nombre+'&primer_apellido='+ papellido+'&seguno_apellido='+ sapellido+"'&nick_usuario'"+nick,
	 dataType: "html"
	 });
	 request.done(function( msg ) {
	 $( "#resultado_consulta" ).html( msg );
	 });
	 request.fail(function( jqXHR, textStatus ) {
	 alert( "Request failed: " + textStatus );
	 });
}

$( document ).ready(function() {

	$("#usuario_eliminar").keyup(function(){
	alert(11);
 carga_resultados();

	});
	
		/*$("select").change(function(){
 carga_resultados();

	});*/
});