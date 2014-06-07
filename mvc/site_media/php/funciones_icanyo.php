<?php

include_once('configuracion_bbdd.php');

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
function conectar_bdd() {

    global $dbHost, $dbUser, $dbPass, $dbname; // hay que indicar que las variables son globales(de  fuera)

    $conexion = mysql_connect($dbHost, $dbUser, $dbPass);

    if (!$conexion) {
        die('No es posible la conexion a la base de datos:' . mysql_error());
    }

    mysql_select_db('icanyo', $conexion);

    return $conexion;
}

?>