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

    public function is_dato_ok($dato) {
        $ok = true;
        $patronURL = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/";
        $patronIP = "/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/";
        echo 'hata aqui';
        //longitud
        if (strlen($dato) < 1) {
            $this->mensaje .= 'Debe completar todos los campos indicados. ';
            $ok = false;
            echo 'entra en menor que 1';
        }
        IF (strlen($dato) > 100) {
            $this->mensaje .= 'Campo demasiado largo. ';
            $ok = false;
            echo 'entra en mayor que 100';
        }
        //inyección url e ip
        if (($dato == $patronURL) || ($dato == $patronIP)) {
            $dato = '';
            $this->mensaje .= 'Error: ha introducido un dato incorrecto. ';
            $ok = false;
            echo 'entra ip url';
        }
        return $ok;
    }

    private function is_contrasena_ok($dato) {
        $ok = true;
        $patronURL = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/";
        $patronIP = "/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/";

        if ($dato != '') {
            //longitud
            if (strlen($dato) < 6) {
                $this->mensaje .= 'La contraseña debe de tener una longitud mínima de 6 caracteres. ';
                $ok = false;
            }
            IF (strlen($dato) > 20) {
                $this->mensaje .= 'La contraseña no puede tener más de 20 caracteres';
                $ok = false;
            }
            //inyección url e ip
            if (($dato == $patronURL) || ($user_data['nombre'] == $patronIP)) {
                $dato = '';
                $this->mensaje .= 'Error: ha introducido un dato incorrecto. ';
                $ok = false;
            }
        }
        return $ok;
    }

    ############################### OTROS ################################

    public function edit($id_usuario = '', $user_data = array()) {
        $this->mensaje = "";
        
            if ($id_usuario != '') {
                $query = "UPDATE `icanyo`.`usuario` SET";
                if ($user_data['nombre'] != '') {
                    $query .=" `nombre` = '".$user_data['nombre']."'";
                }
                if ($user_data['primer_apellido'] != '') {
                    $query .=", `primer_apellido` = '".$user_data['primer_apellido']."'";
                }
                if ($user_data['segundo_apellido'] != '') {
                    $query .=", `segundo_apellido` = '".$user_data['segundo_apellido']."'";
                }
                if ($user_data['nick_usuario'] != '') {
                    $query .=", `nick_usuario` = '".$user_data['nick_usuario']."'";
                }
                if ($user_data['contrasena'] != '') {
                    $query .=", `contrasena` = PASSWORD('".$user_data['contrasena']."')";
                }
                if ($user_data['rol'] != '') {
                    $query .=", `id_rol` = '".$user_data['id_rol']."'";
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
            $query = "INSERT INTO `icanyo`.`usuario` (`id_usuario`, `nombre`, `primer_apellido`, `segundo_apellido`, `nick_usuario`, `contrasena`, `id_rol`) VALUES (NULL, '$nombre', '$primer_apellido', '$segundo_apellido', '$nick', PASSWORD('$contrasena'), '$id_rol');";
            $this->query = $query;
            $this->execute_single_query();
            $this->mensaje = 'Usuario agregado exitosamente';
        } else {
            $this->mensaje = 'El nick de usuario ya existe, debe escoger uno nuevo.';
        }
    }

    # Eliminar un usuario

    public function delete($user_data = array()) {
        $id_usuario = $user_data['id_usuario'];
        $query = "DELETE FROM `icanyo`.`usuario` WHERE `usuario`.`id_usuario` =$id_usuario";
        $this->query = $query;
        $this->execute_single_query();
        $this->mensaje = 'Usuario eliminado';
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
