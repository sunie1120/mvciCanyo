<?php
require_once('funciones_icanyo.php');
$usuario_nombre=htmlspecialchars($_POST['nombre']);
$usuario_primer_apellido=htmlspecialchars($_POST['primer_apellido']);
$usuario_segundo_apellido=htmlspecialchars($_POST['segundo_apellido']);
$usuario_nick=htmlspecialchars($_POST['nick']);
$usuario_contrasena=htmlspecialchars($_POST['contrasena']);
$usuario_puesto=htmlspecialchars($_POST['puesto']);
$usuario_rol=htmlspecialchars($_POST['rol']);
$usuario_departamento=htmlspecialchars($_POST['departamento']);
$foto=htmlspecialchars($_POST['foto']);
//directorio para almacenar la imagen
$directorio_destino="C:\xampp\xampp\htdocs\mvciCanyo\temporales";
$nombre_foto=$usuario_nick."temporal_foto";

//convertimos la imagen en un string
subir_foto($directorio_destino, $nombre_foto);

$conex=conectar_bdd();
/*$query_usuario="insert into usuario nombre, primer_apellido, segundo_apellido,nck:usuario,contrasena, id_rol values($usuario_nombre,$usuario_primer_apellido,$usuario_segundo_apellido,$usuario_nick,$usuario_contrasena,$usuario_rol)";
$query_pertenece="insert into pertenece id_usuario, id_puesto, id_departamento values ($usuario_puesto, $usuario_rol,$usuario_departamento)";


$inserta_usuario=mysql_query($query_usuario,$conex);

$query_usuario_pertenece="insert into pertenece id_usuario, id_puesto, id_departamento values($id_usuario,$usuario_puesto,$usuario_departamento)";
*/


//inicializamos la variable error a 0, si hay errores se modificará a 1
	$error = 0; 

	// Iniciamos la transacción 
	mysql_query("BEGIN");
	// Primera ejecucion
	$query_usuario="insert into usuario (nombre, primer_apellido, segundo_apellido,nick_usuario,contrasena, id_rol) values('$usuario_nombre','$usuario_primer_apellido','$usuario_segundo_apellido','$usuario_nick','$usuario_contrasena','$usuario_rol')";
	$inserta_usuario=mysql_query($query_usuario,$conex);
	echo $query_usuario;
	//$total_filas=mysql_num_rows($inserta_usuario);
	//echo $total_filas;
		//if($total_filas>0){echo "vamos bien";}else{echo "caca";}
	if (!$inserta_usuario){
	//si no logra ejecutar la query entones la variable de error pas a valer 1
		 $error = 1;
	}
	if ($error == 1){
		 // Como ocurrio un error, entonces cancelamos toda la transacción,
		 // y dejamos todo igual hasta antes del BEGIN
		 mysql_query("ROLLBACK");   
		 echo "Ocurrió un error. No se pudieron guardar los datos 1";
	}
	else{
		//No hay error, continuamos con el resto de ejecuciones
		//recupermos el valor del id del usuario recién creado
		$id_usuario_nuevo="select id_usuario from usuario where contrasena='$usuario_contrasena' and nick_usuario='$usuario_nick'";
		$consulta_id=mysql_query($id_usuario_nuevo,$conex);
		$total_filas=mysql_num_rows($consulta_id);
		if($consulta_id>0){echo "vamos bien";}else{echo "caca";}
		while($array_id_nuevo=mysql_fetch_array($consulta_id)){
			$id_nuevo=$array_id_nuevo[0];
		}
			if ($consulta_id){
				$error = 1;
			}
		}
		if ($error == 1){
			 // Como ocurrio un error, entonces cancelamos toda la transacción,
		 // y dejamos todo igual hasta antes del BEGIN
			 mysql_query("ROLLBACK");   
			 echo "Ocurrió un error. No se pudieron guardar los datos 2";
		}else{
		//como no ha ocurrido ningún error aun, continuamos con el rseto de inserciones en la ase de datos
		$query_usuario_pertenece="insert into pertenece (id_usuario, id_puesto, id_departamento) values('$id_nuevo','$usuario_puesto','$usuario_departamento')";
		$inserta_pertenece=mysql_query($query_usuario_pertenece,$conex);
			if ($inserta_pertenece){
					$error = 1;
			}
		}
		if ($error == 1){
			 // Como ocurrio un error, entonces cancelamos toda la transacción,
			// y dejamos todo igual hasta antes del BEGIN
			 mysql_query("ROLLBACK");   
			 echo "Ocurrió un error. No se pudieron guardar los datos 3";
		}
	
	if ($error != 1){
		// No hay error.
		//ejecutamos el commit
		mysql_query("COMMIT");
		echo "Usuario introducido correctamente en la base de datos";
	}
	//cerramos la conexion con la bbdd
mysql_close($conex);
?>