<?php
include('funciones_icanyo.php');

	if (isset($_POST['id_usuario'])){
		$cerca1=($_POST['id_usuario']);
		}else{
		$cerca1=0;
	}
	if (isset($_POST['nombre'])){
		$cerca2=($_POST['nombre']);
		if ($cerca2==''){$cerca2='';}
	
	}	
	if (isset($_POST['papellido'])){
		$cerca3=($_POST['papellido']);
		if ($cerca3==''){$cerca3='';}
	
	}	
		if (isset($_POST['sapellido'])){
		$cerca4=($_POST['sapellido']);
		if ($cerca4==''){$cerca4='';}
	
	}
		if (isset($_POST['nick'])){
		$cerca5=($_POST['nick']);
		if ($cerca5==''){$cerca5='';}
	
	}
$conex= conectar_bdd();

$query="select * from usuario where id_usuario between '%$cerca1%' and 3000 and nombre like '%$cerca2%' and  primer_apellido like '%$cerca3%' and segundo_apellido LIKE '%$cerca4%' and nick_usuario like '%$cerca5%' order by primer_apellido asc";
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