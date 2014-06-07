<?php

/**
 * Clase que contiene los métodos para controlar la entrada de texto por parte
 * de los usuarios
 *
 * @author Esther
 */
class model_controla_datos {
    ############################### PROPIEDADES ################################

    public $longitud_contrasena_adecuada;
    public $longitud_dato_normal_adecuado;
    public $longitud_titulo_adecuado;
    public $longitud_anuncio_adecuado;
    public $datoEspeciales;
    public $numero_en_texto;
    public $inyeccionURL;
    public $inyeccionIP;
    public $dato_escapadoI;
    public $dato_escapadoII;

    ################################# MÉTODOS ##################################

    /* COMPROBAR */

    public function comprobarLogitudContrasena($dato) {
        if ($this->dato > 5 && $this->dato < 21) {
            $this->longitud_contrasena_adecuada = true;
        } else {
            $this->longitud_contrasena_adecuada = false;
        }
        return $this->longitud_contrasena_adecuada;
    }

    //metod para controlar: nombre, nicke y apellidos
    public function comprobarLogitudNormal($dato) {
        if ($this->dato > 1 && $this->dato < 101) {
            $this->longitud_dato_normal_adecuado = true;
        } else {
            $this->longitud_dato_normal_adecuado = false;
        }
        return $this->longitud_dato_normal_adecuado;
    }

    public function comprobarLongitudTituloAnuncio($dato) {
        if ($this->dato > 1 && $this->dato < 151) {
            $this->longitud_titulo_adecuado = true;
        } else {
            $this->longitud_titulo_adecuado = false;
        }
        return $this->longitud_titulo_adecuado;
    }

    public function comprobarLogitudCuerpoAnuncio($dato) {
        if ($this->dato > 1 && $this->dato < 501) {
            $this->longitud_anuncio_adecuado = true;
        } else {
            $this->longitud_anuncio_adecuado = false;
        }
        return $this->longitud_anuncio_adecuado;
    }

    public function comprobarCaracteresEspeciales($dato) {
        $this->patron = "[A-Za-z0-9]";
        if (preg_match($this->dato, $this->patron)) {
            //hay caracteres que no son letras ni números
            $this->datoEspeciales = true;
        } else {
            //no hay caracteres que no son letras ni números
            $this->datoEspeciales = false;
        }
        return $datoEspeciales;
    }

    public function comprobarNumeroenTexto($dato) {
        $this->patron = "[0-9]";
        if (preg_match($this->dato, $this->patron)) {
            //no hay numeros
            $this->numero_en_texto = true;
        } else {
            //sí contiene números
            $this->numero_en_texto = false;
        }
        return $this->numero_en_texto;
    }

    public function comprobarInyeccionURL($dato) {
        $this->patron = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/";

        if ($this->dato == $this->patron) {

            //hay inyeccion de datos que coinciden con un patrón de URL
            $this->inyeccionURL = true;
        } else {
            // no hay inyeccion de datos que coinciden con un patrón de URL
            $this->inyeccionURL = false;
        }
    }

    public function comprobarInyeccionIP($dato) {
        $this->patron = "/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/";

        if ($this->dato == $this->patron) {

            //hay inyeccion de datos que coinciden con un patrón de IP
            $this->inyeccionIP = true;
        } else {
            // no hay inyeccion de datos que coinciden con un patrón de IP
            $this->inyeccionIP = false;
        }
    }

    /* SUSTITUIR */

    /**
     * Hemos creado dos funciones para sustituir y escapar los caracteres
     * especiales, de esta manera tenemos una doble capa que nos eviará
     * problemas de inyección sql.
     */
    public function cambiarCaracteres($dato) {
        $this->datos_validado = htmlspecialchars($this->dato);
        return $this->dato_escapadoI;
    }

    public function escaparCaracteres($dato) {
        $this->dato_escapadoII = mysqli::real_escape_string($this->dato);
        return $this->dato_escapadoII;
    }

}
