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
        <title>{titulo}</title>
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
               <!--  <nav class="span3">
                    <ul  class="dropdown-menu dark open keep-open" >
                        <li class="menu-title">
                            <i class="icon-clipboard-2 fg-cyan"></i>
                            Anuncios
						</li>
                        <li><a href="#">Anuncios generales</a></li>
                        <li><a href="#">Anuncios de mi departamento</a></li>
                        <li><a href="#">Mis Anuncios</a></li>
                        <li><a href="#">Crear Anuncios</a></li>
                        <li><a href="#">Todos los anuncios</a></li>
                        <li class="divider"></li>
                        <li class="menu-title">
                            <i class="icon-shipping fg-green"></i>
                            Tareas
                        </li>
                        <li><a href="#">Mis tareas</a></li>
                        <li><a href="#">Tareas asignadas a otros</a></li>
                        <li><a href="#">Crear tareas</a></li>
                        <li class="divider"></li>
						<li class="menu-title">
                            <i class=" icon-book fg-amber"></i>
                            Agenda
                        </li>
                        <li><a href="#">Hoy</a></li>
                        <li><a href="#">Agenda</a></li>
                        <li><a href="#">Crear Cita</a></li>
                        <li class="divider"></li>
                        <li class="menu-title">
                            <i class="icon-sun fg-orange"></i>
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
                </nav> -->
                <!-- Cuadros -->
				<div class="span12 offset4">
				<form id="crear_anuncios" method="post" action="controller_anuncios_0.php">
			
						<div class="tile  bg-orange triple-vertical">
						</div>

						<div id="titulo_anuncio" class="tile triple bg-teal">
							<h5>Título</h5>
							<center>
								<textarea id="titulo" rows="1" cols="35" placeholder="Introduzca un título para el anuncio" autofocus style="text-align: center;" required name="titulo_anuncio"></textarea>
							</center>
						</div>
						<div class="tile triple bg-green">
						</div>
						
						<div id="texto_anuncio" class="tile triple double-vertical bg-teal">
							<h5>Anuncio</h5>
							<center>
								<textarea id="cuerpo_anuncio" rows="7" cols="35" placeholder="Introduzca un texto para el anuncio" style="text-align: center;" name="texto_anuncio" ></textarea>
							</center>
						</div>

						
						<div class="tile triple double-vertical bg-amber" id="selecciona_publico">
							<h6>Si selecciona la opción Público, el anuncio será visualizado por todos los usuarios</h6>
							<input  id="publico"  type="radio" name="vis_publica" required>Público</input><br>
							<input   id="no_publico" type="radio" name="vis_publica" required>Seleccionar quien va a ver la publicación</input>

						</div>
						

						<div id="texto_anuncio" class="tile triple double-vertical bg-teal" style="overflow:auto;">
							<h6>Seleccione los usuarios que podrán ver el anuncio según su departamento</h6>
							{departamentos_checkbox}	<br>						
							<?php
							departamentos_checkbox();
							?>
						</div>


						
						<div id="texto_anuncio" class="tile triple double-vertical bg-teal" style="overflow:auto;">
							<h6>Seleccione los usuarios que podrán ver el anuncio según puesto</h6>
							{puestos_checkbox}<br>
							<?php
							puestos_checkbox();
							?>
						</div>
						
						<div class="tile double-vertical bg-amber">
						<br>
						  <input type="submit" value="Publicar" id="publicar_button">
						  <br><br>
						  <input type="reset" value="Reiniciar">
						</div>
				</form>
				</div>
			</div>
		<script src="../docs/js/jquery/jQuery.min.js"></script>
		<script src="../docs/js/jquery/jQuery.widget.min.js"></script>
		<script src="../docs/js/metro.min.js"></script>
		<script src="../docs/js/jquery/jquery.mousewheel.js"></script>
		<script src="../js/iCanyo.js"></script>
		<script type="text/javascript" src="../js/carga_usuarios_eliminar.js"></script>

		<div>
		<img src="../../../imagenes/logoiCanyo.jpg" style="width: 4%; height:4%;"></img>
		<div id="footer" class="tile bg-lightRed">
			<h5 id="texto_footer">AguantaMaryJane Estudios 2014</h5>
		</div>
			</body>
	 </div> 
    </html>
	