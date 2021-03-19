<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reporte Alumnos por curso</title>
</head>
<body>
<?php
	include"../conexion.php";

	$consulta=mysqli_query($conection, "SELECT i.ci,a.nombre,a.apellidos FROM inscribir i INNER JOIN alumno a ON i.ci=a.ci");
 	$num=mysqli_num_rows($consulta);
 	$enviar="
 		<table border=1 align=center width=1000> 
 		<center><h1>Lista de Alumnos U. E. Matilde Lanza</h1></center>
 			<tr>
 				<th>N°</th>
 				<th>CI</th>
 				<th>Nombre</th>
 				<th>Apellidos</th>
 			</tr>
 	";
 	for ($i=1; $i <=$num ; $i++) { 
 		$datos=mysqli_fetch_array($consulta);

 		$ci=$datos['ci'];
 		$nombre=$datos['nombre'];
		$apellidos=$datos['apellidos'];

 	$enviar .= "
          <tr>
	          <td>$i</td>
	          <td>$ci</td>
	          <td>$nombre</td>
	          <td>$apellidos</td>
		   </tr>
 		";
 	}
 		$enviar .="</table>";
 		header("Content-type: application/vnd-ms-excel; charset=utf-8");
 		header("Content-Disposition: attachment; filename=Lista_alumnos.xls");
 		echo $enviar;
 
?>
</body>
</html>