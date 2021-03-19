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
		if(empty($_POST['rda']) || empty($_POST['ci']) ||empty($_POST['nombre']) || empty($_POST['apellidos']) ||empty($_POST['direccion']) ||empty($_POST['fecha_nac']) ||empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['especialidad']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else
		{
			$rda 			= $_POST['rda'];
			$ci 			= $_POST['ci'];
			$nombre 		= $_POST['nombre'];
			$apellidos 		= $_POST['apellidos'];
			$direccion 		= $_POST['direccion'];
			$fecha_nac		= $_POST['fecha_nac'];
			$email  		= $_POST['correo'];
			$telefono   	= $_POST['telefono'];
			$especialidad    = $_POST['especialidad'];
			$idusuario       = $_SESSION['idUser'];/*para ver el usuario que lo registro*/
			
			$result = 0;
				if(is_numeric($ci) and $ci !=0)
				{

				$query = mysqli_query($conection,"SELECT * FROM profesor  WHERE ci = '$ci' OR rda='$rda' ");
				$result = mysqli_fetch_array($query);
				}
				if($result > 0)
				{
					$alert='<p class="msg_error">El Número Cédula de Identidad o RDA ya existe.</p>';
				}
				else{
				$query_insert = mysqli_query($conection,"INSERT INTO profesor(rda,ci,nombre,apellidos,direccion,fecha_nac,correo,telefono,especialidad,idusuario)
														VALUES('$rda','$ci','$nombre','$apellidos','$direccion','$fecha_nac','$email','$telefono','$especialidad','$idusuario')");
					if($query_insert)
					{
						$alert='<p class="msg_save">Profesor creado correctamente.</p>';
					}
					else{
						$alert='<p class="msg_error">Error al crear el Profesor.</p>';
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
	<title>UEML | Registro Profesor</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>

	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
		<h1 style="font-size:20pt;"> <i  class="icon-user-check"></i> Registro Nuevo Profesor</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
			   <label for="rda">Número de RDA </label>
				<input type="numeric" name="rda" id="numeric" pattern="[0-9]{6,9}"  placeholder="Ingresar Numero Cde RDAedula ">
				<label for="ci">Cedula Identidad</label>
				<input type="numeric" name="ci" id="numeric" pattern="[0-9]{6,9}"  placeholder="Ingresar Numero Cedula Identidad">
				<label for="nombre">Nombre </label>
				<input type="text" name="nombre" id="nombre"onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingresar Nombres ">
				<label for="apellidos">Apellidos </label>
				<input type="text" name="apellidos" id="apellidos" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingresar Apellidos ">
				<label for="direccion">Dirección </label>
				<input type="text" name="direccion" id="direccion" onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Dirección  Completo">
				<label for="fecha_nac">Fecha Nacimiento</label>
				<input type="date" name="fecha_nac" id="fecha_nac" placeholder="Ingrese Fecha Nacimiento">
                <label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="ejemplo@.gmail.com">
				<label for="telefono">Telefono</label>
				<input type="numeric" name="telefono" id="telefono" pattern="[0-9]{8,10}" placeholder="Ingrese Numero Telefono" >
				<label for="especialidad">Especialidad</label>
				<input type="text" name="especialidad" id="especialidad" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingresar Especialidad ">
				<center><button type="submit" value="Ingresar" class="btn_save"><i class="icon-floppy"></i> Guardar Nuevo Profesor</button>	</center>
			</form>
			</div>
	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>