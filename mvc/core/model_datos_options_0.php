<?php

require_once '../core/db_abstract_model.php';

class datos_options extends DBAbstractModel {
    ############################### PROPIEDADES ################################

    private $roles;
    private $puestos;
    private $departamentos;

    ################################# MÉTODOS ##################################
    # Método constructor

    function __construct() {
        $this->roles = '';
        $this->puestos = '';
        $this->departamentos = '';
        $this->query_roles();
        $this->query_puestos();
        $this->query_departamentos();
    }

    # Método destructor del objeto

    function __destruct() {
        unset($this);
    }

    ############################### SET ################################
    /**
     * Función que busca todos los roles existentes
     */

    function query_roles() {
        $this->query = "select id_rol, nombre_rol from rol";
        $this->get_results_from_query();
        $this->roles = $this->rows;
    }

    /**
     * Función que busca todos los puestos existentes
     */
    function query_puestos() {
        $this->query = "select id_puesto,nombre_puesto from puesto order by nombre_puesto";
        $this->get_results_from_query();
        $this->puestos = $this->rows;
    }

    /**
     * Función que busca todos los puestos existentes
     */
    function query_departamentos() {
        $this->query = "select id_departamento,nombre_departamento from departamento order by nombre_departamento";
        $this->get_results_from_query();
        $this->departamentos = $this->rows;
    }

    ############################### GET ################################
    /**
     * Función que devuelve los puestos existentes
     */

    public function get_roles() {
        return $this->roles;
    }

    /**
     * Función que devuelve los puestos existentes
     */
    public function get_puestos() {
        return $this->puestos;
    }

    /**
     * Función que devuelve los puestos existentes
     */
    public function get_departamentos() {
        return $this->departamentos;
    }

    ############################### OTROS ################################

    protected function delete() {
        
    }

    protected function edit() {
        
    }

    protected function get() {
        
    }

    protected function set() {
        
    }

}
