<?php 
	session_start();
	include "../conexion.php";	
	$busqueda='';
	$fecha_de='';
	$fecha_a='';
	if(isset($_REQUEST['busqueda']) && $_REQUEST['busqueda'] ==''){
		header("location:lista.php");
	}

	if(isset($_REQUEST['fecha_de']) || isset($_REQUEST['fecha_a'])){
			if($_REQUEST['fecha_de'] =='' || $_REQUEST['fecha_a'] ==''){
			header("location:lista.php");
		}
	}

	if(!empty($_REQUEST['busqueda'])){
		if(!is_numeric($_REQUEST['busqueda'])){
			header("location:lista.php");
		}
		$busqueda= strtolower($_REQUEST['busqueda']);
		$where="ci = $busqueda";
		$buscar = "busqueda = $busqueda";
	}

	if(!empty($_REQUEST['fecha_de']) && !empty($_REQUEST['fecha_a'])){
		$fecha_de = $_REQUEST['fecha_de'];
	    $fecha_a = $_REQUEST['fecha_a'];
	    $buscar = '';
		
	if($fecha_de > $fecha_a){//si son fechas de es mayor que hasta entonces error 
		header("location:lista.php");
	}else if($fecha_de == $fecha_a){//si son fechas iguales
		$where = "fecha_inscrib LIKE '$fecha_de%'";
		$buscar = "fecha_de=$fecha_de&fecha_a=$fecha_a";
		//$buscar = 'fecha_de='.$fecha_de.'&fecha_a='.$fecha_a;
	}else{//si  solo queremos de un solo dia
		$f_de = $fecha_de.' 00:00:00';
		$f_a= $fecha_a.' 23:59:59';
		
		$where ="fecha_inscrib BETWEEN '$f_de' AND '$f_a'";
		$buscar = "fecha_de=$fecha_de&fecha_a=$fecha_a";
		//$buscar = 'fecha_de='.$fecha_de.'&fecha_a='.$fecha_a;
	}

	}

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
	<h1 class="icon-hackhands" style="font-size:20pt;"> Registro de Calificaciones</h1>
		<form action="buscar_calificacion.php" method="get" class="form_search">
			<input type="numeric" name="busqueda" id="busqueda" placeholder="&#128270 Ingrese N ° C. I." value="<?php echo $busqueda; ?>" >
			<button type="submit" class="btn_search"> <i class="icon-search" ></i></button>
		</form>
				

		<table>
			<tr>
				<th>ID</th>
				<th>CI</th>
                <th>Curso</th>
				<th>Jornada</th>
				<th>Gestion</th>
				<th>Fecha Inscripcion</th>
				
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador

			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM inscribir WHERE  $where ");

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
			
			$query = mysqli_query($conection,"SELECT i.idinscripcion, i.ci, c.grado,c.seccion, i.jornada, i.gestion, i.fecha_inscrib
			FROM inscribir i
			INNER JOIN curso c ON i.grado = c.idcurso
			WHERE  $where  and i.estatus = 1 
			ORDER BY i.idinscripcion DESC LIMIT $desde, $por_pagina ");
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
					<td>
						<a  title="Registrar Nota" class="link_edit" href="registro_nota.php?id=<?php echo $data["idinscripcion"]; ?>"><i class="icon-pencil1" style= "font-size:14pt;"></i></a>

						<a title="Editar Nota" class="link_edit" href="editar_nota.php?id=<?php echo $data["idinscripcion"]; ?>"><i class="icon-pencil4" style= "font-size:14pt;"></i></a>
						
						<a title="Mostrar Nota" class="link_edit" href="mostrar_notas.php?id=<?php echo $data["idinscripcion"]; ?>"><i class="icon-pencil4" style= "font-size:14pt;"></i></a>
						
						
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