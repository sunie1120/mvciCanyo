<?php
$rol=4;
$id_usuario=39;

$template=file_get_contents('mvc/site_media/html/estructura.html');
switch ($rol){
    case 4:
         $menu=file_get_contents('mvc/site_media/html/menu_basic.html');
         $menuUsu=file_get_contents('mvc/site_media/html/menu_control_usuarios.html');
         $menuVaca="";
         $menu=str_replace('{Aprobar vacaciones}', $menuUsu, $menu);
         $menu=str_replace('{Gestion usuarios}', $menuUsu, $menu);
        break;
}

$cuerpo=file_get_contents('mvc/site_media/html/cuerpo_anuncios.html');

$template = str_replace('{menu}', $menu, $template);
$template = str_replace('{cuerpo}', $cuerpo, $template);

print $template;


