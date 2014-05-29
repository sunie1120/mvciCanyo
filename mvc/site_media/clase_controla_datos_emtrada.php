<?php
/**
* Clase que contine los métodos para controlar la entrada de texto por parte de los usuarios
*/
public class Controla_Datos(){

public $longitud_contrasena_adecuada;
public $longitud_titulo_adecuado;

/************METODOS***************/
	/*COMPROBAR*/

public comprobarLogitudContrasena(dato){
	if ( $dato>5 && $dato < 21 ){
	$longitud_contrasena_adecuada == true;
	}else{
	$longitud_contrasena_adecuada=== false;
	}
	return  $longitud_contrasena_adecuada;
}


public comprobarLongitudTituloAnuncio(dato){
	if ( $dato>1 && $dato < 151 ){
	$longitud_titulo_adecuado == true;
	}else{
	$longitud_titulo_adecuado=== false;
	}
	return  $longitud_titulo_adecuado;
}


public comprobarLogitudCuerpoAnuncio(dato){
	if ( $dato>1 && $dato < 501 ){
	$longitud_anuncio_adecuado == true;
	}else{
	$longitud_anuncio_adecuado=== false;
	}
	return  $longitud_anuncio_adecuado;
}


public comprobarCaracteresEspeciales(dato){
	$patron = "[A-Za-z0-9]";
	if( preg_match($dato,$patron) ){
	//hay caracteres que no son letras in números
		$datoEspeciales == true;
	}else{
	//no hay caracteres que no son letras in números
		$datoEspeciales == false;
	}
	return $datoEspeciales;
}

public comprobarNumeroenTexto(dato){
	$patron = "[0-9]";
	if ( preg_match ($dato,$patron)) {
	//no hay numeros
		$numero_en_texto == true;
	}else{
	//sí contiene números
		$numero_en_texto == false;
	}
	return $numero_en_texto;

}

	/*SUSTITUIR*/
public cambiarCaracteres( datos ){
	$datos_validado = htmlspecialchars ($dato);
	return $dato_validado;
}



}









?>