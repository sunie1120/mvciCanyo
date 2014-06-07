<?php

function pedir_roles() {
    $roles = new datos_options();
    $roles->query_roles();
    $datos = $roles->get_roles();
    return $datos;
}

function pedir_departamentos() {
    $roles = new datos_options();
    $roles->query_departamentos();
    $datos = $roles->get_departamentos();
    return $datos;
}

function pedir_puestos() {
    $roles = new datos_options();
    $roles->query_puestos();
    $datos = $roles->get_puestos();
    return $datos;
}
