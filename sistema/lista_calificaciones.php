<?php 
	session_start();
	
	include "../conexion.php";	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Lista Calificaciones</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>

</head>
<body>
	<?php include "includes/header.php"; 
	$grado;
	$gestion;
	if (isset($_POST['grado'])&& isset($_POST['gestion'])) {
		 $grado=$_POST['grado'];
	 	 $gestion=$_POST['gestion'];
	} else {
		 $grado=$_GET['grado'];
	 	 $gestion=$_GET['gestion'];
	}
	?>
	
	<section id="container">
		
		<h1 class="icon-hackhands" style="font-size:20pt;"> Lista de Calificaciones</h1>
		
		<form action="buscar_calificacion.php" method="get" class="form_search">
			<input type="numeric" name="busqueda" id="busqueda" placeholder="&#128270 Ingrese N ° C. I.">
			<button type="submit" class="btn_search"> <i class="icon-search" ></i></button>
		</form>
<div class="col-md-8">
		<center>	<h3>Nota: Todos los examenes son sobre 100 Puntos</h3></center>
			<table   class="table table-bordered">
				<thead class="alert-info">
					<tr>
						
						<th>CI</th>						
						<th>Apellidos </th>
						<th>Nombre </th>
						<th>Materia</th>
						<th>1° Bimestre</th>
						<th>2° Bimestre</th>
						<th>3° Bimestre</th>
						<th>4° Bimestre</th>
						<th>Promedio</th>
						
					</tr>
				</thead>
				<tbody>
			<?php
			
			$query = mysqli_query($conection, "SELECT n.idnota,i.grado,i.gestion, n.idalumno,a.ci,a.nombre,a.apellidos, m.idmateria,m.materia, n.nota1,n.nota2,n.nota3,n.nota4 FROM notas n INNER JOIN alumno a ON n.idalumno = a.idalumno INNER JOIN materia m ON n.idmateria = m.idmateria INNER JOIN inscribir i ON a.ci = i.ci WHERE i.grado='$grado' AND i.gestion='$gestion'
			ORDER BY a.apellidos ASC ") or die(mysqli_error());
			while($fetch = mysqli_fetch_array($query)){
		
			$total_score = $fetch['nota1'] + $fetch['nota2'] + $fetch['nota3'] + $fetch['nota4'];
			$cal=$total_score/400;
			$ave=$cal*100;
				?>
				<tr>
						<td><?php echo $fetch['ci']?></td>
						<td><?php echo $fetch['apellidos']?></td>
						<td><?php echo $fetch['nombre']?></td>
						<td><?php echo $fetch['materia']?></td>
						<td><?php echo $fetch['nota1']?></td>
						<td><?php echo $fetch['nota2']?></td>
						<td><?php echo $fetch['nota3']?></td>
						<td><?php echo $fetch['nota4']?></td>
						<td><?php echo number_format($ave, 2)."%"?></td>
				</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			<br><br><br>
			<section>
	<?php include "includes/footer.php"; ?>
</body>
</html>