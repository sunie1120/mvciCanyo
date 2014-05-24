<?php

require_once('constants.php');

class genera_vista {
    ############################### PROPIEDADES ################################
    private $estructura;
    ################################# MÉTODOS ##################################

    /**
     * Devuelve el contenido de la cabecera de todas las paginas
     * @return string $estructura
     */

    function get_vista() {
        return $this->estructura;
    }
    
    /**
     * Devuelve el contenido de la cabecera de todas las paginas
     * @return string $estructura
     */

    function retorna_cabecera($diccionario_titulos) {
        $this->estructura = file_get_contents('../site_media/html/cabecera.html');
        $this->estructura =str_replace('{titulo}', $diccionario_titulos[$this->vista], $this->estructura);
    }

    /**
     * Devuelve el menú común a todos los usuarios
     * @return string $estructura
     */
    function retorna_menu_basico() {
        $this->estructura .= file_get_contents('../site_media/html/pie.html');
    }

    /**
     * Devuelve el menú para aquellos usuarios que deban aprobar las vacaciones
     * de otros usuarios
     * @return string $estructura
     */
    function retorna_menu_aprueba_vacaciones() {
        $this->estructura .= file_get_contents('../site_media/html/menu_aprueba_vacaciones.html');
    }

    /**
     * Devuelve el menú para aquellos usuarios deban gestionar a los usuarios
     * @return string $estructura
     */
    function retorna_menu_control_usuarios() {
        $this->estructura .= file_get_contents('../site_media/html/menu_control_usuarios.html');
    }

    /**
     * Cierra el menú
     * @return string $estructura
     */
    function retorna_pie_menu() {
        $this->estructura .= file_get_contents('../site_media/html/menu_pie.html');
    }

    /**
     * Devuelve el cuerpo de la pagina para poder dar de alta un usuario
     * @return string $estructura
     */
    function retorna_cuerpo_alta_usuarios($diccionario_alta_usuarios) {
        //recupreamos el html del cuerpo de crear usuarios
        $this->estructura .= file_get_contents('../site_media/html/cuerpo_crear_usuarios.html');
        //sustituimos con los valores del diccionario
        foreach ($diccionario_alta_usuarios as $clave => $valor) {
            $this->estructura = str_replace('{' . $clave . '}', $valor, $this->estructura);
        }
    }

    /**
     * Devuelve el cuerpo de la pagina para poder dar de baja un usuario
     * @return string $estructura
     */
    function retorna_cuerpo_baja_usuarios() {
        $this->estructura .= file_get_contents('../site_media/html/cuerpo_elimminar_usuarios.html');
    }

    /**
     * Devuelve el cuerpo de la pagina para poder modificar un usuario
     * @return string $estructura
     */
    function retorna_cuerpo_modificar_usuarios() {
        $this->estructura .= file_get_contents('../site_media/html/cuerpo_modificar_usuarios.html');
    }

    /**
     * Devuelve el pie de la pagina
     * @return string $estructura
     */
    function retorna_pie() {
        $this->estructura .= file_get_contents('../site_media/html/pie.html');
    }
    
    
    # Método constructor
    function __construct($vista_elegida,$aprobar_vacaciones,$gestiona_usuario,$mensaje='') {
        $this->retorna_cabecera($diccionario_titulos);
        $this->retorna_menu_basico();
        if($aprobar_vacaciones==true){
            $this->retorna_menu_aprueba_vacaciones();
        }
        if($gestiona_usuario==true){
            $this->retorna_menu_control_usuarios();
        }
        switch ($vista_elegida){
            case('alta_usuarios'):
                $this->retorna_cuerpo_alta_usuarios($diccionario_alta_usuarios);
                break;
            case('baja_usuarios'):
                $this->retorna_cuerpo_baja_usuarios();
                break;
            case('modificar_usuarios'):
                $this->retorna_cuerpo_modificar_usuarios();
                break;
        }
        $this->estructura =str_replace('{mensaje}', $mensaje, $this->estructura);
        $this->retorna_pie();
        
    }

    # Método destructor del objeto
    function __destruct() {
        unset($this);
    }
}

?>