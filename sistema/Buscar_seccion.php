<?php 
	session_start();
	include "../conexion.php";	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Listar Inscritos</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php";
		$grado=$_POST['grado'];
		$gestion=$_POST['gestion'];
	 ?>
	<section id="container">		
	    <h1 class="icon-hackhands" style="font-size:20pt;"> Lista de Estudiantes  
	    	 <?php 
                $sql=$conection->query(" SELECT grado, seccion FROM curso WHERE idcurso='$grado'");
                while($fila=$sql->fetch_array()){
                echo "".$fila['grado']." ".$fila['seccion']."";
                }
            ?>
	    </h1>
		<table>
			<tr>
				<th>CI</th>
                <th>Nombre</th>
                <th>Apellidos</th>
            </tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM inscribir WHERE estatus = 1 ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 30;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			/*consulta*/			
			$query = mysqli_query($conection,
			"SELECT i.ci, a.nombre, a.apellidos
			FROM inscribir i
            INNER JOIN alumno a ON i.ci=a.ci
			WHERE  i.gestion = '$gestion' AND i.grado= '$grado'
			ORDER BY i.ci DESC LIMIT $desde, $por_pagina ");

			mysqli_close($conection);
			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
				
			?>
				<tr>
				    <td><?php echo $data["ci"]; ?> </td>
                    <td><?php echo $data["nombre"]; ?> </td>
                    <td><?php echo $data["apellidos"]; ?> </td>
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