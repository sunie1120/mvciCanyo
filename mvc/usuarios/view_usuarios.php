<?php

/**
 * Clase que estiende la clase view_1 y que crea la vista de gestion de usuarios
 * (altas, bajas, modificación).
 *
 * @author OLAIA
 */
require_once('../core/view_1.php');
require_once('../core/controller_datos_options_0.php');

class vista_usuarios extends genera_vista {
    ################################# MÉTODOS ################################## 
    /**
     * Función que crea el cuerpo de alta usuarios
     */

    function crea_cuerpo_alta_usuarios() {
        //recupreamos el html del cuerpo de crear usuarios
        $this->estructura .= file_get_contents('../site_media/html/cuerpo_crear_usuarios.html');
        $roles = pedir_roles();
        $departamentos = pedir_departamentos();
        $puestos = pedir_puestos();

        $options_roles = "";
        foreach ($roles as $clave => $valor) {
            if ($valor["id_rol"] != "") {
                $options_roles .= "<option value='" . $valor["id_rol"] . "'>" . $valor["nombre_rol"] . "</option>";
            }
        }
        $this->estructura = str_replace('{funcion_roles}', $options_roles, $this->estructura);

        $options_puestos = "";
        foreach ($puestos as $clave => $valor) {
            if ($valor["id_puesto"] != "") {
                $options_puestos .= "<option value='" . $valor["id_puesto"] . "'>" . $valor["nombre_puesto"] . "</option>";
            }
        }
        $this->estructura = str_replace('{funcion_puestos}', $options_puestos, $this->estructura);

        $options_departamentos = "";
        foreach ($departamentos as $clave => $valor) {
            if ($valor["id_departamento"] != "") {
                $options_departamentos .= "<option value='" . $valor["id_departamento"] . "'>" . $valor["nombre_departamento"] . "</option>";
            }
        }
        $this->estructura = str_replace('{funcion_departamento}', $options_departamentos, $this->estructura);
    }

    /**
     * Devuelve el cuerpo de la pagina para poder dar de baja un usuario
     * 
     */
    function crea_cuerpo_baja_usuarios() {
        $this->estructura .= file_get_contents('../site_media/html/cuerpo_eliminar_usuarios.html');
    }

    /**
     * Devuelve el cuerpo de la pagina para poder modificar un usuario
     * 
     */
    function crea_cuerpo_modificar_usuarios() {
        $this->estructura .= file_get_contents('../site_media/html/cuerpo_modificar_usuarios.html');
    }

    /**
     * Genera la estructura html de la parte gestion de usuarios dependiendo de 
     * vista en la que se encuentra el usuario.
     */
    function crear_html_usuario($vista_elegida, $aprobar_vacaciones, $gestiona_usuario, $mensaje = '') {
        $this->retorna_cabecera($vista_elegida);
        $this->retorna_menu_basico();
        $this->retorna_menu_aprueba_vacaciones($aprobar_vacaciones);
        if ($gestiona_usuario == true) {
            $this->retorna_menu_control_usuarios();
        }
        $this->retorna_pie_menu();
        switch ($vista_elegida) {
            case('alta_usuario'):
                $this->crea_cuerpo_alta_usuarios(); //retorna_cuerpo_alta_usuarios();
                break;
            case('baja_usuario'):
                $this->crea_cuerpo_baja_usuarios();
                break;
            case('modificar_usuario'):
                $this->crea_cuerpo_modificar_usuarios();
                break;
        }
        $this->estructura = str_replace('{mensaje}', '<br/><h5>' . $mensaje . '</h5>', $this->estructura);
        $this->retorna_pie();
    }

}
