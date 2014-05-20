<?php
include('funciones_icanyo.php');
$query='';
	if (isset($_POST['id_usuario'])){
		$cerca1=($_POST['id_usuario']);
		$query="select * from usuario where id_usuario  like '%$cerca1%'";
		
	}else{
		$cerca1=0;
	}
	
	if (isset($_POST['nombre'])){
		$cerca2=($_POST['nombre']);
		if($query==''){
		$query="select * from usuario where nombre like '%$cerca2%'";
		}else{
		$query.=" and nombre like '%$cerca2%'";
		}
	}else{
		$cerca2='';
	}
	
	
	if (isset($_POST['primer_apellido'])){
		$cerca3=($_POST['primer_apellido']);
			if($query==''){
			$query="select * from usuario where primer_apellido like '%$cerca3%'";

		}else{
		$query.=" and primer_apellido like '%$cerca3%'";
		}
	}else{
		$cerca3='';
	}
	
		
	if (isset($_POST['segundo_apellido'])){
		$cerca4=($_POST['segundo_apellido']);
		if($query==''){
		$query="select * from usuario where segundo_apellido like '%$cerca4%'";
		}else{
		$query.=" and segundo_apellido like '%$cerca4%'";}
	}else{
		$cerca4='';
	}
	
	if (isset($_POST['nick_usuario'])){
		$cerca5=($_POST['nick_usuario']);
		if($query==''){
		$query="select * from usuario where nick_usuario like '%$cerca5%'";
		}else{
		$query.=" and nick_usuario like '%$cerca5%'";}
	}else{
		$cerca5='';
	}
	

	
$conex= conectar_bdd();

//$query="select * from usuario where id_usuario like '%$cerca1%' and nombre like '%$cerca2%' and  primer_apellido like '%$cerca3%' and segundo_apellido like '%$cerca4%' and nick_usuario like '%$cerca5%' order by primer_apellido asc";
//echo $query;
$consulta=mysql_query($query,$conex);

$total_consulta=mysql_num_rows($consulta);


if($total_consulta > 0){


echo "<table class='table hovered'>";
	echo "<tr>";
		echo "<th>";
		echo "Nombre ";
		echo "</th>";
			echo "<th>";
			echo "Primer apellido ";
			echo "</th>";
			echo "<th>";
			echo "Segundo apellido";
			echo "</th>";
			echo "<th>";
			echo "Marcar";
			echo "</th>";
		echo "</tr>";
	while ($fila = mysql_fetch_array($consulta)) {
				$id_usuari=$fila[0];
		echo "<tr>";
			echo "<td>".$fila[1]."</td>";
			echo "<td>".$fila[2]."</td>";
			echo "<td>".$fila[3]."</td>";
			echo "<td><input type='checkbox'/></td>";
			echo "<input type='hidden' name='id_usuario_oculto' value=".$id_usuari."></input>";

//echo $id_usuari;
			echo "</tr>";

	}

echo "</table>";

}else{
	echo "No hay resultados";
}
mysql_close($conex);
?>