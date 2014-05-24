<?php
require_once('../site_media/php/devuelve_roles.php');
#Constantes para diccionario alta usuarios
$TMP_PUESTOS = puestos();
$TMP_ROLES = roles();
$TMP_DEPARTAMENTOS = departamentos();
/**
 * diccionario que contiene los <options> para seleccionar puesto, rol y departamento
 * dentro del formulario de alta de un usuario
 */
$diccionario_alta_usuarios=array(
    'funcion_puestos'=>$TMP_PUESTOS,
    'funcion_roles'=>$TMP_ROLES,
    'funcion_departamentos'=>$TMP_DEPARTAMENTOS
);
$diccionario_titulos=array(
    'alta_usuarios'=>'iCanyo Alta Usuarios',
    'baja_usuarios'=>'iCanyo Baja Usuarios',
    'modificacion_usuarios'=>'iCanyo Modificar Usuarios',
);
?>