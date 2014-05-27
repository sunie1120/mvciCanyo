<?php
require_once('funciones_icanyo.php');
/*-------------------------------------*/
function devuelve_roles(){
$conex= conectar_bdd();
$query="select * from rol";
$consulta=mysql_query($query,$conex);
$total_consulta=mysql_num_rows($consulta);
	if($total_consulta > 0){
	echo "<table class='table'>";
	echo "<thead>";
		echo "<tr>";
		echo "Roles";
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";


		while ($fila = mysql_fetch_array($consulta)) {
			/* echo "<tr>";
			echo "<td><p>Id del rol</p></td>";
			echo "<td>".$fila[0]."</td>"; */
			//echo "</tr>";
			//echo "<tr>";
	/* 		echo "<td><p>Nombre</p></td>"; */
			echo "<td>".$fila[1]."</td>";
			//echo "</tr>";
			//echo "<tr>";
		/* 	echo "<td><p>Descripción</p></td>"; */
			echo "<td>".$fila[2]."</td>";
			echo "</tr>";
		}
	echo "<tbody>";
	echo "</table>";
	}
mysql_close($conex);
}
/*-------------------------------------*/
function roles(){
 //console.log("llega hasta aqui");
 
$conex= conectar_bdd();
 //console.log($conex);
$query2="select id_rol, nombre_rol from rol";
$consulta2=mysql_query($query2,$conex);
$total_consulta2=mysql_num_rows($consulta2);


$fila2 = mysql_fetch_array($consulta2);

	if($total_consulta2 > 0){
		while ($fila2 = mysql_fetch_array($consulta2)) {
				echo "<option value=".$fila2[0].">".$fila2[1]."</option>";
		}

	}else{
			echo "<option>No hay resultados</option>";
			
	}
mysql_close($conex);
}

/*-------------------------------------*/
function puestos(){
 //console.log("llega hasta aqui");
 
$conex= conectar_bdd();

 //console.log($conex);
$query5="select id_puesto,nombre_puesto from puesto";
$consulta5=mysql_query($query5,$conex);

$total_consulta5=mysql_num_rows($consulta5);

	if($total_consulta5 > 0){
		while ($fila5 = mysql_fetch_array($consulta5)) {
				echo "<option value=".$fila5[0].">".$fila5[1]."</option>";
		}

	}else{
			echo "<option>No hay resultados</option>";
	}
mysql_close($conex);
}

/*-------------------------------------*/
function departamentos(){
 //console.log("llega hasta aqui");
 
$conex= conectar_bdd();
 //console.log($conex);
$query6="select id_departamento,nombre_departamento from departamento";
$consulta6=mysql_query($query6,$conex);
$total_consulta6=mysql_num_rows($consulta6);

echo $total_consulta6;
	if($total_consulta6 > 0){
		while ($fila6 = mysql_fetch_array($consulta6)) {
				echo "<option value=".$fila6[0].">".$fila6[1]."</option>";
		}

	}else{
			echo "<option>No hay resultados</option>";
	}
mysql_close($conex);
}

/*-------------------------------------*/
function anuncios(){
$conex= conectar_bdd();
$query3="select * from anuncio";
$consulta3=mysql_query($query3,$conex);
$total_consulta3=mysql_num_rows($consulta3);
	if($total_consulta3 > 0){
	echo "<table border='3px'>";
		echo "<tr>";
		echo "Anuncios";
		echo "</tr>";
		while ($fila3 = mysql_fetch_array($consulta3)) {
				echo "<tr>";
				echo "<td><p>Id de anuncio</p></td>";
				echo "<td>".$fila3[0]."</td>";
				echo "<td><p>titulo</p></td>";
				echo "<td>".$fila3[1]."</td>";
				echo "<td><p>Descripción</p></td>";
				echo "<td>".$fila3[2]."</td>";
				echo "<td><p>fecha inicio</p></td>";
				echo "<td>".$fila3[3]."</td>";
				echo "<td><p>fecha fin</p></td>";
				echo "<td>".$fila3[4]."</td>";
				echo "<td><p>usuario</p></td>";
				echo "<td>".$fila3[5]."</td>";
				echo "</tr>";
			}
		echo "</table>";
	}else{
			echo "<option>No hay resultados</option>";
	}
mysql_close($conex);
}

/*-------------------------------------*/
function puestos_checkbox(){
 //console.log("llega hasta aqui");
 
$conex= conectar_bdd();

 //console.log($conex);
$query5="select id_puesto,nombre_puesto from puesto";
$consulta5=mysql_query($query5,$conex);

$total_consulta5=mysql_num_rows($consulta5);

	if($total_consulta5 > 0){

		while ($fila5 = mysql_fetch_array($consulta5)) {
		echo "<input type='checkbox' name='puesto' value=".$fila5[0]." disabled='disabled'>".$fila5[1];
		echo "<br>";
		}

	}else{
			echo "<p'>No hay resultados</p>";
	}
mysql_close($conex);
}
/*-------------------------------------*/
function departamentos_checkbox(){
 //console.log("llega hasta aqui");
 
$conex= conectar_bdd();
 //console.log($conex);
$query6="select id_departamento,nombre_departamento from departamento";
$consulta6=mysql_query($query6,$conex);
$total_consulta6=mysql_num_rows($consulta6);

echo $total_consulta6;
	if($total_consulta6 > 0){

		while ($fila6 = mysql_fetch_array($consulta6)) {
				echo "<input type='checkbox' name='departamento' value=".$fila6[0]." disabled='disabled'>".$fila6[1];
				echo "<br>";
		}

	}else{
			echo "<p'>No hay resultados</p>";
	}
mysql_close($conex);
}
?>