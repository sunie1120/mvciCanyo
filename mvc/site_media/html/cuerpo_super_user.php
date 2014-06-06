<?php
require_once('../php/devuelve_roles.php');
/*if($_POST['rol']!='igreb'){
//echo "usuario sin permisos";
//header('Location: http://www.google.com/');
exit;
}else{
header('Location: "gestion_aplicacion.php"');
exit;
}*/
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>iCanyo</title>
        <meta name="description" content="gestor de comunicados, tareas, vacaciones y agenda, para entidades y empresas">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../docs/css/metro-bootstrap.css">
        <link rel="stylesheet" href="../docs/css/metro-bootstrap-responsive.css">
        <link  rel="stylesheet" href="../docs/css/iconFont.css">
        <link href="../css/iCanyo.css" rel="stylesheet">

		
		
    </head>
    <body class="metro">
	<link rel="icon" type="image/png" href="../../../imagenes/gatete_favicon.png" />
        <div class="grid">
            <div class="row">
                <!-- Menú -->
				<nav class="span3">
                    <ul  class="dropdown-menu dark open keep-open" >
                        <li class="menu-title">
                            <i class="icon-clipboard-2"></i>
                            Anuncios
						</li>
                        <li><a href="#">Anuncios generales</a></li>
                        <li><a href="#">Anuncios de mi departamento</a></li>
                        <li><a href="#">Mis Anuncios</a></li>
                        <li><a href="#">Crear Anuncios</a></li>
                        <li><a href="#">Todos los anuncios</a></li>
                        <li class="divider"></li>
                        <li class="menu-title">
                            <i class="icon-volume-2"></i>
                            Tareas
                        </li>
                        <li><a href="#">Mis tareas</a></li>
                        <li><a href="#">Tareas asignadas a otros</a></li>
                        <li><a href="#">Crear tareas</a></li>
                        <li class="divider"></li>
						<li class="menu-title">
                            <i class="icon-shipping"></i>
                            Agenda
                        </li>
                        <li><a href="#">Hoy</a></li>
                        <li><a href="#">Agenda</a></li>
                        <li><a href="#">Crear Cita</a></li>
                        <li class="divider"></li>
                        <li class="menu-title">
                            <i class="icon-sun"></i>
                            Vacaciones
                        </li>
                        <li><a href="#">Ver mis vacaciones</a></li>
                        <li><a href="#">Vacaciones de mi departamento</a></li>
                        <li><a href="#">Vacaciones de toda la empresa</a></li>
                        <li><a href="#">Solicitar vacaciones</a></li>
                        {Aprobar vacaciones}
                        <li class="divider"></li>
						{Gestion usuarios}
                    </ul>
                </nav>
                <!-- Cuadros -->
                <div class="span12 offset4">

					<div class="tile triple double-vertical bg-white" style="border: solid 3px orange">
						<form id="getion_departamentos" action="#" method="post">
						<center>
							<div class="input-control text size3 mg3 info-state">
								<input type="text" id="name_departamento" name="name_departamento" title="No debe contener números ni caracteres especiales" placeholder="Nombre departamento"></input> 
							</div>
							<div class="input-control text size3 mg3  info-state" data-role="input-control">
								<input type="text"  id="descripcion_departamento" name="descripcion_departamento" title="No debe contener números ni caracteres especiales" placeholder="Descripcion departamento"/></input> 
							</div>
							<br>
							<input type="submit" class="bg-orange fg-white bg-hover-amber" value="Guardar departamento"></input>
						</form>	
						</center>
					</div>
					<div class="tile triple double-vertical bg-white" style="border: solid 3px orange">
						<center>
						<form id="getion_puestos" action="#" method="post">
							<div class="input-control text size3 mg3 info-state">
								<input type="text" id="name_puesto" name="name_puesto" title="No debe contener números ni caracteres especiales" placeholder="Nombre puesto"></input> 
							</div>
							<div class="input-control text size3 mg3  info-state" data-role="input-control">
								<input type="text"  id="descripcion_puesto" name="descripcion_puesto" title="No debe contener números ni caracteres especiales" placeholder="Descripcion puesto"/></input> 
							</div>
							<br>
							<input type="submit" class="bg-orange fg-white bg-hover-amber" value="Guardar puesto"></input>
						</form>	
						</center>
					</div>
					<div class="tile double-vertical bg-steel"></div>

					
					<div class="tile triple triple-vertical bg-orange">
                        <div class="tile-content text-center">
 							<h5 class="item-title-secondary">Seleccione el departamento o puesto que quiere eliminar</h5>
							
							<br>
							
							<div class="input-control size3 select">		
								<h5 class="item-title-secondary">Puesto</h5>
							<form id="elimina_puesto" action="" method="">
								<select id="puesto_usu" name="puesto">
								<?php 
								puestos();
								?>
								</select>
								<br>
							<input type="submit" class="bg-cyan fg-white bg-hover-amber" value="ELIMINA PUESTO"></input>
							</form>
							</div>
							<br>
							<div class="input-control size3 select">		
								<h5 class="item-title-secondary">Departamento</h5>
							<form id="elimina_departamento" action="" method="">
								<select id="departamento_usu" name="departamento">
								<?php
								departamentos();	
								?>
								</select>
								<br>
								<input type="submit" class="bg-cyan fg-white bg-hover-amber" value="ELIMINA DEPARTAMENTO"></input>
							</form>
							</div>
                         </div>  
					</div>
					<div class="tile double">
                        <div class="brand">
                            <div class="times" data-role="times" data-alarm="hh:mm:ss"></div>
                        </div>
                    </div>
					<div class="tile  bg-steel"></div>
					<div class="tile  bg-amber"></div>
					<div class="tile quadro  bg-teal"></div>
					<div class="tile  double bg-steel"></div>
					
					<div class="tile bg-black">
						<img src="../../../imagenes/gatete1.png" alt="iGreb, la mascota de iCanyo: un gato naranja atigrado, diseñado por Javier Bailen" title="iGreb, la mascota de iCanyo: un gato naranja atigrado, diseñado por Javier Bailen"></img>
					</div>
							
                    
					<div class="tile bg-black">
						<img src="../../../imagenes/logoiCanyo.jpg" alt="El logotipo de iCanyo: cuadrados naranjas sobre fondo sable." title="El logotipo de iCanyo: cuadrados naranjas sobre fondo sable."></img>
					</div>
				</div>
				
					
			
            </div>
					<!-- <div class="tile triple double-vertical bg-amber">
					<center>
						    <div class="tile triple double-vertical bg-transparent" data-role="live-tile" data-effect="slideLeft" >
								<div class="tile-content">
								</div>
								<div class="tile-content"><br><br><br><h5 class="item-title">El nombre, los apellidos y el nick no deben contener números ni caracteres especiales.</h5>
								</div>
								<div class="tile-content "><img src="../../../imagenes/gatete1.png" style="width='50px' height='50px'" alt="iGreb, la mascota de iCanyo: un gato naranja atigrado, diseñado por Javier Bailen" title="iGreb, la mascota de iCanyo: un gato naranja atigrado, diseñado por Javier Bailen" width="60%"></img>
								</div>
								<div class="tile-content"><br><br><br><h5 class="item-title">La contraseña debe tener entre 6 y 20 caracteres,  un digito minimo y un alfanumérico, y no puede contener caracteres especiales.</h5>
								</div>
								<div class="tile-content"><img src="../../../imagenes/logoiCanyo.jpg" alt="El logotipo de iCanyo: cuadrados naranjas sobre fondo sable." title="El logotipo de iCanyo: cuadrados naranjas sobre fondo sable."></img>
								</div>
							</div>		
							
					</center>	
					</div> -->
					
					
                </div>
            </div>
        </div>
	</div>
		<script src="../docs/js/jquery/jQuery.min.js"></script>
		<script src="../docs/js/jquery/jQuery.widget.min.js"></script>
		<script src="../docs/js/metro.min.js"></script>
		<script src="../docs/js/jquery/jquery.mousewheel.js"></script>
		<script src="../js/iCanyo.js"></script>

	
	</body>
	
	
    </html>
	