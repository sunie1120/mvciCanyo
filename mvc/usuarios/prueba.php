<?php
require_once 'model.php';
$data = array(
                'nombre'=>'David',
                'primer_apellido'=>'Cabello',
                'segundo_apellido'=>'del Barco',
                'nick_usuario'=>'Cabellaco',
                'contrasena'=>123,
                'rol'=>0
            );
//$data = array(
//                'nombre'=>'roi',
//                'primer_apellido'=>'aguilera',
//                'segundo_apellido'=>'fidalgo',
//                'nick_usuario'=>'',
//                'contrasena'=>'',
//                'rol'=>''
//            );
$usuario=new usuario();
$usuario->set($data);
//$usuario->get(42);
//echo 'Nombre: '.$usuario->getNombre();
//$usuario->edit(41,$data);
//echo 'Nombre: '.$usuario->getNombre();
//$usuario->delete(41);
echo $usuario->mensaje;