<?php
require_once('constants.php');
require_once('model.php');
require_once('view.php');

function handler() {
    $event = VIEW_GET_USER;
    $uri = $_SERVER['REQUEST_URI'];
    $peticiones = array(SET_USER, GET_USER, DELETE_USER, EDIT_USER,
                        VIEW_SET_USER, VIEW_GET_USER, VIEW_DELETE_USER, 
                        VIEW_EDIT_USER);
    foreach ($peticiones as $peticion) {
        $uri_peticion = MODULO.$peticion.'/';
        if( strpos($uri, $uri_peticion) == true ) {
            $event = $peticion;
        }
    }

    $user_data = helper_user_data();
    $usuario = set_obj();

    switch ($event) {
        case SET_USER:
            $usuario->set($user_data);
            $data = array('mensaje'=>$usuario->mensaje);
            retornar_vista(VIEW_SET_USER, $data);
            break;
        case GET_USER:
            $usuario->get($user_data);
            $data = array(
                'nombre'=>$usuario->nombre,
                'primer_apellido'=>$usuario->primer_apellido,
                'segundo_apellido'=>$usuario->segundo_apellido
            );
            retornar_vista(VIEW_EDIT_USER, $data);
            break;
        case DELETE_USER:
            $usuario->delete($user_data['id_usuario']);
            $data = array('mensaje'=>$usuario->mensaje);
            retornar_vista(VIEW_DELETE_USER, $data);
            break;
        case EDIT_USER:
            $usuario->edit($user_data);
            $data = array('mensaje'=>$usuario->mensaje);
            retornar_vista(VIEW_GET_USER, $data);
            break;
        default:
            retornar_vista($event);
    }
}


function set_obj() {
    $obj = new Usuario();
    return $obj;
}

function helper_user_data() {
    $user_data = array();
    if($_POST) {
        if(array_key_exists('nombre', $_POST)) { 
            $user_data['nombre'] = $_POST['nombre']; 
        }
        if(array_key_exists('primer_apellido', $_POST)) { 
            $user_data['primer_apellido'] = $_POST['primer_apellido']; 
        }
        if(array_key_exists('segundo_apellido', $_POST)) { 
            $user_data['segundo_apellido'] = $_POST['segundo_apellido']; 
        }
        if(array_key_exists('nick_usuario', $_POST)) { 
            $user_data['nick_usuario'] = $_POST['nick_usuario']; 
        }
    } else if($_GET) {
        if(array_key_exists('id_usuario', $_GET)) {
            $user_data = $_GET['id_usuario'];
        }
    }
    return $user_data;
}


handler();
?>