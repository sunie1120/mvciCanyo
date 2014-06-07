<?php

session_start();
if($_SESSION['id_rol']==4){
#recuperación de datos
$vista_elegida = htmlspecialchars($_GET['vista']);
$gestiona_usuario = $_SESSION['gestiona_usuarios'];
$aprobar_vacaciones = $_SESSION['aprueba_vacaciones'];

#includes
require_once('model_usuario.php');
require_once('view_usuarios.php');
require_once ('../core/model_datos_options_0.php');
require_once ('../core/model_controla_datos.php');

#Función que se encarga de generar la vista-usuario, a partir de $vista, del rol de usuario, si ha de 
#gestionar usuarios, y si debe aprobar vacaciones

function handler($vista_elegida, $aprobar_vacaciones, $gestiona_usuario) {
    #inicializamos las variables
    $mensaje = ''; //inicializamos el mensaje a vacio
    $user_data = helper_user_data(); //introduce todos lo datos del nuevo usuario en un array
    #comprobamos los datos del usuario
    #si hay datos para tratar
    if (count($user_data) > 0) {
        $usuario = set_obj(); //instanciamos el objeto
        switch ($vista_elegida) {
            case 'alta_usuario':
                $usuario->set($user_data); //damos de alta al usuario
                break;
            case 'baja_usuario':
                $usuario->delete($user_data); //eliminamos al usuario
                break;
            case 'modificar_usuario':
                $usuario->edit($user_data); //modificamos los datos del usuario
                break;
        }
        $mensaje = $usuario->getMensaje(); //recuperamos el mensaje de la acción realizada
    }

    #montamos la vista
    $vista = set_vista();
    $vista->crear_html_usuario($vista_elegida, $aprobar_vacaciones, $gestiona_usuario, $mensaje);
    print $vista->get_vista();
}

# instanciamos la clase 

function set_obj() {
    $obj = new usuario();
    return $obj;
}

# instanciamos la clase 

function set_vista() {
    $obj = new vista_usuarios();
    return $obj;
}

#guardamos los datos en un array

function helper_user_data() {
    $user_data = array();
    if ($_POST) {
        $control_datos = new model_controla_datos();
        if (array_key_exists('nombre', $_POST)) {
            $user_data['nombre'] = htmlspecialchars($_POST['nombre']);
        }
        if (array_key_exists('primer_apellido', $_POST)) {
            $user_data['primer_apellido'] = htmlspecialchars($_POST['primer_apellido']);
        }
        if (array_key_exists('segundo_apellido', $_POST)) {
            $user_data['segundo_apellido'] = htmlspecialchars($_POST['segundo_apellido']);
        }
        if (array_key_exists('nick_usuario', $_POST)) {
            $user_data['nick_usuario'] = htmlspecialchars($_POST['nick_usuario']);
        }
        if (array_key_exists('contrasena', $_POST)) {
            $user_data['contrasena'] = htmlspecialchars($_POST['contrasena']);
        }
        if (array_key_exists('rol', $_POST)) {
            $user_data['id_rol'] = htmlspecialchars($_POST['rol']);
        }
        if (array_key_exists('id_usuario', $_POST)) {
            $user_data = htmlspecialchars($_POST['id_usuario']);
        }
    }
        return $user_data;
}

handler($vista_elegida, $aprobar_vacaciones, $gestiona_usuario);
}else{
    header('Location:../../');
}
?>
