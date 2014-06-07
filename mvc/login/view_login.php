<?php

/**
 * Clase que estiende la clase view_1 y que crea la vista de LOGIN
 * (ver,crear, eliminar, modificar).
 *
 * @author OLAIA
 */
require_once('../core/view_1.php');

class view_login extends genera_vista {
    ################################# MÉTODOS ################################## 

    /**
     * Devuelve el cuerpo de la pagina para poder loguearte
     * 
     */
    protected function retorna_cuerpo_login_index($mensaje) {
        $this->estructura .= file_get_contents('../site_media/html/index.html');
        $this->estructura = str_replace('{mensaje}', '<br/><h5>' . $mensaje . '</h5>', $this->estructura);
    }

    /**
     * Devuelve el cuerpo de la pagina para poder loguearte despues de un error
     * 
     */
    protected function retorna_cuerpo_login($mensaje) {
        $this->estructura .= file_get_contents('../site_media/html/cuerpo_login.html');
        $this->estructura = str_replace('{mensaje}', '<br/><h5>' . $mensaje . '</h5>', $this->estructura);
    }

    /**
     * Genera la estructura html del login si se accede desde el index
     * 
     */
    public function crear_html_login_index($mensaje = '') {
        $this->retorna_cuerpo_login_index($mensaje);
    }

    /**
     * Genera la estructura html del login si se accede por la ruta del controler
     * 
     */
    public function crear_html_login($mensaje = '') {
        $this->retorna_cuerpo_login($mensaje);
    }

}
