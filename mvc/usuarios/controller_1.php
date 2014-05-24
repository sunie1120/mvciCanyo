<?php
session_start();
#recuperación de datos
$vista_elegida= 'alta_usuarios';// htmlspecialchars($_POST['enlace']);
$vacaciones=true;//htmlspecialchars($_SESSION['vacaciones']);
$aprobar_vacaciones=true;//htmlspecialchars($_SESSION['aprobar_vacaciones']);

#includes
require_once('model.php');
require_once('view_1.php');

#Función que se encarga de generar la vista-usuario, a partir de $vista, del rol de usuario, si ha de 
function handler($user_data,$vista_elegida,$aprobar_vacaciones,$gestiona_usuario,$mensaje) {
    $user_data = helper_user_data();
    $usuario = set_obj();
    $usuario->set($user_data);
    $mensaje=$usuario->getMensaje();
    $vista= set_vista($vista_elegida,$aprobar_vacaciones,$gestiona_usuario,$mensaje);
    print $vista->get_vista();
    
}
# instanciamos la clase 
 function set_obj() {
    $obj = new usuario();
    return $obj;
}

# instanciamos la clase 
 function set_vista($vista_elegida,$aprobar_vacaciones,$gestiona_usuario,$mensaje) {
    $obj = new genera_vista($vista_elegida,$aprobar_vacaciones,$gestiona_usuario,$mensaje);
    return $obj;
}

#guardamos los datos en un array
function helper_user_data() {
    $user_data = array();
    if($_POST) {
        if(array_key_exists('nombre', $_POST)) { 
            $user_data['nombre'] = htmlspecialchars ($_POST['nombre']); 
        }
        if(array_key_exists('primer_apellido', $_POST)) { 
            $user_data['primer_apellido'] = htmlspecialchars ($_POST['primer_apellido']); 
        }
        if(array_key_exists('segundo_apellido', $_POST)) { 
            $user_data['segundo_apellido'] = htmlspecialchars ($_POST['segundo_apellido']); 
        }
        if(array_key_exists('nick_usuario', $_POST)) { 
            $user_data['nick_usuario'] = htmlspecialchars ($_POST['nick_usuario']); 
        }
        if(array_key_exists('contrasena', $_POST)) { 
            $user_data['contrasena'] = htmlspecialchars ($_POST['contrasena']); 
        }
        if(array_key_exists('rol', $_POST)) { 
            
            $user_data['id_rol'] = htmlspecialchars ($_POST['rol']); 
            
        }
        //Falta la foto
        
    } else if($_GET) {
        if(array_key_exists('id_usuario', $_GET)) {
            $user_data = $_GET['id_usuario'];
        }
    }
    return $user_data;
}

handler($user_data,$vista_elegida,$aprobar_vacaciones,$gestiona_usuario,$mensaje);
?>
