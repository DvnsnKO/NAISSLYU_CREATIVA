<?php 
$conexion = mysqli_connect('localhost', 'root', '', 'ejemplo');

$continente=$_POST['continente'];

	$sql="SELECT id_municipio,
			 nombre_mun,
			 dept_id 
		from municipios 
		where dept_id='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>SELECT 2 (paises)</label> 
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_assoc($result)) {
		$cadena .= '<option value="' . $ver["dept_id"] . '">' . utf8_encode($ver["nombre_mun"]) . '</option>'; 
	}

	echo  $cadena."</select>";
	

?>