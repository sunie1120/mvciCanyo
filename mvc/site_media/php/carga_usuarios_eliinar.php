<?php
include('funciones.php');

	if (isset($_POST['nombre_usuario'])){
		$cerca1=($_POST['nombre_servicio']);
		}else{
		$cerca1='';
	}
	if (isset($_POST['primer_apellido'])){
		$cerca2=($_POST['intensidad_servicio']);
		if ($cerca2==''){$cerca2=3;}
		}else{
		$cerca2=3;
	}	
	if (isset($_POST['segundo_apellido'])){
		$cerca3=($_POST['precio_servicio']);
		if ($cerca3==''){$cerca3=3000;}
		}else{
		$cerca3=3000;
	}	
	if (isset($_POST['id_usuario'])){
		$cerca3=($_POST['precio_servicio']);
		if ($cerca3==''){$cerca3=3000;}
		}else{
		$cerca3=3000;
	
	if (isset($_POST['nick'])){
	    $orden=$_POST['orden'];
		}
		else{
		$orden='';
		}
		
	//$orden=$_POST['orden'];


$conex= conectar_bdd();

$query="select * from usuario where nombre like '%%' and primer_apellido like '%%' and segundo_apellido like '%%' and nick_usuario like'%%' and id_usuario=  order by primer_apellido asc";
//echo $query;
$consulta=mysql_query($query,$conex);
$total_consulta=mysql_num_rows($consulta);


if($total_consulta > 0){
echo "<table>";
	echo "<tr>";
	echo "Resultados";
	echo "</tr>";
	while ($fila = mysql_fetch_array($consulta)) {
		echo "<tr>";
		echo "<td><p>Nombre</p></td>";
		
		echo "<td>".$fila[1]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><p>Descripción</p></td>";
	
		echo "<td>".$fila[2]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><p>Intensidad</p></td>";
	
		echo "<td>".$fila[3]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><p>Precio</p></td>";
		
		echo "<td>".$fila[4]."</td>";
		echo "</tr>";
	}

echo "</table>";

}else{
	echo "No hay resultados";
}
mysql_close($conex);
?>