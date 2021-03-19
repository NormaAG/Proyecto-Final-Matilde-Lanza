<?php 
	
	session_start();
	if($_SESSION['rol'] != 1)/*solo el administrador puede editar al administrador*/
	{
		header("location: ./");
	}

	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
        if(empty($_POST['materia'])) /*campos obligatorios a llenar en formulario*/
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else
		{

            $idmateria =       $_POST['id'];
            $materia =               $_POST['materia'];
           
            $result =0;
        
			$query = mysqli_query($conection,"SELECT * FROM materia 
					 WHERE (materia = '$materia' AND idmateria != $idmateria)
                                                       ");
                          $result = mysqli_fetch_array($query);
        
			if($result > 0)
			{
				$alert='<p class="msg_error">El nombre de materia ya existe.</p>';
			}else
			{
                $sql_update = mysqli_query($conection,"UPDATE materia
							SET materia = '$materia'
							WHERE idmateria= $idmateria ");
                
				if($sql_update)
				{
					$alert='<p class="msg_save">Materia actualizado correctamente.</p>';
				}else
				{

					$alert='<p class="msg_error">Error al actualizar el Materia.</p>';
				}

			}
        }
	}
	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_materia.php');
		mysqli_close($conection);
	}
	$idmateria = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM materia 
											WHERE idmateria= $idmateria and estatus = 1");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_materia.php');
	}else{
		
		while ($data = mysqli_fetch_array($sql)) {
			# code...
            $idmateria  = $data['idmateria'];
            $materia    = $data['materia'];
            
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Actualizar Materia</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
			<h1 class="icon-profile" style="font-size=:16pt;"> Actualizar Materia</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $idmateria; ?>">
               <label for="materia">Materia </label>
				<input type="text" name="materia" id="materia" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombre Materia" value="<?php echo $materia; ?>">
				<center><button type="submit" value="Actualiar" class="btn_save"><i class="icon-refresh"></i> Actualizar Materia</button>	</center>
			</form>


		</div>


	</section>
	<script src="js/mayuscula.js"></script>	
	
	<?php include "includes/footer.php"; ?>
</body>
</html>