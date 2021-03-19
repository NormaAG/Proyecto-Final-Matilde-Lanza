<?php 
	session_start(); 
	if($_SESSION['rol'] != 1 )  /* si no es administrador nos redirecciona a la carpeta raiz*/
	{
		header("location: ./");
	}
		include "../conexion.php";

	if(!empty($_POST))
	{
	$alert='';
		if(empty($_POST['materia']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
        }
        else
		{   
			$materia 			= $_POST['materia'];
			$idusuario          = $_SESSION['idUser'];/*para ver el usuario que lo registro*/
			
			$query = mysqli_query($conection,"SELECT * FROM materia WHERE materia = '$materia' ");
			$result = mysqli_fetch_array($query);

            if($result > 0)
            {
				$alert='<p class="msg_error">Materia  ya existe.</p>';
            }
            else{

				$query_insert = mysqli_query($conection,"INSERT INTO materia(materia,idusuario)
														             VALUES('$materia','$idusuario')");
					if($query_insert)
					{
						$alert='<p class="msg_save">Materia creado correctamente.</p>';
					}
					else{
						$alert='<p class="msg_error">Error al crear la Materia.</p>';
						}
		    	
                 }
              
        }
		mysqli_close($conection);
     }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Registro Materia</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
		<h1 style="font-size:20pt;"> <i  class="icon-profile"></i> Registro Materia</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
                <label for="materia">Materia</label>
				<input type="text" name="materia" id="materia" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombre Materia">
				<center><button type="submit" value="Ingresar" class="btn_save"><i class="icon-floppy"></i> Guardar Nuevo Materia</button>	</center>
			</form>
			</div>
	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>