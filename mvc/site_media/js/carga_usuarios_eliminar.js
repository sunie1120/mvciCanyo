function carga_resultados(){

var name = $("input[name='nombre_servicio']").prop("value");
			var intensitat = $("input[name='intensidad_servicio']").prop("value");
			var preu = $("input[name='precio_servicio']").prop("value");
			var orden = $('#pepe').val();
			

			 var request = $.ajax({
			 url: "cerca_serveis.php",
			 type: "POST",
			 data: 'nombre_servicio='+ name +'&intensidad_servicio='+ intensitat+'&precio_servicio='+ preu+'&orden='+ orden,
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

	$("input").keyup(function(){
 carga_resultados();

	});
	
		$("select").change(function(){
 carga_resultados();

	});
});