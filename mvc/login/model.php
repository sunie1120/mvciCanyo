<?php

# Importar modelo de abstracción de base de datos
require_once('../core/db_abstract_model.php');

class validar extends DBAbstractModel {
    ############################### PROPIEDADES ################################

    private $nick_usuario;
    private $contrasena;
    private $id_usuario;
    private $id_rol;
    private $vacaciones;
    public $datos_usuario;
    private $gestiona_usuarios;
    private $id_departamento;
    private $id_puesto;

    ################################# MÉTODOS ##################################
    # métodos abstractos heredados de la clase padre   

    function get() {
        
    }

    function set() {
        
    }

    function edit() {
        
    }

    function delete() {
        
    }

    public function get_mensaje() {
        return $this->mensaje;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getNick() {
        return $this->nick_usuario;
    }

    public function getId() {
        return $this->id_usuario;
    }

    public function getIdRol() {
        return $this->id_rol;
    }

    public function getGestionaVacaciones() {
        return $this->vacaciones;
    }

    public function getGestionaUsuarios() {
        return $this->gestiona_usuarios;
    }
    
    public function getIdPuesto() {
        return $this->id_puesto;
    }

    public function getIdDepartamento() {
        return $this->id_departamento;
    }
    public function get_por_nick_usuario($nick_usuario = '', $contra = '') {
        $this->datos_usuario = '';
        $this->query = "
                        SELECT      *
                        FROM        usuario natural join usuario_pertenece
                        WHERE       nick_usuario = '$nick_usuario' and contrasena = PASSWORD('$contra')
				";
        $this->get_results_from_query();
        $this->datos_usuario = $this->rows;

        if ($this->datos_usuario[0]!='') {
            $this->contrasena = $this->datos_usuario[0]['contrasena'];
            $this->nick_usuario = $this->datos_usuario[0]['nick_usuario'];
            $this->id_usuario = $this->datos_usuario[0]['id_usuario'];
            $this->id_rol = $this->datos_usuario[0]['id_rol'];
            $this->id_puesto=$this->datos_usuario[0]['id_puesto'];
            $this->id_departamento=$this->datos_usuario[0]['id_departamento'];
            $this->id_puesto=$this->datos_usuario[0]['id_puesto'];
            
            if ($this->id_rol > 0) {
                $this->vacaciones = true;
            } else {
                $this->vacaciones = false;
            }
            if ($this->id_rol == 5) {
                $this->gestiona_usuarios = true;
            } else {
                $this->gestiona_usuarios = true;
            }
            return true;
        } else {
            $this->mensaje = 'Usuario o contraseña incorrectos.';
            return false;
        }
    }

//    public function get_por_nick_usuario($nick_usuario = '') {
//        if ($nick_usuario != '') {
//            $this->query = "
//					SELECT      *
//					FROM        usuario
//					WHERE       nick_usuario = '$nick_usuario'
//				";
//            $this->datos_usuario = $this->get_results_from_query();
//        }
//        if (count($this->datos_usuario) > 0) {
//            $this->contrasena = $this->datos_usuario[0]['contrasena'];
//            $this->nick_usuario = $this->datos_usuario[0]['nick_usuario'];
//            $this->id_usuario = $this->datos_usuario[0]['id_usuario'];
//            $this->id_rol = $this->datos_usuario[0]['id_rol'];
//
//            if ($this->id_rol > 0) {
//                $this->vacaciones = true;
//            } else {
//                $this->vacaciones = false;
//            }
//            if ($this->id_rol == 5) {
//                $this->gestiona_usuarios = true;
//            } else {
//                $this->gestiona_usuarios = true;
//            }
//        }
//    }
    # Método constructor

    function __construct() {
        
    }

}
