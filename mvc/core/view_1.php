<?php

/**
 * Clase abstracta que crea la parte general de las vistas.
 *
 * @author OLAIA
 */
abstract class genera_vista {
    ############################### PROPIEDADES ################################

    protected $estructura;
    private $titulos = array(
        'alta_usuario' => 'iCanyo Alta Usuarios',
        'baja_usuario' => 'iCanyo Baja Usuarios',
        'modificar_usuario' => 'iCanyo Modificar Usuarios',
        'mostrar_anuncios' => 'iCanyo Mis anuncios'
    );

    ################################# MÉTODOS ##################################

    /**
     * Devuelve el contenido de la cabecera de todas las paginas
     * 
     */
    public function get_vista() {
        return $this->estructura;
    }

    ################################# ESTRUCTURA ##################################

    /**
     * Devuelve el contenido de la cabecera de todas las paginas
     * 
     */
    protected function retorna_cabecera($vista_elegida) {
        $this->estructura = file_get_contents('../site_media/html/cabecera.html');
        $this->estructura = str_replace('{titulo}', $this->titulos[$vista_elegida], $this->estructura);
    }

    /**
     * Devuelve el pie de la pagina
     * 
     */
    protected function retorna_pie() {
        $this->estructura .= file_get_contents('../site_media/html/pie.html');
    }

    ################################# MENÚ ##################################

    /**
     * Devuelve el menú común a todos los usuarios
     * 
     */
    protected function retorna_menu_basico() {
        $this->estructura .= file_get_contents('../site_media/html/menu_basic.html');
    }

    /**
     * Devuelve el menú para aquellos usuarios que deban aprobar las vacaciones
     * de otros usuarios
     * 
     */
    protected function retorna_menu_aprueba_vacaciones($aprobar_vacaciones) {
        if ($aprobar_vacaciones == true) {
            $this->estructura .= file_get_contents('../site_media/html/menu_aprueba_vacaciones.html');
        } else {
            $this->estructura .= file_get_contents('../site_media/html/menu_no_aprueba_vacaciones.html');
        }
    }

    /**
     * Devuelve el menú para aquellos usuarios deban gestionar a los usuarios
     * 
     */
    protected function retorna_menu_control_usuarios() {
        $this->estructura .= file_get_contents('../site_media/html/menu_control_usuarios.html');
    }

    /**
     * Cierra el menú
     * 
     */
    protected function retorna_pie_menu() {
        $this->estructura .= file_get_contents('../site_media/html/menu_pie.html');
    }

    ################################# OTROS MÉTODOS ##################################
    # Método constructor

    public function __construct() {
        
    }

    # Método destructor del objeto

    public function __destruct() {
        unset($this);
    }

}

?>