<?php 
	session_start();
	include "../conexion.php";	
	$busqueda='';
	//$fecha_de='';
	//$fecha_a='';
	if(isset($_REQUEST['busqueda']) && $_REQUEST['busqueda'] ==''){
		header("location:lista_calificaciones.php");
	}

	if(!empty($_REQUEST['busqueda'])){
		if(!is_numeric($_REQUEST['busqueda'])){
			header("location:lista_calificaciones.php");
		}
		$busqueda= strtolower($_REQUEST['busqueda']);
		$where="ci = $busqueda";
		$buscar = "busqueda = $busqueda";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML |Lista Calificaciones</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<?php 
			$busqueda = strtolower($_REQUEST['busqueda']);
			if(empty($busqueda))
			{
				header("location: lista_calificaciones.php");
				mysqli_close($conection);
			}
        ?>
		
		<h1 class="icon-hackhands" style="font-size:20pt;"> Lista de calificaciones</h1>
		
        <form action="buscar_calificacion.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="&#128270 Buscar" value="<?php echo $busqueda; ?>" >
			<button type="submit" class="btn_search"> <i class="icon-search"></i></button>
		</form>

		<table>
					<tr>
            			<th>CI</th>
            			<th>Apellidos</th>
            			<th>Nombre</th>
						<th>Materia</th>
						<th>1° Bimestre</th>
						<th>2° Bimestre</th>
						<th>3° Bimestre</th>
						<th>4° Bimestre</th>
						<th>Promedio</th>
						<?php if( $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
						<th>Acciones</th>
						<?php }?>
					</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM notas n INNER JOIN alumno a ON n.idalumno = a.idalumno   WHERE (a.ci LIKE '%$busqueda%')");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 10; //numero de usuario a mostrar por pagina

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT n.idnota, n.idalumno,a.ci,a.nombre, a.apellidos, m.idmateria,m.materia, n.nota1, n.nota2, n.nota3,n.nota4 
			FROM notas n 
			INNER JOIN alumno a ON n.idalumno = a.idalumno  
			INNER JOIN materia m ON n.idmateria = m.idmateria
			 WHERE (a.ci LIKE '%$busqueda%' ) ORDER BY a.apellidos ASC LIMIT $desde,$por_pagina ");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);
			if($result > 0){

					
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
					<?php if( $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
					
					<td>
						<a class="link_edit" href="editar.php?id=<?php echo $data["idcurso"]; ?>"><i class="icon-pencil4" style= "font-size:14pt;"></i></a>
                            |
						<a class="link_delete" href="eliminar_confirmar_.php?id=<?php echo $data["idcurso"]; ?>"><i class="icon-bin" style= "font-size:14pt;"></i></a>
					
						
					</td>
					<?php }?>
				</tr>
			
		<?php 
				}
			}
			
		 ?>


		</table>
<?php 
	
	if($total_registro != 0)
	{
 ?>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>"> <i class="icon-previous2"></i></a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"> <i class ="icon-point-left"></i></a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>"> <i class ="icon-point-right"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?>"> <i class ="icon-next2"></i></a></li>
			<?php } ?>
			</ul>
		</div>
<?php } ?>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>