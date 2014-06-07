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
$gestiona_usuario = $_SESSION['gestiona_usuarios'];
$aprobar_vacaciones = $_SESSION['aprueba_vacaciones'];
$departamento=$_SESSION['id_departamento'];
$puesto=$_SESSION['id_puesto'];

/**
 * Función que se encarga de generar la vista-anuncios, a partir de $vista,
 * si ha de gestionar usuarios, y si debe aprobar vacaciones.
 * 
 * @param type $vista_elegida
 * @param type $aprobar_vacaciones
 * @param type $gestiona_usuario
 */
function handler($vista_elegida, $aprobar_vacaciones, $gestiona_usuario,$puesto, $departamento) {
    #inicializamos las variables
    $mensaje = ''; //inicializamos el mensaje a vacio
    //$user_data = helper_user_data(); //introduce todos lo datos del nuevo usuario en un array
    #pedimos los anuncios
    $anucnos_publicos=pedir_anuncios_publicos();
    $anuncios_puesto=pedir_anuncios_puesto($puesto);
    $anuncios_departamento=pedir_anuncios_departamento($departamento);
     echo $departamento;
    //print_r($anuncios_departamento);echo "<br/><br/><br/>";
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
                $vista->crear_html_ver_anuncios($vista_elegida, $aprobar_vacaciones, $gestiona_usuario,$anuncios_puesto, $anuncios_departamento);
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

/**
 * Función que devuelve los anuncios de un puesto concreto
 * @return array $datos 
 */
function pedir_anuncios_puesto($id_puesto){
    $anuncios=new anuncios();
    $anuncios->query_por_puesto($id_puesto);
    $datos=$anuncios->get_por_puesto();
    return $datos;
}

/**
 * Función que devuelve los anuncios de un puesto concreto
 * @return array $datos 
 */
function pedir_anuncios_departamento($id_departamento){
    $anuncios=new anuncios();
    $anuncios->query_por_departamento($id_departamento);
    $datos=$anuncios->get_por_departamento();
    return $datos;
}


function set_vista() {
    $obj = new view_anuncios();
    return $obj;
}

handler($vista_elegida, $aprobar_vacaciones, $gestiona_usuario,$puesto, $departamento);
?>