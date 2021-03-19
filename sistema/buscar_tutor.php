<?php 
	session_start();
/*	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}*/

	include "../conexion.php";	

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML |Lista Tutor</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<?php 

			$busqueda = strtolower($_REQUEST['busqueda']);
			if(empty($busqueda))
			{
				header("location: lista_tutor.php");
				mysqli_close($conection);
			}


		 ?>
		
		<h1 class="icon-hackhands" style="font-size:20pt;"> Lista de Tutores</h1>
		<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
		<a href="registro_tutor.php" class="btn_new" style="font-size:15pt; text-decoration:none;"><i class="icon-user-plus"></i> Crear Nuevo Tutor</a>
		<?php }?>
		<form action="buscar_tutor.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="&#128270 Buscar" value="<?php echo $busqueda; ?>">
			<button type="submit" class="btn_search"> <i class="icon-search";></i></button>
		</form>

		<table>
			<tr>
                <th>ID</th>
                <th>CI Padre</th>
				<th>Nombre Padre</th>
                <th>Fecha Nac. Padre</th>
                <th>Ocupacion Padre</th>
				<th>CI Madre</th>
				<th>Nombre Madre</th>
               	<th>Fecha Nac. Madre</th>
                <th>Ocupacion Madre</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Telf. Ref.</th>
				<th>Correo</th>
				<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
					
                <th>Acciones</th>
				<?php }?>
			</tr>
		<?php 
			//Paginador
			
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM tutores 
																WHERE ( idtutor LIKE '%$busqueda%' OR 
																		ci_padre LIKE '%$busqueda%' OR 
																		nombre_padre LIKE '%$busqueda%' OR 
																		fecha_nac_padre LIKE '%$busqueda%' OR 
																		ocupacion_padre LIKE '%$busqueda%' OR
                                                                        ci_madre LIKE '%$busqueda%' OR 
																		nombre_madre LIKE '%$busqueda%' OR 
																		fecha_nac_madre LIKE '%$busqueda%' OR 
																		ocupacion_madre LIKE '%$busqueda%' OR
                                                                        direccion LIKE '%$busqueda%' OR 
																		telefono LIKE '%$busqueda%' OR 
																		telRef LIKE '%$busqueda%' OR
                                                                        correo LIKE '%$busqueda%'
																		) 
																AND estatus = 1  ");

			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 5;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT * FROM tutores 
                            WHERE  ( idtutor LIKE '%$busqueda%' OR 
                                    ci_padre LIKE '%$busqueda%' OR 
                                    nombre_padre LIKE '%$busqueda%' OR 
                                    fecha_nac_padre LIKE '%$busqueda%' OR 
                                    ocupacion_padre LIKE '%$busqueda%' OR
                                    ci_madre LIKE '%$busqueda%' OR 
                                    nombre_madre LIKE '%$busqueda%' OR 
                                    fecha_nac_madre LIKE '%$busqueda%' OR 
                                    ocupacion_madre LIKE '%$busqueda%' OR
                                    direccion LIKE '%$busqueda%' OR 
                                    telefono LIKE '%$busqueda%' OR 
                                    telRef LIKE '%$busqueda%' OR
                                    correo LIKE '%$busqueda%'
                                    ) 
										AND
										estatus = 1 ORDER BY idtutor ASC LIMIT $desde,$por_pagina 
				");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["idtutor"]; ?></td>
					<td><?php echo $data["ci_padre"]; ?></td>
					<td><?php echo $data["nombre_padre"]; ?></td>
					<td><?php echo $data["fecha_nac_padre"]; ?></td>
                    <td><?php echo $data["ocupacion_padre"]; ?></td>
                    <td><?php echo $data["ci_madre"]; ?></td>
					<td><?php echo $data["nombre_madre"]; ?></td>
					<td><?php echo $data["fecha_nac_madre"]; ?></td>
                    <td><?php echo $data["ocupacion_madre"]; ?></td>
					<td><?php echo $data["direccion"]; ?></td>
					<td><?php echo $data['telefono']; ?></td>
                    <td><?php echo $data['telRef']; ?></td>
                    <td><?php echo $data['correo']; ?></td>
					<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
					
					<td>
						<a class="link_edit" href="editar_tutor.php?id=<?php echo $data["idtutor"]; ?>"> <i class="icon-pencil4" style= "font-size:14pt;"></i></a>

				
						|
						<a class="link_delete" href="eliminar_confirmar_tutor.php?id=<?php echo $data["idtutor"]; ?>"> <i class="icon-bin" style= "font-size:14pt;"></i></a>
					<?php } ?>
						
					</td>
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
				<li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>"><i class ="icon-point-right"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> "><i class ="icon-next2"></i></a></li>
			<?php } ?>
			</ul>
		</div>
<?php } ?>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>