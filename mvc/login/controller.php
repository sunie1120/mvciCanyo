<?php
$usuario=htmlspecialchars($_POST['nombre']);
$contra=htmlspecialchars($_POST['contra']);



require_once('mail_html_model.php');
require_once('mail_txt_model.php');
require_once('vista.php');

$correo= new mail_html_model($cuerpoHtml, $diccionario);
$correo->enviar();

$correo2= new mail_txt_model($cuerpoTxt, $diccionario);
$correo2->enviar();
?>