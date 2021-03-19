<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";
	if(!empty($_POST))
	{
		if(empty($_POST['idcurso'])){
			header("location: lista_curso.php");
			mysqli_close($conection);
		}
		$idcurso = $_POST['idcurso'];

		//$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario =$idusuario ");
		$query_delete = mysqli_query($conection,"UPDATE curso SET estatus = 0 WHERE idcurso = $idcurso ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_curso.php");
			
		}else{
			echo "Error al eliminar";
		}
	}

	if(empty($_REQUEST['id']))
	{
		header("location: lista_curso.php");
		mysqli_close($conection);
	}else{

		$idcurso = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM curso
												WHERE idcurso = $idcurso ");
		
		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				
                $grado = $data['grado'];
                $seccion=$data['seccion'];
			
				}
		}else{
			header("location: lista_curso.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Eliminar Curso</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
		<br> <br>
		
		<i class="icon-office" style="font-size:60px; color:red;"></i>
		<br>
		<br>
			<h2 style="font-size:20px;">¿Está seguro que desea  <i class="icon-bin" style="color:red;"></i>siguiente Curso :?</h2>
			<hr>
			<p>Gardo: <span><?php echo $grado; ?></span></p>
            <p>Seccion: <span><?php echo $seccion; ?></span></p>
		

			<form method="post" action="">
				<input type="hidden" name="idcurso" value="<?php echo $idcurso; ?>">
				<a style="text-decoration:none;" href="lista_curso.php" class="btn_cancel"> <i class="icon-cross" style="font-size:18px;"></i> Cancelar</a>
				<button type="submit" class="btn_ok"> <i class="icon-bin" style="font-size:18px;"></i> Eliminar </button>
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>