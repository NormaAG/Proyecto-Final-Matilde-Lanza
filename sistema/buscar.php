<?php 
	session_start();
	include "../conexion.php";	
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Lista Inscritos</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
    <?php 
    $busqueda='';
    $search_curso='';
    if(empty($_REQUEST['busqueda']) && empty($_REQUEST['grado'])){
        header("location:nota.php");
    }
    ?>
	<h1 class="icon-hackhands" style="font-size:20pt;"> Lista de Inscripcion</h1>
	<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
		<a href="registro.php" class="btn_new" style="font-size:12pt; text-decoration:none;"> <i class="icon-user-plus"></i> Crear Nueva Inscripcion</a>		
	<?php } ?>
		<form action="buscar_inscrito.php" method="get" class="form_search">
			<input type="numeric" name="busqueda" id="busqueda" placeholder="&#128270 Ingrese N ° C. I." value="<?php echo $busqueda; ?>" >
			<button type="submit" class="btn_search"> <i class="icon-search" ></i></button>
		</form>
			<br><br><br>	<div>
					<h3> Buscar por Fecha</h3>
					<form action="Buscar_inscrito.php" method="get" class="form_search_date">
						<label> De:</label>
						<input type="date" name="fecha_de" id="fecha_de" value="<?php echo $fecha_de; ?>" required>
						<label> A </label>
						<input type="date" name="fecha_a" id="fecha_a" value="<?php echo $fecha_a; ?>" required>
						<button tye="submit" class="btn_view">  <i class="icon-search"></i></button>
					</form>
				</div>

		<table>
			<tr>
				<th>ID</th>
				<th>CI</th>
                <th>Curso</th>
				<th>Jornada</th>
				<th>Gestion</th>
				<th>Fecha Inscripcion</th>
				<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
		
				<th>Acciones</th>
				<?php } ?>
			</tr>
		<?php 
			//Paginador

			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM inscribir  ");

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
			
	$query = mysqli_query($conection,
	"SELECT i.idinscripcion, i.ci, c.grado, c.seccion, c.nombre, i.jornada, i.gestion, i.fecha_inscrib
	FROM inscribir i
	INNER JOIN curso c ON i.grado = c.idcurso
	WHERE $where AND i.estatus = 1 
			ORDER BY i.fecha_inscrib DESC LIMIT $desde, $por_pagina ");
			
			mysqli_close($conection);
			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
				
			?>
				<tr>
					<td><?php echo $data["idinscripcion"]; ?></td>
                    <td><?php echo $data["ci"]; ?></td>
                    <td><?php echo $data["grado"]; ?> "<?php echo $data["seccion"]; ?>"</td>
					<td><?php echo $data["jornada"]; ?></td>
					<td><?php echo $data["gestion"]; ?></td>
					<td><?php echo $data["fecha_inscrib"]; ?></td>	
					<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
		
					<td>
						<a class="link_edit" href="editar_inscrito.php?id=<?php echo $data["idinscripcion"]; ?>"><i class="icon-pencil4" style= "font-size:14pt;"></i></a>
						
						<a class="link_delete" href="eliminar_confirmar_inscrito.php?id=<?php echo $data["idinscripcion"]; ?>"><i class="icon-bin" style= "font-size:14pt;"></i></a>
						
					</td>
					<?php } ?>
				</tr>
			
		<?php 
				}

			}
		 ?>


		</table>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>&<?php echo $buscar; ?>"> <i class="icon-previous2"></i> </a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>&<?php echo $buscar; ?>"><i class ="icon-point-left"></i></a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'&'.$buscar.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>&<?php echo $buscar; ?>"><i class ="icon-point-right"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?>&<?php echo $buscar; ?>"><i class ="icon-next2"></i> </a></li>
			<?php } ?>
			</ul>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>