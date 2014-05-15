<?php
include_once('config.php');

/**
 * Especificacion: Función que conecta con la base de datos
 * Función que conecta con la base de datos, utilizando las variables globales
 * de conexión incluidas en el archivo config.php. Devuelve la conexión inicializada.
 * 
 * @global String $dbHost
 * @global String $dbUser
 * @global String $dbPass
 * @global String $dbname
 * @return objeto $conexion
 *  
 * @author Olaia
 * @version 1
 * @copyright 
 */
function conectar_bdd(){
/*$dbHost='localhost';
$dbUser='root';
$dbPass='';
$dbname='icanyo';*/

    global $dbHost,$dbUser,$dbPass,$dbname; // hay que indicar que las variables son globales(de  fuera)

    $conexion=mysql_connect($dbHost,$dbUser,$dbPass);

    if (!$conexion)
    {
        die('No es posible la conexion a la base de datos:'.mysql_error());
    }

    mysql_select_db($dbname,$conexion);

    return $conexion;

}
/**
 * Especificacion: Función que conecta con la base de datos y devuelve datos de la tabla rol
 * Función que conecta con la base de datos, utilizando las variables globales
 * de conexión incluidas en el archivo config.php. Devuelve la conexión inicializada. Usa la query para llamar a la base de datos
 * y devuelve los valores existentes en la tabla rol, para generar un desplgable dinámico y una tabla con los contenidos que ayude al usuario.
 * 
 * @return tabla con elementos dinámicos y select
 *  
 * @author Esther Herrero
 * @version 1
 * @copyright 
 */

/*
function devuelve_roles(){


$conex= conectar_bdd();

$query="select * from rol";

$consulta=mysql_query($query,$conex);
$total_consulta=mysql_num_rows($consulta);


if($total_consulta > 0){
echo "<table>";
	echo "<tr>";
	echo "Roles";
	echo "</tr>";
	while ($fila = mysql_fetch_array($consulta)) {
		echo "<tr>";
		echo "<td><p>Id del rol</p></td>";
		
		echo "<td>".$fila[0]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><p>Nombre del rol</p></td>";
	
		echo "<td>".$fila[1]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><p>Descripción</p></td>";
	
		echo "<td>".$fila[2]."</td>";
		echo "</tr>";
		echo "<tr>";
	
	}

echo "</table>";
while ($fila = mysql_fetch_array($consulta)) {
echo "select";
	echo "option";
	echo $fila[1];
	echo "</option>";
echo "</select>";
}
}else{
	echo "No hay resultados";
}
mysql_close($conex);
}

*/
?>