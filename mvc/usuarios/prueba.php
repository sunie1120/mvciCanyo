<?php
require_once 'model.php';

function encriptar_contrasena($contrasena){
        $opciones = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        //$hash=password_hash($contrasena, PASSWORD_BCRYPT, $opciones);
        //$hash = password_hash($passwod, PASSWORD_DEFAULT);
        $hash=hash('sha256', $contrasena);
        return $hash;
    }

//$data = array(
//                'nombre'=>'David',
//                'primer_apellido'=>'Cabello',
//                'segundo_apellido'=>'del Barco',
//                'nick_usuario'=>$contrasena,
//                'contrasena'=>123,
//                'id_rol'=>0
//            );
    
$contrasena='cuenca';
$hash= $contrasena; //hash('sha256', $contrasena);
//echo $hash;
$data = array(
                'nombre'=>'Pol',
                'primer_apellido'=>'aguilera',
                'segundo_apellido'=>'fidalgo',
                'nick_usuario'=>'Pol',
                'contrasena'=>$hash,
                'id_rol'=>'0'
            );
$usuario=new usuario();
$usuario->set($data);
echo $usuario->mensaje;
//$usuario->edit(42,$data);
//echo 'Nombre: '.$usuario->getNombre();
$usuario->get_por_nick_usuario('Pol', 'Pol');
echo $usuario->mensaje;
//echo 'Nombre: '.$usuario->getNombre();

//$usuario->delete(41);


?>