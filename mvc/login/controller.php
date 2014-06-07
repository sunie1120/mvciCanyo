<?php

session_id();
session_start();
require_once('model.php');
require_once('view_login.php');

if ($_POST) {
    //aplicar los metodos de seguridad
    $usuario = htmlspecialchars($_POST['usuario']);
    $contra = htmlspecialchars($_POST['contra']);
    $nuevo = new validar();

    if ($nuevo->get_por_nick_usuario($usuario, $contra)) {
        $_SESSION['nick_suario'] = $nuevo->getNick();
        $_SESSION['id_usuario'] = $nuevo->getId();
        $_SESSION['id_rol'] = $nuevo->getIdRol();
        $_SESSION['gestiona_usuarios'] = $nuevo->getGestionaUsuarios();
        $_SESSION['aprueba_vacaciones'] = $nuevo->getGestionaVacaciones();
        $_SESSION['id_departamento'] = $nuevo->getIdDepartamento();
        $_SESSION['id_puesto'] = $nuevo->getIdPuesto();
        header('Location:../anuncios/controller_anuncios.php?vista=mostrar_anuncios');
    } else {

        $mensaje = $nuevo->get_mensaje();
        $vista = new view_login();
        $vista->crear_html_login($mensaje);
        print ($vista->get_vista());
    }
} else {
    $vista = new view_login();
    $vista->crear_html_login_index();
    print ($vista->get_vista());
}
?>