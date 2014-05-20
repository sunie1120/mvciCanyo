<?php
/**
 * Funcion que devuelve el menú correspondiente a un usuario concreto
 * @return string $menu
 */
function crear_menu($rol,$vacaciones){
       //valores por defecto de las variables
       $menu = file_get_contents('../site_media/html/menu_basic.html');
       $menu_vacas='';
       $menu_usuarios='';
       //modificacion del menú de vacaciones
       if($vacaciones=='s'){
          $menu_vacas=file_get_contents('../site_media/html/menu_vacaciones.html'); 
       }
       //modificación del menú de gestión de usuarios
       if ($rol==4){
          $menu_usuarios=file_get_contents('../site_media/html/menu_control_usuarios.html');
       }
       //crear el menú completo
       $menu = str_replace('{Aprobar vacaciones}',$menu_vacas,$menu);
       $menu = str_replace('{Gestion usuarios}',$menu_vacas,$menu);
       
       return $menu;
}

/**
 * Funcion que devuelve la vista al usuario
 * @return void
 */
function retornar_vista($rol,$vacaciones) {
    //valores por defecto
    $html = file_get_contents('../site_media/html/user_template.html');
    $menu=crear_menu($rol,$vacaciones);
    $cuerpo=file_get_contents('../site_media/html/user_agregar.html');
    
    $html = str_replace('{menu}', $menu,$html);
    $html = str_replace('{cuerpo}', $cuerpo,$html);
    $html = str_replace('{mensaje}', $Amensajes[$posicion],$html);
    
    print $html;
}





/*
$diccionario = array(
    /*'subtitle'=>array(VIEW_SET_USER=>'Crear un nuevo usuario',
                      VIEW_GET_USER=>'Buscar usuario',
                      VIEW_DELETE_USER=>'Eliminar un usuario',
                      VIEW_EDIT_USER=>'Modificar usuario'
                     ),*/
    /*'links_menu'=>array(
        'VIEW_SET_USER'=>MODULO.VIEW_SET_USER.'/',
        'VIEW_GET_USER'=>MODULO.VIEW_GET_USER.'/',
        'VIEW_EDIT_USER'=>MODULO.VIEW_EDIT_USER.'/',
        'VIEW_DELETE_USER'=>MODULO.VIEW_DELETE_USER.'/'
    ),
    'form_actions'=>array(
        'SET'=>'/mvc/'.MODULO.SET_USER.'/',
        'GET'=>'/mvc/'.MODULO.GET_USER.'/',
        'DELETE'=>'/mvc/'.MODULO.DELETE_USER.'/',
        'EDIT'=>'/mvc/'.MODULO.EDIT_USER.'/'
    )
);

function get_template($form='get') {
    $file = '../site_media/html/user_'.$form.'.html';
    $template = file_get_contents($file);
    return $template;
}

function render_dinamic_data($html, $data) {
    foreach ($data as $clave=>$valor) {
        $html = str_replace('{'.$clave.'}', $valor, $html);
    }
    return $html;
}

function retornar_vista($vista, $data=array(),$rol,$vacaciones) {
    global $diccionario;
    $menu=crear_menu($rol,$vacaciones);
    
    $html = get_template('template');
    $html = str_replace('{subtitulo}', $diccionario['subtitle'][$vista], $html);
    $html = str_replace('{cuerpo}', get_template($vista), $html);
    $html = render_dinamic_data($html, $diccionario['form_actions']);
    $html = render_dinamic_data($html, $diccionario['links_menu']);
    $html = render_dinamic_data($html, $data);

    // render {mensaje}
    if(array_key_exists('nombre', $data)&&
       array_key_exists('apellido', $data)&&
       $vista==VIEW_EDIT_USER) {
        $mensaje = 'Editar usuario '.$data['nombre'].' '.$data['apellido'];
    } else {
        if(array_key_exists('mensaje', $data)) {
            $mensaje = $data['mensaje'];
        } else {
            $mensaje = 'Datos del usuario:';
        }
    }
    $html = str_replace('{mensaje}', $mensaje, $html);

    print $html;
}*/
?>
