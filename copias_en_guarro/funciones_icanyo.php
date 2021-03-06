<?php
include_once('config.php');

/**
 * Especificacion: Funci�n que conecta con la base de datos
 * Funci�n que conecta con la base de datos, utilizando las variables globales
 * de conexi�n incluidas en el archivo config.php. Devuelve la conexi�n inicializada.
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
 * Especificacion: Funci�n que conecta con la base de datos y devuelve datos de la tabla rol
 * Funci�n que conecta con la base de datos, utilizando las variables globales
 * de conexi�n incluidas en el archivo config.php. Devuelve la conexi�n inicializada. Usa la query para llamar a la base de datos
 * y devuelve los valores existentes en la tabla rol, para generar un desplgable din�mico y una tabla con los contenidos que ayude al usuario.
 * 
 * @return tabla con elementos din�micos y select
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
		echo "<td><p>Descripci�n</p></td>";
	
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
/**
 * subir_foto()
 *
 * Sube una imagen al servidor  
 *
 * @param string $directorio_destino Directorio de destino d�nde queremos dejar el archivo
 * @param string $nombre_fichero Atributo 'foto' del campo archivo
 * @return boolean
 */
function subir_foto($directorio_destino, $nombre_fichero)
{
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
    //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
    {
        $img_file = $_FILES[$nombre_fichero]['name'];
        $img_type = $_FILES[$nombre_fichero]['type'];
        echo 1;
        // Si se trata de una imagen   
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
 strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {
            //�Tenemos permisos para subir la im�gen?
            echo 2;
            if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
            {
                return true;
            }
        }
    }
    //Si llegamos hasta aqu� es que algo ha fallado
    return false;
}
?>