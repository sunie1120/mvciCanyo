<?php

/**
 * Clase que estiende la clase view_1 y que crea la vista de anuncios
 * (ver,crear, eliminar, modificar).
 *
 * @author OLAIA
 */
require_once('../core/view_1.php');

class view_anuncios extends genera_vista {
    ################################# MÉTODOS ##################################

    /**
     * Devuelve el cuerpo de la pagina para poder ver todos los anuncios de ese usuario
     * 
     * @param type $puesto
     * @param type $departamento
     */
    private function retorna_cuerpo_mostrar_anuncios($puesto, $departamento) {
        //recupreamos el html del cuerpo de crear usuarios
        $this->estructura .= file_get_contents('../site_media/html/cuerpo_anuncios.html');
        //creamos el html de los anuncios para el div de anuncios generales_1
        $options_generales_1 = $this->crear_anuncios_generales_1();
        $this->estructura = str_replace('{general_1}', $options_generales_1, $this->estructura);
        //creamos el html de los anuncios para el div de anuncios generales_2
        $options_generales_2 = $this->crear_anuncios_generales_2();
        $this->estructura = str_replace('{general_2}', $options_generales_2, $this->estructura);
        $options_por_puestos = $this->crear_anuncios_por_puesto($puesto);
        $this->estructura = str_replace('{por_puestos}', $options_por_puestos, $this->estructura);
        $options_por_departamento = $this->crear_anuncios_por_departamento($departamento);
        $this->estructura = str_replace('{por_departamento}', $options_por_departamento, $this->estructura);
    }

    /**
     * 
     * @param type $anuncios_por_puesto
     * @return string
     */
    private function crear_anuncios_por_puesto($anuncios_por_puesto) {
        //$anuncios_por_puesto = pedir_anuncios_puesto($id_puesto);
        $total_anuncios = count($anuncios_por_puesto);
        $colores = array('bg-lime', 'bg-green', 'bg-emerald');

        $anuncios_puesto = "";
        for ($i = 0; $i < $total_anuncios; $i++) {
            $color_elegido = rand(0, 2);
            if ($anuncios_por_puesto[$i] != null) {
                $anuncios_puesto .="<div class=\"slide $colores[$color_elegido] con_cuerpo\"  value=\"" . $anuncios_por_puesto[$i]['cuerpo_anuncio'] . "\" id=\"" . $anuncios_por_puesto[$i]['nombre'] . " " . $anuncios_por_puesto[$i]['primer_apellido'] . " " . $anuncios_por_puesto[$i]['segundo_apellido'] . "\" name=\"" . $anuncios_por_puesto[$i]['titulo_anuncio'] . "\">
                                        <input type=\"hidden\" id=\"cuerpo_anuncio\"></input>
                                        <center><h3 class=\"fg-white\">" . $anuncios_por_puesto[$i]['titulo_anuncio'] . "</h3></center>
                                        <br/>
                                        <p><small><strong>" . $anuncios_por_puesto[$i]['nombre'] . "<strong> " . $anuncios_por_puesto[$i]['primer_apellido'] . " " . $anuncios_por_puesto[$i]['segundo_apellido'] . "<small><i><br>" . $anuncios_por_puesto[$i]['nombre_departamento'] . "</i></p>
                                    </div>;";
            }
        }
        return $anuncios_puesto;
    }

    /**
     * 
     * @param type $anuncios_por_departamento
     * @return string
     */
    private function crear_anuncios_por_departamento($anuncios_por_departamento) {
        //$anuncios_por_puesto = pedir_anuncios_departamento($id_departamento);
        $colores = array('bg-teal', 'bg-cyan', 'bg-cobalt');
        $anuncios_por_departamento_1 = "";
        for ($i = 0; $i < count($anuncios_por_departamento); $i++) {
            $color_elegido = rand(0, 2);
            if ($anuncios_por_departamento[$i] != null) {
                $anuncios_por_departamento_1 .="<div class=\"slide $colores[$color_elegido] con_cuerpo\"  value=\"" . $anuncios_por_departamento[$i]['cuerpo_anuncio'] . "\" id=\"" . $anuncios_por_departamento[$i]['nombre'] . " " . $anuncios_por_departamento[$i]['primer_apellido'] . " " . $anuncios_por_departamento[$i]['segundo_apellido'] . "\" name=\"" . $anuncios_por_departamento[$i]['titulo_anuncio'] . "\">
                                        <input type=\"hidden\" id=\"cuerpo_anuncio\"></input>
                                        <center><h3 class=\"fg-white\">" . $anuncios_por_departamento[$i]['titulo_anuncio'] . "</h3></center>
                                        <br/>
                                        <p><small><strong>" . $anuncios_por_departamento[$i]['nombre'] . "<strong> " . $anuncios_por_departamento[$i]['primer_apellido'] . " " . $anuncios_por_departamento[$i]['segundo_apellido'] . "<small><i><br>" . $anuncios_por_departamento[$i]['nombre_departamento'] . "</i></p>
                                        </div>;";
            }
        }
        return $anuncios_por_departamento_1;
    }

    /**
     * Función que le da formato html a la primera mitad de los anuncios generales
     * @return string $anuncios_generales_1
     */
    private function crear_anuncios_generales_1() {
        $anuncios_generales = pedir_anuncios_publicos();
        $total_anuncios_publicos = count($anuncios_generales);
        $colores = array('bg-indigo', 'bg-magenta', 'bg-pink');

        $anuncios_generales_1 = "";
        for ($i = 0; $i < floor($total_anuncios_publicos / 2); $i++) {
            $color_elegido = rand(0, 2);
            if ($anuncios_generales[$i] != null) {
                $anuncios_generales_1 .="<div class=\"slide $colores[$color_elegido] con_cuerpo\"  value=\"" . $anuncios_generales[$i]['cuerpo_anuncio'] . "\" id=\"" . $anuncios_generales[$i]['nombre'] . " " . $anuncios_generales[$i]['primer_apellido'] . " " . $anuncios_generales[$i]['segundo_apellido'] . "\" name=\"" . $anuncios_generales[$i]['titulo_anuncio'] . "\">
                                        <input type=\"hidden\" id=\"cuerpo_anuncio\"></input>
                                        <center><h3 class=\"fg-white\">" . $anuncios_generales[$i]['titulo_anuncio'] . "</h3></center>
                                        <br/>
                                        <p><small><strong>" . $anuncios_generales[$i]['nombre'] . "<strong> " . $anuncios_generales[$i]['primer_apellido'] . " " . $anuncios_generales[$i]['segundo_apellido'] . "<small><i><br>" . $anuncios_generales[$i]['nombre_departamento'] . "</i></p>
                                    </div>;";
            }
        }
        return $anuncios_generales_1;
    }

    /**
     * Función que le da formato html a la segunda mitad de los anuncios generales
     * @return string $anuncios_generales_1
     */
    private function crear_anuncios_generales_2() {
        $anuncios_generales = pedir_anuncios_publicos();
        $total_anuncios_publicos = count($anuncios_generales);
        $colores = array('bg-red', 'bg-orange', 'bg-amber');

        $anuncios_generales_2 = "";
        for ($i = floor($total_anuncios_publicos / 2); $i < $total_anuncios_publicos; $i++) {
            $color_elegido = rand(0, 2);
            if ($anuncios_generales[$i] != null) {
                $anuncios_generales_2 .="<div class=\"slide $colores[$color_elegido] con_cuerpo\" value=\"" . $anuncios_generales[$i]['cuerpo_anuncio'] . "\" id=\"" . $anuncios_generales[$i]['nombre'] . " " . $anuncios_generales[$i]['primer_apellido'] . " " . $anuncios_generales[$i]['segundo_apellido'] . "\" name=\"" . $anuncios_generales[$i]['titulo_anuncio'] . "\">
				<input type=\"hidden\" id=\"cuerpo_anuncio\"></input>
				<center><h3 class=\"fg-white\">" . $anuncios_generales[$i]['titulo_anuncio'] . "</h3></center>
				<br/>
				<p><small><strong>" . $anuncios_generales[$i]['nombre'] . "<strong> " . $anuncios_generales[$i]['primer_apellido'] . " " . $anuncios_generales[$i]['segundo_apellido'] . "<small><i><br>" . $anuncios_generales[$i]['nombre_departamento'] . "</i></p>
			</div>;";
            }
        }
        return $anuncios_generales_2;
    }

    /**
     * Genera la estructura html de la parte de anuncios dependiendo de 
     * vista en la que se encuentra el usuario.
     * 
     * @param type $vista_elegida
     * @param type $aprobar_vacaciones
     * @param type $gestiona_usuario
     * @param type $mensaje
     */
    public function crear_html_ver_anuncios($vista_elegida, $aprobar_vacaciones, $gestiona_usuario, $puesto, $departamento) {
        $this->retorna_cabecera($vista_elegida);
        $this->retorna_menu_basico();
        $this->retorna_menu_aprueba_vacaciones($aprobar_vacaciones);
        if ($gestiona_usuario == true) {
            $this->retorna_menu_control_usuarios();
        }
        $this->retorna_pie_menu();
        switch ($vista_elegida) {
            case('mostrar_anuncios'):
                $this->retorna_cuerpo_mostrar_anuncios($puesto, $departamento);
                break;
        }
        $this->retorna_pie();
    }

}
