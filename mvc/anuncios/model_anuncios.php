<?php

require_once('../core/db_abstract_model.php');

/**
 * Clase anuncios, sirve para crear, modificar y eliminar un anuncio, así como
 * para listar todos los anuncios existentes para un determinado usuario
 *
 * @author Olaia
 */
class anuncios extends DBAbstractModel {
    ############################### PROPIEDADES ################################

    private $anuncios_generales;
    private $anuncios_departamento;
    private $anuncios_puesto;
    private $anuncios_usuario;
    private $anuncio;

    ############################### METODOS ################################

    public function delete() {
        
    }

    public function edit() {
        
    }

    public function get() {
        return $this->anuncios_generales;
    }

    public function get_por_departamento() {
        return $this->anuncios_departamento;
    }

    public function get_por_puesto() {
        return $this->anuncios_puesto;
    }

    public function get_por_usuario() {
        return $this->anuncios_usuario;
    }

    public function get_por_id() {
        return $this->anuncio;
    }

    public function query_anuncios_publicos() {
        $this->query = "SELECT titulo_anuncio, cuerpo_anuncio, nombre, primer_apellido, segundo_apellido, nombre_departamento FROM `anuncio` natural join `usuario` natural join `usuario_pertenece` natural join `departamento` WHERE `publico` LIKE TRUE AND `fecha_fin_anuncio` > CURDATE( ) OR `fecha_fin_anuncio` IS NULL";
        $this->get_results_from_query();
        $this->anuncios_generales = $this->rows;
    }

    public function query_por_departamento($id_departamento) {
        $this->query = "SELECT *\n"
                . " FROM ANUNCIO\n"
                . " NATURAL JOIN VISIBILIDAD_DEPARTAMENTOS\n"
                . " NATURAL JOIN USUARIO\n"
                . " NATURAL JOIN DEPARTAMENTO\n"
                . "WHERE `id_departamento` LIKE '$id_departamento' and `fecha_fin_anuncio` > CURDATE( ) OR `fecha_fin_anuncio` IS NULL";
        $this->get_results_from_query();
        $this->anuncios_departamento = $this->rows;
    }

    public function query_por_puesto($id_puesto) {
        $this->query = "SELECT titulo_anuncio, cuerpo_anuncio, nombre, primer_apellido, segundo_apellido, nombre_departamento
                        FROM `ANUNCIO`
                        NATURAL JOIN USUARIO
                        NATURAL JOIN USUARIO_PERTENECE
                        NATURAL JOIN VISIBILIDAD_PUESTOS
                        NATURAL JOIN DEPARTAMENTO
                        WHERE ID_PUESTO LIKE '$id_puesto' and `fecha_fin_anuncio` > CURDATE( ) OR  `fecha_fin_anuncio` IS NULL";
        $this->get_results_from_query();
        $this->anuncios_puesto = $this->rows;
    }

    public function query_de_usuario($id_usuario) {
        $this->query = "SELECT * FROM `anuncio`  where id_usuario=$id_usuario and `fecha_fin_anuncio` > CURDATE( ) OR  `fecha_fin_anuncio` IS NULL ";
        $this->get_results_from_query();
        $this->anuncios_usuario = $this->rows;
    }

    public function query_por_id($id_anuncio) {
        $this->query = "SELECT * FROM `anuncio` WHERE id_anuncio=$id_anuncio and `fecha_fin_anuncio` > CURDATE( ) OR  `fecha_fin_anuncio` IS NULL ";
        $this->get_results_from_query();
        $this->anuncio = $this->rows;
    }

    public function set($datos = array()) {
        
    }

}
