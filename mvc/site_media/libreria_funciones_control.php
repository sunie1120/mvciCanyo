<?php
	/**
	* Librería que contiene los métodos para controlar la entrada de texto por parte de los usuarios
	*/
//variable que debemos controlar, es en la que almacenamos los datos que el usuario introduce en la aplicación
$dato;

/* 	public $longitud_contrasena_adecuada;
	public $longitud_dato_normal_adecuado;
	public $longitud_titulo_adecuado;
	public $longitud_anuncio_adecuado;
	public $datoEspeciales;
	public $numero_en_texto;
	public $inyeccionURL;
	public $inyeccionIP;
	public $dato_escapadoI;
	public $dato_escapadoII; */

/**
* comprobarLogitudContrasena
* Comprobamos que los datos introducidos en el input de contraseña sean mayores de 5 caracteres y menores de 20
* @param $dato
* @return boolean
*/
	function comprobarLogitudContrasena($dato){
		if ( $this->dato>5 && $this->dato < 21 ){
		//cumple los requisitos
		return true;
		}else{
		//no cumple los requisitos
		return false;
		}
	}

/**
* comprobarLogitudNormal
* Comprobamos que los datos introducidos en los input de texto de nombres, apellidos y nick sean mayores de 1 caracteres y menores de 101 
* @param $dato
* @return boolean
*/
	function comprobarLogitudNormal($dato){
		if ( $this->dato>1 && $this->dato < 101 ){
		//cumple los requisitos
		return true;
		}else{
		//no cumple los requisitos
		$return false;
		}
	}
	
/**
* comprobarLongitudTituloAnuncio
* Comprobamos que los datos introducidos en los input de texto del titulo de anuncio sean mayores de 1 caracteres y menores de 151 
* @param $dato
* @return boolean
*/
	function comprobarLongitudTituloAnuncio($dato){
		if ( $this->dato>1 && $this->dato < 151 ){
		//cumple los requisitos
		return true;
		}else{
		//no cumple los requisitos
		$return false;
		}
	}

/**
* comprobarLogitudCuerpoAnuncio
* Comprobamos que los datos introducidos en los input de texto del cuerpo de anuncio sean mayores de 1 caracteres y menores de 501 
* @param $dato
* @return boolean
*/
	function comprobarLogitudCuerpoAnuncio($dato){
		if ( $this->dato>1 && $this->dato < 501 ){
		//cumple los requisitos
		return true;
		}else{
		//no cumple los requisitos
		$return false;
		}
	}
	
/**
* comprobarCaracteresEspeciales
* Comprobamos que los datos introducidos en los input de texto del cuerpo de anuncio no contengan caracteres especiales, 
* permitiemdo letras, nñumeros, letras con acento, eñe i ce trencada
* @param $dato
* @return boolean
*/

	function comprobarCaracteresEspeciales($dato){
		$this->patron = "[A-Za-z0-9ÑñçÇáéíóúàèìòù]";
		if( preg_match($this->dato,$this->patron) ){
		//no cumple las especificaciones: hay caracteres que no son letras ni números
		return false;
		}else{
		//sí cumle las especificaciones: no hay caracteres que no sean letras ni números
		return true;
		}
		return $datoEspeciales;
	}
/**
* comprobarNumeroenTexto
* Comprobamos que los datos introducidos en los input de texto de nombre, apellidos y nick no incluyan números
* @param $dato
* @return boolean
*/
	function comprobarNumeroenTexto($dato){
		$this->patron = "[0-9]";
		if ( preg_match ($this->dato,$this->patron)) {
		//no hay numeros, cumple las especificaciones
			return true;
		}else{
		//sí contiene números, no cumple las especificaciones
			return false;
		}
	}
/**
* comprobarInyeccionURL
* Comprobamos que los datos introducidos en los input de texto no correspondan con el patron de una URL
* @param $dato
* @return boolean
*/
	function comprobarInyeccionURL($dato){
	$this->patron = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/";

		if ($this->dato == $this->patron){
		//hay inyeccion de datos que coinciden con un patrón de URL, no cumple con las especificaciones
		return false;
		}else{
		// no hay inyeccion de datos que coinciden con un patrón de URL, sí cumple con las especificaciones
		return true;
		}
	}
/**
* comprobarInyeccionIP
* Comprobamos que los datos introducidos en los input de texto no correspondan con el patron de una IP
* @param $dato
* @return boolean
*/
	function comprobarInyeccionIP($dato){
	$this->patron = "/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/";

		if ($this->dato == $this->patron){
		//hay inyeccion de datos que coinciden con un patrón de IP, no cumple con las especificaciones
		return false;
		}else{
		// no hay inyeccion de datos que coinciden con un patrón de IP, sí cumple con las especificaciones
		return true;
		}
	}

		/*SUSTITUIR*/
/**
* cambiarCaracteres
* Función que sustituye los caracteres especiales para evitar inyección SQL
* Comprueba que el String de datos no esté vacío y en caso afirmativo devuelve una cadena de caracteres. Si está vació devuelve una variable vacía.
* @param $dato
* @return dato_escapadoI
*/

	function cambiarCaracteres($dato){
		if($dato !=""){
		$this->datos_validado = htmlspecialchars ($this->dato);
		}else{
		$this->datos_validado ="";
		}
		return $this->dato_escapadoI;
	}
/**
* escaparCaracteres
* Función que escapa los caracteres especiales para evitar inyección SQL
* Comprueba que el String de datos no esté vacío y en caso afirmativo devuelve una cadena de caracteres. Si está vació devuelve una variable vacía.
* Devuelve una cadena de caracteres
* @param $dato
* @return dato_escapadoII
*/
	function escaparCaracteres($dato){
		if($dato !=""){
		$this->dato_escapadoII =  mysqli::real_escape_string($this->dato);
		}else{
		$this->dato_escapadoII ="";
		}
		return $this->dato_escapadoII;
	}
?>