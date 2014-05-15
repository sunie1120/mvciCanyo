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


