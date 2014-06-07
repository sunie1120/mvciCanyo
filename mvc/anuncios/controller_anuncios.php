<?php
session_start();
/**
 * Controlador de la clase anuncios, se encarga instanciar la clase anuncios ..................
 *  
 */

# Realizamos los includes
require_once('view_anuncios.php');
require_once('model_anuncios.php');

#Obtenemos los valores de las variables necesarias para la función handler
$vista_elegida = htmlspecialchars($_GET['vista']);
$gestiona_usuario = true; //$_SESSION['gestiona_usuarios'];
$aprobar_vacaciones = true; //$_SESSION['aprueba_vacaciones'];
$puesto='JFADM';//$_SESSION['id_puesto'];
$datos=  pedir_anuncios_publicos();
print_r($datos);

/**
 * Función que se encarga de generar la vista-anuncios, a partir de $vista,
 * si ha de gestionar usuarios, y si debe aprobar vacaciones.
 * 
 * @param type $vista_elegida
 * @param type $aprobar_vacaciones
 * @param type $gestiona_usuario
 */
function handler($vista_elegida, $aprobar_vacaciones, $gestiona_usuario,$puesto) {
    #inicializamos las variables
    $mensaje = ''; //inicializamos el mensaje a vacio
    //$user_data = helper_user_data(); //introduce todos lo datos del nuevo usuario en un array
    #montamos la vista
    $vista =  new view_anuncios();
    
    switch ($vista_elegida) {
            
            case 'crear_anuncios':
                //$mensaje = $anuncio->getMensaje(); //recuperamos el mensaje de la acción realizada
                break;
            case 'eliminar_anuncios':
               
                break;
            case 'modificar_anuncios':
                
                break;
            default:
                $vista->crear_html_ver_anuncios($vista_elegida, $aprobar_vacaciones, $gestiona_usuario, $mensaje,$puesto);
                break;
        }

        
    print $vista->get_vista();
}

/**
 * Función que devuelve los anuncios públicos en un array
 * @return array $datos 
 */
function pedir_anuncios_publicos(){
    $anuncios=new anuncios();
    $anuncios->query_anuncios_publicos();
    $datos=$anuncios->get();
    return $datos;
}

function set_vista() {
    $obj = new view_anuncios();
    return $obj;
}

handler($vista_elegida, $aprobar_vacaciones, $gestiona_usuario,$puesto);
?>