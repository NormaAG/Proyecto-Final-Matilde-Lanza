<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";
	if(!empty($_POST))
	{
		if(empty($_POST['idmateria'])){
			header("location: lista_materia.php");
			mysqli_close($conection);
		}
		$idmateria = $_POST['idmateria'];

		//$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario =$idusuario ");
		$query_delete = mysqli_query($conection,"UPDATE materia SET estatus = 0 WHERE idmateria = $idmateria ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_materia.php");
			
		}else{
			echo "Error al eliminar";
		}

	}




	if(empty($_REQUEST['id']))
	{
		header("location: lista_materia.php");
		mysqli_close($conection);
	}else{

		$idmateria = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM materia
												WHERE idmateria = $idmateria ");
		
		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				
				$materia = $data['materia'];
			
				}
		}else{
			header("location: lista_materia.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Eliminar Materia</title>
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
			<h2 style="font-size:20px;">¿Está seguro que desea  <i class="icon-bin" style="color:red;"></i> la siguiente materia :?</h2>
			<hr>
			<p>Materia: <span><?php echo $materia; ?></span></p>
		

			<form method="post" action="">
				<input type="hidden" name="idmateria" value="<?php echo $idmateria; ?>">
				<a style="text-decoration:none;" href="lista_materia.php" class="btn_cancel"> <i class="icon-cross" style="font-size:18px;"></i> Cancelar</a>
				<button type="submit" class="btn_ok"> <i class="icon-bin" style="font-size:18px;"></i> Eliminar </button>
			</form>
		</div>
	</section>
	
	<?php include "includes/footer.php"; ?>
</body>
</html>