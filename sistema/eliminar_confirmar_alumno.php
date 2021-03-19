<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";
	if(!empty($_POST))
	{
		if(empty($_POST['idalumno'])){
			header("location: lista_alumno.php");
			mysqli_close($conection);
		}
		$idalumno = $_POST['idalumno'];

		//$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario =$idusuario ");
		$query_delete = mysqli_query($conection,"UPDATE alumno SET estatus = 0 WHERE idalumno = $idalumno ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_alumno.php");
			
		}else{
			echo "Error al eliminar";
		}

	}




	if(empty($_REQUEST['id']))
	{
		header("location: lista_alumno.php");
		mysqli_close($conection);
	}else{

		$idalumno = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM alumno
												WHERE idalumno = $idalumno ");
		
		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$ci = $data['ci'];
				$nombre = $data['nombre'];
				$apellidos = $data['apellidos'];
				}
		}else{
			header("location: lista_alumno.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Eliminar Alumno</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
		<br> <br>
		
		<i class="icon-user-minus" style="font-size:60px; color:red;"></i>
		<br>
		<br>
			<h2 style="font-size:20px;">¿Está seguro que desea  <i class="icon-bin" style="color:red;"></i> el siguiente registro alumno con:?</h2>
			<hr>
			<p>Cedula Identidad: <span><?php echo $ci; ?></span></p>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Apellidos: <span><?php echo $apellidos; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="idalumno" value="<?php echo $idalumno; ?>">
				<a style="text-decoration:none;" href="lista_alumno.php" class="btn_cancel"> <i class="icon-cross" style="font-size:18px;"></i> Cancelar</a>
				<button type="submit" class="btn_ok"> <i class="icon-bin" style="font-size:18px;"></i> Eliminar </button>
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>