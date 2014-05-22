<?php
session_start();
#recuperación de datos
//TODO: cambiar el nombre de vista a vissta-elegida
$vista= 'alta';// htmlspecialchars($_POST['enlace']);
//TODO: cambiar a boolean
$vacaciones='s';//htmlspecialchars($_SESSION['vacaciones']);
$rol=4;//htmlspecialchars($_SESSION['id_rol']);
$mensaje='';
#includes
//require_once('constants.php');
require_once('model.php');
require_once('view.php');

#Función que se encarga de generar la vista-usuario, a partir de $vista, del rol de usuario, si ha de 
function handler($vista,$rol,$vacaciones,$mensaje) {
    //echo "XXXX : entra el handler ".$vista;
    $user_data = helper_user_data($rol,$vacaciones,$mensaje);
    $usuario = new usuario();
    //$mensaje=$usuario.mensaje;
    switch ($vista){
        case ('alta'):
            compon_vista_alta();
            break;
    }
    
    
    //retornar_vista($vista,$rol,$vacaciones,$mensaje);
}
# instanciamos la clase 
 function set_obj() {
    $obj = new usuario();
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
            $user_data['rol'] = htmlspecialchars ($_POST['rol']); 
        }
        //Falta la foto
        
    } else if($_GET) {
        if(array_key_exists('id_usuario', $_GET)) {
            $user_data = $_GET['id_usuario'];
        }
    }
    return $user_data;
}

handler($vista,$rol,$vacaciones,$mensaje);
?>
