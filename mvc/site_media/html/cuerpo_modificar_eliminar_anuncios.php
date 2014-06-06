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
                </nav>
                <!-- Cuadros -->
				<script>
$(document).ready(function() {
$(".modificar_anuncio").on("click", function(){
var nombre_usuario = $(this).attr("name");
var nick_usuario;
var myId = $(this).attr("id");
var contenido_usuario_modificar = "<form method='post' action='#'><div class='input-control text size3 mg3 info-state'><input type='text' id='name' name='nombre' placeholder='Nuevo nombre'></input></div><br/><div class='input-control text size3 mg3  info-state' data-role='input-control'><input type='text'  id='papellido' name='primer_apellido'  placeholder='Nuevo primer apellido'></input></div><br/><div class='input-control text size3 mg3  info-state'><input type='text'  id='sapellido' name='segundo_apellido'  placeholder='Nuevo segundo Apellido'></input></div><br/><div class='input-control text size3 mg3  info-state'><input type='text'  id='alias' name='nick_usuario'  placeholder='Nuevo nick de usuario' ></input></div><br/><input type='hidden' name='id_usuario_oculto' value="+myId+"><br/><input type='checkbox' id='aprobador_vacaciones' name='aprobar_vacaciones'/><p>Aprueba vacaciones</p><input type='submit' name='modificar_usuario' id="+myId+" class='bg-orange fg-white bg-hover-amber modificar_user' value='Modificar'></input></form>"; 

	$.Dialog({
	flat: false,
	shadow: true,
	title: 'Usuario a modificar',
	content: contenido_usuario_modificar,
	height: 300,
	widht: 300
	});
});
});
				</script>
				<div class="span12 offset4">
					<div class="tile bg-teal  quadro"  scroll="auto">
					<center><h4 style="color: orange">Selecciona los anuncios que quieres eliminar o modificar</h4></center>
					</div>
					<div class="tile bg-teal triple">
					</div>
					<div id="ventana"class="tile bg-teal quadro-vertical quadro"scroll="auto">
					<!-- 	muestra todos los anuncios de ese usuario -->
					
					<?php
					anuncios_por_user();
					?>
					
					
					</div>
					<div class="tile bg-teal triple  quadro-vertical">
					</div>
					<div class="tile bg-teal triple">
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

		<!-- <script type="text/javascript" src="../js/carga_usuarios_eliminar.js"></script> -->
	
		<script src="../docs/js/jquery/jQuery.min.js"></script>
		<script src="../docs/js/jquery/jQuery.widget.min.js"></script>
		<script src="../docs/js/metro.min.js"></script>
		<script src="../docs/js/jquery/mousewheel.js"></script>
		<script src="../js/iCanyo.js"></script>
	    <script src="../js/carga_usuarios_modificar.js"></script>
	</body>
 </html>
	