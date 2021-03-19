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
	<title>UEML | Lista Administrador</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>

</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1 class="icon-hackhands" style="font-size:20pt;"> Lista de Administradores</h1>
		<a href="registro_admin.php" class="btn_new" style="font-size:12pt; text-decoration:none;"> <i class="icon-users"></i> Crear Nuevo Administrador</a>		
		<form action="buscar_admin.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="&#128270 Buscar">
			<button type="submit" class="btn_search"> <i class="icon-search" ></i></button>
		</form>

		<table>
			<tr>
				<th>ID</th>
                <th>CI</th>
				<th>Nombre</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Fecha Nac.</th>
				<th>Correo</th>
				<th>Telefono</th>
                <th>Cargo</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM administrador WHERE estatus = 1 ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 7;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT* FROM administrador 
                            WHERE estatus = 1 ORDER BY idadmin ASC LIMIT $desde,$por_pagina ");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					if($data["ci"] == 0){
                        $ci='C/F';
                        $ci = $data["ci"];
                    }
			?>
				<tr>
					<td><?php echo $data["idadmin"]; ?></td>
                    <td><?php echo $data["ci"]; ?></td>
					<td><?php echo $data["nombre"]; ?></td>
                    <td><?php echo $data["apellidos"]; ?></td>
                    <td><?php echo $data["direccion"]; ?></td>
                    <td><?php echo $data["fecha_nac"]; ?></td>
					<td><?php echo $data["correo"]; ?></td>
					<td><?php echo $data["telefono"]; ?></td>
					<td><?php echo $data['especialidad'] ?></td>
					<td>
						<a class="link_edit" href="editar_admin.php?id=<?php echo $data["idadmin"]; ?>"><i class="icon-pencil4" style= "font-size:14pt;"></i></a>
						<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {  /*solo los administradores y profesor pueden eliminar*/?>
						|
						<a class="link_delete" href="eliminar_confirmar_admin.php?id=<?php echo $data["idadmin"]; ?>"><i class="icon-bin" style= "font-size:14pt;"></i></a>
						<?php }?>	
					</td>
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
				<li><a href="?pagina=<?php echo 1; ?>"> <i class="icon-previous2"></i> </a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><i class ="icon-point-left"></i></a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>"><i class ="icon-point-right"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> "> <i class ="icon-next2"></i> </a></li>
			<?php } ?>
			</ul>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>