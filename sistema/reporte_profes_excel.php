<html>
<head>
	<meta charset="utf-8">
	<title>Reporte Profesor</title>
</head>
<body>
 	<?php 
 	include "../conexion.php";

	$consulta=mysqli_query($conection, "SELECT rda,ci,nombre,apellidos,direccion,fecha_nac,correo,telefono,especialidad FROM profesor WHERE estatus=1 ORDER BY apellidos");
 	$num=mysqli_num_rows($consulta);
 	$enviar="
 		<table border=1 align=center width=1000> 
 		<center><h1>Lista de Profesores U. E. Matilde Lanza</h1></center>
 			<tr>
 				<th>N°</th>
 				<th>Apellidos</th>
 				<th>Nombre</th>
 				<th>RDA</th>
 				<th>CI</th>
 				<th>Dirección</th>
 				<th>Fecha Nacimiento</th>
 				<th>Correo</th>
 				<th>Teléfono</th>
 				<th>Especialidad</th>
 			</tr>
 	";
 	for ($i=1; $i <=$num ; $i++) { 
 		$datos=mysqli_fetch_array($consulta);

 		$apellidos=$datos['apellidos'];
 		$nombre=$datos['nombre'];
 		$rda=$datos['rda'];
 		$ci=$datos['ci'];
 		$direccion=$datos['direccion'];
 		$fecha_nac=$datos['fecha_nac'];
 		$correo=$datos['correo'];
 		$telefono=$datos['telefono'];
 		$especialidad=$datos['especialidad'];

 		$enviar .= "
          <tr>
	          <td>$i</td>
	          <td>$apellidos</td>
	          <td>$nombre</td>
	          <td>$rda</td>
	          <td>$ci</td>
	          <td>$direccion</td>
	          <td>$fecha_nac</td>
	          <td>$correo</td>
	 		  <td>$telefono</td>
	          <td>$especialidad</td>
	          </tr>
 		";
 	}
 		$enviar .="</table>";
 		header("Content-type: application/vnd-ms-excel; charset=utf-8");
 		header("Content-Disposition: attachment; filename=profesores.xls");
 		echo $enviar;
 	?>
</body>
</html>