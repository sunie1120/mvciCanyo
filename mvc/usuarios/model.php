<?php
# Importar modelo de abstracción de base de datos
require_once('../core/db_abstract_model.php');


class usuario extends DBAbstractModel {

    ############################### PROPIEDADES ################################
    protected $id_usuario;
    public $nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $nick_suario;
    private $contrasena;
    public $id_rol;
    public $foto;


    ################################# MÉTODOS ##################################
    # Traer datos de un usuario
    public function get($nick_suario='') {
        if($nick_suario != '') {
            $this->query = "SELECT id_usuario, nombre, primer_apellido, segund_apellido, id_rol, id_usuario, contrasena FROM usuario WHERE nick_suario = '$nick_suario'";
            $this->get_results_from_query();
        }

        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuario encontrado';
        } else {
            $this->mensaje = 'Usuario no encontrado';
        }
    }

    # Crear un nuevo usuario
    public function set($user_data=array()) {
        if(array_key_exists('nick_usuario', $user_data)) {
            $this->get($user_data['nick_usuario']);
            if($user_data['nick_usuario'] != $this->nick_usuario) {
                foreach ($user_data as $campo=>$valor) {
                    $$campo = $valor;
                }
                $this->query = "INSERT INTO usuario (nombre, primer_apellido, segundo_apellido, nick_usuario, contrasena, id_rol, foto VALUES ('$nombre', '$primer_apellido',$seguno_apellido', '$nick_usuario', '$id_rol','$contrasena','$foto')";
                $this->execute_single_query();
                $this->mensaje = 'Usuario agregado exitosamente';
            } else {
                $this->mensaje = 'El usuario ya existe';
            }
        } else {
            $this->mensaje = 'No se ha agregado al usuario';
        }
    }

    # Modificar un usuario
    public function edit($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $campo = $valor;
        }
		$this->query = "UPDATE usuario SET";
                
		if($nombre!=""){
			$this->query .=" nombre='$nombre'";
		}
		if($primer_apellido!=""){
			$this->query .=" primer_apellido='$primer_apellido'";
		}
		if($segundo_apellido!=""){
			$this->query .=" segundo_apellido='$segundo_apellido'";
		}
		if($nick_usuario!=""){
			$this->query .=" nick_usuario='$nick_usuario'";
		}
		if($contrasena!=""){
			$this->query .=" contrasena='$contrasena'";
		}
		if($id_rol!=""){
			$this->query .=" id_rol='$id_rol'";
		}
		if($foto!=""){
			$this->query .=" foto='$foto'";
		}
		$this->query .="WHERE nick_usuario = '$nick_usuario'";
		
        $this->execute_single_query();
        $this->mensaje = 'Usuario modificado';
    }

    # Eliminar un usuario
    public function delete($user_email='') {
        $this->query = "DELETE FROM usuario WHERE nick_usuario = '$nick_usuario'";
        $this->execute_single_query();
        $this->mensaje = 'Usuario eliminado';
    }

    # Método constructor
    function __construct() {
        $this->db_name = 'usuario';
    }

    # Método destructor del objeto
    function __destruct() {
        unset($this);
    }
}
?>
