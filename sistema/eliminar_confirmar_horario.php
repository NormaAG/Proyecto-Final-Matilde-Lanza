<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";
	if(!empty($_POST))
	{
		if(empty($_POST['idhorario'])){
			header("location: lista_horario.php");
			mysqli_close($conection);
		}
		$idhorario = $_POST['idhorario'];

		//$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario =$idusuario ");
		$query_delete = mysqli_query($conection,"UPDATE horario SET estatus = 0 WHERE idhorario = $idhorario ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_horario.php");
			
		}else{
			echo "Error al eliminar";
		}

	}




	if(empty($_REQUEST['id']))
	{
		header("location: lista_horario.php");
		mysqli_close($conection);
	}else{

		$idhorario = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM horario
												WHERE idhorario = $idhorario ");
		
		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				
				$hora = $data['hora'];
                $lunes = $data['lunes'];
                $martes = $data['martes'];
                $miercoles = $data['miercoles'];
				$jueves = $data['jueves'];
                $viernes = $data['viernes'];
            }
				}
		else{
			header("location: lista_horario.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Eliminar Horario</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
		<br> <br>
		
		<i class="icon-profile" style="font-size:60px; color:red;"></i>
		<br>
		<br>
			<h2 style="font-size:20px;">¿Está seguro que desea  <i class="icon-bin" style="color:red;"></i>el siguiente horario :?</h2>
			<hr>
			<p>Hora: <span><?php echo $hora; ?></span></p>
            <p>Lunes: <span><?php echo $lunes; ?></span></p>
            <p>Martes: <span><?php echo $martes; ?></span></p>
            <p>Miercoles: <span><?php echo $miercoles; ?></span></p>
            <p>Jueves: <span><?php echo $jueves; ?></span></p>
            <p>Viernes: <span><?php echo $viernes; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="idhorario" value="<?php echo $idhorario; ?>">
				<a style="text-decoration:none;" href="lista_horario.php" class="btn_cancel"> <i class="icon-cross" style="font-size:18px;"></i> Cancelar</a>
				<button type="submit" class="btn_ok"> <i class="icon-bin" style="font-size:18px;"></i> Eliminar </button>
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>