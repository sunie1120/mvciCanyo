<?php
#Crea dinamicamente el menu
function crear_menu($rol,$vacaciones) {
    #INICIALIZAR variables menu
    $menu=file_get_contents('mvc/site_media/html/menu_basic.html');
    $menuVaca="";
    $menuUsu="";

    #MODIFICACION variables menú
    #Gestion de usuarios
    if($rol==4){
        $menuUsu=file_get_contents('mvc/site_media/html/menu_control_usuarios.html');
    }

    #Gestion vacaciones
    if($vacaciones==true){
        $menuVaca=file_get_contents('mvc/site_media/html/menu_vacaciones.html');
    }

    #Crear menú
    $menu=str_replace('{Aprobar vacaciones}', $menuUsu, $menu);
    $menu=str_replace('{Gestion usuarios}', $menuUsu, $menu);
    
    return $menu;
}

function retornar_vista($rol,$vacaciones) {
    #INICIALIZAR la variables
    $template=file_get_contents('mvc/site_media/html/estructura.html');
    $titulo="iCanyo";
    $cuerpo=file_get_contents('mvc/site_media/html/cuerpo_anuncios.html');
    $menu=crear_menu($rol,$vacaciones);
    #GENERAR VISTA
    $template = str_replace('{titulo}', $titulo, $template);
    $template = str_replace('{menu}', $menu, $template);
    $template = str_replace('{cuerpo}', $cuerpo, $template);

    print $template;
}
?>