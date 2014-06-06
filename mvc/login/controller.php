<?php
//recuperamos la ssion existente
session_start();
$usuario=htmlspecialchars($_POST['nombre']);
$contra=htmlspecialchars($_POST['contra']);

//asignamos las variables de a sesion a variables locales
$vacaciones = $_SESSION['aprueba_vacaciones'];
$id_usuario = $_SESSION['id_uduario'];
$rol = $_SESSION['id_rol'];

//require_once('constants.php');
//require_once('model.php');
require_once('vista.php');








/* $rol=4;
$id_usuario=39;
$vacaciones='s'; */




?>