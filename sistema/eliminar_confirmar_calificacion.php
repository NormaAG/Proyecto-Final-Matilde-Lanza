<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	include "../conexion.php";
	if(!empty($_POST))
	{
		if(empty($_POST['idnota'])){
			header("location: lista_calificaciones.php");
			mysqli_close($conection);
		}
		$idnota = $_POST['idnota'];

	$query_delete = mysqli_query($conection,"DELETE FROM notas WHERE idnota =$idnota ");
		
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_calificaciones.php");
			
		}else{
			echo "Error al eliminar";
		}

	}




	if(empty($_REQUEST['id']))
	{
		header("location: lista_calificaciones.php");
		mysqli_close($conection);
	}else{

		$idnota = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT * FROM notas
		WHERE idnota = $idnota ");


		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
		
				$ci = $data['ci'];
                $idmateria = $data['idmateria'];
				}
		}else{
			header("location: lista_calificaciones.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Eliminar Calificaciones</title>
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
			<h2 style="font-size:20px;">¿Está seguro que desea  <i class="icon-bin" style="color:red;"></i> el siguiente registro calificiones de la materia:?</h2>
			<hr>
			<p>Cedula Identidad: <span><?php echo $ci; ?></span></p>
            <p>Materia: <span><?php echo $idmateria; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="idnota" value="<?php echo $idnota; ?>">
				<a style="text-decoration:none;" href="lista_calificaciones.php" class="btn_cancel"> <i class="icon-cross" style="font-size:18px;"></i> Cancelar</a>
				<button type="submit" class="btn_ok"> <i class="icon-bin" style="font-size:18px;"></i> Eliminar </button>
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>