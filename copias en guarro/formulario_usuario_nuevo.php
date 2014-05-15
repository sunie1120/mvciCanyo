<?php
require_once('devuelve_roles.php');
?>
<!DOCTYPE html>
<html lang="es">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <head>
    <meta charset="utf-8" />
    <title>iCanyo Inicio</title>
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="cssII/login.css">	
  </head>
<body>
<link rel="icon" type="image/png" href="imagenes/gatete_favicon.png" />
<link rel="shortcut icon" href="imagenes/gatete_favicon.png" type="image/x-icon" /> 

  <h2><p>Bienvenidos a iCanyo</p></h2>
  
  <form id="nuevo_usuario" action="alta_usuario.php" method="post">
	<input type="text" name="nombre" placeholder="Nombre" required="true" ></input>
	<input type="text" name="primer_apellido" placeholder="Primer apellido" required="true"></input>
	<input type="text" name="segundo_apellido" placeholder="Segundo APellido" required="true"></input>
	<input type="text" name="nick" placeholder="Nick de usuario" required="true"></input>
	<input type="password" name="contrasena" placeholder="Contraseña" required="true"></input>
	<p>Rol:</p>
	<select id="rol_usu" name="rol">
	<?php 
	roles();
	?>
	</select>
	<p>Puesto</p>
	<select id="puesto_usu" name="puesto">
	<?php
	puestos();
	?>
	</select>
	<p>Departamento:</p>
	<select id="departamento_usu" name="departamento">
	<?php
	departamentos();	
	?>
	</select>
	<input type="submit"></input><br><input type="reset"></input>
  </form>
  
  
 <script>
 

</script>
</body>
</html>