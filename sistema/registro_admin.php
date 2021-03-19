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
		if(empty($_POST['ci']) ||empty($_POST['nombre']) || empty($_POST['apellidos']) ||empty($_POST['direccion']) ||empty($_POST['fecha_nac']) ||empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['especialidad']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else
		{
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
				$query = mysqli_query($conection,"SELECT * FROM administrador  WHERE ci = '$ci' ");
				$result = mysqli_fetch_array($query);
				}
				if($result > 0)
				{
					$alert='<p class="msg_error">El numero de cedula de identidad ya existe.</p>';
				}
				else
				{
				$query_insert = mysqli_query($conection,"INSERT INTO administrador(ci,nombre,apellidos,direccion,fecha_nac,correo,telefono,especialidad,idusuario)
														VALUES('$ci','$nombre','$apellidos','$direccion','$fecha_nac','$email','$telefono','$especialidad','$idusuario')");
					if($query_insert)
					{
						$alert='<p class="msg_save">Administrador creado correctamente.</p>';
					}
					else{
						$alert='<p class="msg_error">Error al crear el Administrador.</p>';
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
	<title>UEML | Registro Administrador</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
		<h1 style="font-size:20pt;"> <i  class="icon-user-tie"></i> Registro Nuevo Administrador</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
                <label for="ci">Cedula Identidad</label>
				<input type="numeric" name="ci" id="numeric" pattern="[0-9]{6,9}"  placeholder="Ingrese Numero Cedula Identidad">
				<label for="nombre">Nombre </label>
				<input type="text" name="nombre" id="nombre" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombres">
				<label for="apellidos">Apellidos </label>
				<input type="text" name="apellidos" id="apellidos" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Apellidos">
				<label for="direccion">Dirección </label>
				<input type="tetx" name="direccion" id="direccion" onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Dirección ">
				<label for="fecha_nac">Fecha Nacimiento</label>
				<input type="date" name="fecha_nac" id="fecha_nac" placeholder="Ingrese Fecha Nacimiento">
                <label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="ejemplo@gmail.com">
				<label for="telefono">Telefono</label>
				<input type="numeric" name="telefono" id="telefono" pattern="[0-9]{8,10}" placeholder="Ingrese Numero Telefono o Celular" >
				<label for="especialidad">Cargo</label>
				<input type="text" name="especialidad" id="especialidad" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Cargo ">
				<center><button type="submit" value="Ingresar" class="btn_save"><i class="icon-floppy"></i> Guardar Nuevo Administrador</button>	</center>
			</form>
			</div>
	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>