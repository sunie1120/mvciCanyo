<?php
require_once('../php/devuelve_roles.php');
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
				<form id="cerrar_sesion" name="cerrar" action="#" method="post">
				 <input type="button" class="bg-orange fg-white bg-hover-amber" value="Cerrar sesión"></input>
				 </form>
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
					<div class="tile triple triple-vertical bg-white" style="border: solid 3px orange">
					<center>
					<form id="nuevo_usuario" action="alta_usuario.php" method="post">
						<div class="input-control text size3 mg3 info-state">
							<input type="text" id="name" name="nombre" title="No debe contener números ni caracteres especiales" placeholder="Nombre" required></input> 
						</div>
						<div class="input-control text size3 mg3  info-state" data-role="input-control">
							<input type="text"  id="papellido" name="primer_apellido" title="No debe contener números ni caracteres especiales" placeholder="Primer apellido" required/></input> 
						</div>
						<div class="input-control text size3 mg3  info-state">
							<input type="text"  id="sapellido" name="segundo_apellido" title="No debe contener números ni caracteres especiales" placeholder="Segundo Apellido" required/></input> 
						</div>
						<div class="input-control text size3 mg3  info-state">
							<input type="text"  id="alias" name="nick"  placeholder="Nick de usuario" title="No debe contener números ni caracteres especiales" required/></input> 
						</div>
						<div class="input-control password size3 mg3  info-state">
							<input type="password"  id="contra" name="contrasena"   placeholder="Contraseña" title="Entre 6 y 20 caracteres,  un digito mínimo y un alfanumérico. No puede contener caracteres especiales." required/></input> 
							<button class="btn-reveal" tabindex="-1" type="button"></button>
						</center>
					</div>					
					<div class="tile quadro triple-vertical bg-orange">
                        <div class="tile-content text-center">
 							<!--<h5 class="item-title-secondary">Seleccione una imagen para el perfil</h5>
							<div class="input-control file size3" >
								<input type="file" name="foto">
								<button class="btn-file"></button></input>
							</div>-->
							<br>
							<div class="input-control size3 select">		
								<h5 class="item-title-secondary">Rol</h5>
								<select id="rol_usu" name="rol">
								<?php echo "rol";
								roles();
								?>
								</select>
							</div>
							<br>
							<div class="input-control size3 select">		
								<h5 class="item-title-secondary">Puesto</h5>
								<select id="puesto_usu" name="puesto">
								<?php 
								puestos();
								?>
								</select>
							</div>
							<br>
							<div class="input-control size3 select">		
								<h5 class="item-title-secondary">Departamento</h5>
								<select id="departamento_usu" name="departamento">
								<?php
								departamentos();	
								?>
								</select>
							</div>
								<br/>
							
							<div id="aprobador_vacaciones" name="aprobar_vacaciones" class="input-control switch">
								<label>
								<input type="checkbox" />
								Puede aprobar vacaciones
								</label>
							</div>
							
                         <div class="brand bg-black">
                            <span class="label fg-white text-right">
							<input type="reset" value="Restaura" class="bg-steel fg-white bg-hover-red">
                             <input type="submit" class="bg-orange fg-white bg-hover-amber" value="Guardar usuario"></input>
					</form>
                            </span>
                         </div>  
						</div>
                    </div>
					<div class="tile triple double-vertical bg-amber">
					<center>
						    <div class="tile triple double-vertical bg-transparent" data-role="live-tile" data-effect="slideLeft" >
								<div class="tile-content"><?php devuelve_roles() ?>
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
					</div>
					<div class="tile  bg-steel"></div>
					<div class="tile  bg-amber"></div>
					<div class="tile double  bg-teal">
					</div>
					<div class="tile bg-black">
						<img src="../../../imagenes/gatete1.png" alt="iGreb, la mascota de iCanyo: un gato naranja atigrado, diseñado por Javier Bailen" title="iGreb, la mascota de iCanyo: un gato naranja atigrado, diseñado por Javier Bailen"></img>
					</div>
                    <div class="tile double">
                        <div class="brand">
                            <div class="times" data-role="times" data-alarm="hh:mm:ss"></div>
                        </div>
                    </div>
					<div class="tile bg-black">
						<img src="../../../imagenes/logoiCanyo.jpg" alt="El logotipo de iCanyo: cuadrados naranjas sobre fondo sable." title="El logotipo de iCanyo: cuadrados naranjas sobre fondo sable."></img>
					</div>
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
	