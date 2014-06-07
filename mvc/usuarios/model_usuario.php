<?php

# Importar modelo de abstracción de base de datos
require_once('../core/db_abstract_model.php');

class usuario extends DBAbstractModel {
    ############################### PROPIEDADES ################################

    protected $id_usuario;
    protected $nombre;
    protected $primer_apellido;
    protected $segundo_apellido;
    protected $nick_usuario;
    private $contrasena;
    private $id_rol;

    ################################# MÉTODOS ##################################
    ############################### SET ################################
    /**
     * Metodo que modifica el nombre 
     * @param string $nombre
     */

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Metodo que modifica el primer apellido 
     * @param string $primer_apellido
     */
    public function setPrimer_apellido($primer_apellido) {
        $this->primer_apellido = $primer_apellido;
    }

    /**
     * Metodo que modifica el nick_usuario 
     * @param string $nick_usuario
     */
    public function setNick_usuario($nick_usuario) {
        $this->nick_usuario = $nick_usuario;
    }

    /**
     * Metodo que modifica la contrasena 
     * @param string $contrasena
     */
    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    /**
     * Metodo que modifica el id del rol 
     * @param int $id_rol
     */
    public function setId_rol($id_rol) {
        $this->id_rol = $id_rol;
    }

    ############################### GET ################################
    /**
     * Metodo que devuelve el nombre 
     * @return string $nombre
     */

    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Metodo que devuelve el primer apellido 
     * @return string $primer_apellido
     */
    public function getPrimer_apellido() {
        return $this->primer_apellido;
    }

    /**
     * Metodo que devuelve el nick_usuario 
     * @return string $nick_usuario
     */
    public function getNick_usuario() {
        return $this->nick_usuario;
    }

    /**
     * Metodo que devuelve la contrasena 
     * @return string $contrasena
     */
    public function getContrasena() {
        return $this->contrasena;
    }

    /**
     * Metodo que devuelve el id del rol 
     * @return string $id_rol
     */
    public function getId_rol() {
        return $this->id_rol;
    }

    /**
     * Metodo que devuelve el mensaje de la accion realizada 
     * @return string $id_rol
     */
    public function getMensaje() {
        return $this->mensaje;
    }
    ############################### COMPROBACIONES ################################
    private function comprobar_datos_ok($user_data = array()){
        $query = "UPDATE `icanyo`.`usuario` SET";
            if ($user_data['nombre'] != '') {
                if (strlen ($user_data['nombre']) > 1 && strlen ($user_data['nombre']) < 101) {
                    $this->mensaje .= $this ///estoy aqui
                }
            }
            if ($user_data['primer_apellido'] != '') {

            }
            if ($user_data['segundo_apellido'] != '') {

            }
            if ($user_data['nick_usuario'] != '') {

            }
            if ($user_data['contrasena'] != '') {

            }
            if ($user_data['rol'] != '') {

            }
    }
    ############################### OTROS ################################

    public function edit($id_usuario = '', $user_data = array()) {
        
        foreach ($user_data as $propiedad => $valor) {
            $this->$propiedad = $valor;
        }

        if ($id_usuario != '') {

            $query = "UPDATE `icanyo`.`usuario` SET";
            if ($user_data['nombre'] != '') {
                $query .=" `nombre` = '$this->nombre'";
            }
            if ($user_data['primer_apellido'] != '') {
                $query .=", `primer_apellido` = '$this->primer_apellido'";
            }
            if ($user_data['segundo_apellido'] != '') {
                $query .=", `segundo_apellido` = '$this->segundo_apellido'";
            }
            if ($user_data['nick_usuario'] != '') {
                $query .=", `nick_usuario` = '$this->nick_usuario'";
            }
            if ($user_data['contrasena'] != '') {
                //$query .=", `contrasena` = '$this->contrasena'";
                $query .=", `contrasena` = PASSWORD('$this->contrasena')";
            }
            if ($user_data['rol'] != '') {
                $query .=", `id_rol` = '$this->id_rol'";
            }
            $query .=" WHERE `usuario`.`id_usuario` = $id_usuario;";
        }

        $this->query = $query;
        $this->execute_single_query();
        $this->mensaje = 'Usuario modificado';
    }

    # Traer datos de un usuario

    public function get($user_data = array()) {
        if ($user_data['id_usuario'] != '') {
            $this->query = "
                SELECT      *
                FROM        usuario
                WHERE       id_usuario = '$id_usuario'
            ";
            $this->get_results_from_query();
        }

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuario encontrado';
        } else {
            $this->mensaje = 'Usuario no encontrado';
        }
    }

    # Traer datos de un usuario

    public function get_por_nick_usuario($user_data = array()) {
        if ($user_data['nick_usuario'] != '') {
            $nick_usuario = $user_data['nick_usuario'];
            $this->query = "
                SELECT      *
                FROM        usuario
                WHERE       nick_usuario = '$nick_usuario'
            ";
            $this->get_results_from_query();
        }

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            if ($this->contrasena == hash('sha256', $user_data['contrasena'])) {
                $this->mensaje = '<i class="icon-thumbs-up on-right on-left"
                           style="background: green;
                           color: white;
                           padding: 10px;
                           border-radius: 50%"></i>Usuario Valido';
            } else {
                $this->mensaje = '<i class="icon-thumbs-down on-right on-left"
                           style="background:red;
                           color: white;
                           padding: 10px;
                           border-radius: 50%"></i>Usuario o contraseña incorrectos';
            }
            $this->mensaje = '<i class="icon-thumbs-up on-right on-left"
                           style="background: green;
                           color: white;
                           padding: 10px;
                           border-radius: 50%"></i>Usuario Valido';
        } else {
            $this->mensaje = '<i class="icon-thumbs-down on-right on-left"
                           style="background:red;
                           color: white;
                           padding: 10px;
                           border-radius: 50%"></i>Usuario o contraseña incorrectos';
        }
    }

    # Crear un usuario

    public function set($user_data = array()) {
        $this->mensaje = "";
        $nick = "";
        $nick_existe = TRUE;
        $nick = $user_data['nick_usuario'];
        $this->query = "SELECT * FROM usuario WHERE nick_usuario = '$nick'";
        $this->get_results_from_query();
        if ($this->rows[0] == NULL)
            $nick_existe = FALSE;
        echo($nick_existe);
        if (!$nick_existe) {
            $nombre = $user_data['nombre'];
            $primer_apellido = $user_data['primer_apellido'];
            $segundo_apellido = $user_data['segundo_apellido'];
            $contrasena = $user_data['contrasena'];
            $id_rol = $user_data['id_rol'];
            $nick = $user_data['nick_usuario'];
            $query = "INSERT INTO `icanyo`.`usuario` (`id_usuario`, `nombre`, `primer_apellido`, `segundo_apellido`, `nick_usuario`, `contrasena`, `id_rol`) VALUES (NULL, '$nombre', '$primer_apellido', '$segundo_apellido', '$nick', '$contrasena', '$id_rol');";
            $this->query = $query;
            $this->execute_single_query();
            $this->mensaje = '<i class="icon-thumbs-up on-right on-left"
                           style="background: green;
                           color: white;
                           padding: 10px;
                           border-radius: 50%"></i>Usuario agregado exitosamente';
        } else {
            $this->mensaje = '<i class="icon-thumbs-down on-right on-left"
                           style="background:red;
                           color: white;
                           padding: 10px;
                           border-radius: 50%"></i>El nick de usuario ya existe, debe escoger uno nuevo.';
        }
    }

    # Eliminar un usuario

    public function delete($user_data = array()) {
        $id_usuario = $user_data['id_usuario'];
        $query = "DELETE FROM `icanyo`.`usuario` WHERE `usuario`.`id_usuario` =$id_usuario";
        $this->query = $query;
        $this->execute_single_query();
        $this->mensaje = '<i class="icon-thumbs-up on-right on-left"
                           style="background: green;
                           color: white;
                           padding: 10px;
                           border-radius: 50%"></i>Usuario eliminado';
    }

    # Método constructor

    function __construct() {
        
    }

    # Método destructor del objeto

    function __destruct() {
        unset($this);
    }

}

?>
