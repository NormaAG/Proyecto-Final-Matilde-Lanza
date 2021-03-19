<?php 
	session_start(); 
	if($_SESSION['rol'] != 1 and $_SESSION['rol'] != 3)  /* si no es administrador nos redirecciona a la carpeta raiz*/
	{
		header("location: ./");
	}
		include "../conexion.php";

	if(!empty($_POST))
	{
	$alert='';
		if(empty($_POST['ci_padre']) && empty($_POST['nombre_padre']) && empty($_POST['fecha_nac_padre']) && empty($_POST['ocupacion_padre']) 
		 && empty($_POST['ci_madre']) && empty($_POST['nombre_madre']) && empty($_POST['fecha_nac_madre']) && empty($_POST['ocupacion_madre'])
		 || empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['correo']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else
		{
			$ci_padre 			= $_POST['ci_padre'];
			$nombre_padre 		= $_POST['nombre_padre'];
			$fecha_nac_padre	= $_POST['fecha_nac_padre'];
			$ocupacion_padre 	= $_POST['ocupacion_padre'];
			$ci_madre 			= $_POST['ci_madre'];
			$nombre_madre 		= $_POST['nombre_madre'];
			$fecha_nac_madre	= $_POST['fecha_nac_madre'];
			$ocupacion_madre 	= $_POST['ocupacion_madre'];
			$direccion 			= $_POST['direccion'];
			$telefono   		= $_POST['telefono'];
			$telRef  		    = $_POST['telRef'];
			$email  			= $_POST['correo'];
			$idusuario          = $_SESSION['idUser'];/*para ver el usuario que lo registro*/
			
			
				$query_insert = mysqli_query($conection,"INSERT INTO tutores(ci_padre,nombre_padre,fecha_nac_padre,ocupacion_padre,ci_madre,nombre_madre,fecha_nac_madre,ocupacion_madre,direccion,telefono,telRef,correo,idusuario)
														             VALUES('$ci_padre','$nombre_padre','$fecha_nac_padre','$ocupacion_padre','$ci_madre','$nombre_madre','$fecha_nac_madre','$ocupacion_madre','$direccion','$telefono','$telRef','$email','$idusuario')");
					if($query_insert)
					{
						$alert='<p class="msg_save">Tutores creado correctamente.</p>';
					}
					else{
						$alert='<p class="msg_error">Error al crear el Tutor.</p>';
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
	<title>UEML | Registro Tutor</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
		<h1 style="font-size:20pt;"> <i  class="icon-users"></i> Registro Datos de Tutores</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
                <label for="ci_padre">Cedula Identidad Padre</label>
				<input type="numeric" name="ci_padre" id="ci_padre" pattern="[0-9]{6,9}"  placeholder="Ingrese Numero Cedula Identida del Padre">
				<label for="nombre_padre">Nombre Completo Padre </label>
				<input type="text" name="nombre_padre" id="nombre_padre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombre completo del padre">
				<label for="fecha_nac_padre">Fecha Nacimiento Padre</label>
				<input type="date" name="fecha_nac_padre" id="fecha_nac_padre" placeholder="Ingrese Fecha Nacimiento padre">
				<label for="ocupacion_padre">Ocupación Padre </label>
				<input type="text" name="ocupacion_padre" id="ocupacion_padre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Ocupación  del padre">
				
				<label for="ci_madre">Cedula Identidad Madre</label>
				<input type="numeric" name="ci_madre" id="ci_madre" pattern="[0-9]{6,9}"  placeholder="Ingrese Numero Cedula Identida del madre">
				<label for="nombre_madre">Nombre Completo Madre </label>
				<input type="text" name="nombre_madre" id="nombre_madre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombre completo del madre">
				<label for="fecha_nac_madre">Fecha Nacimiento Madre</label>
				<input type="date" name="fecha_nac_madre" id="fecha_nac_madre" placeholder="Ingrese Fecha Nacimiento madre">
				<label for="ocupacion_madre">Ocupación Madre </label>
				<input type="text" name="ocupacion_madre" id="ocupacion_madre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Ocupación madre">
				
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion"  onblur="aMayusculas(this.value,this.id)"  placeholder="Ingrese su dirección Completo">
				<label for="telefono">Telefono</label>
				<input type="numeric" name="telefono" id="telefono" pattern="[0-9]{8,10}" placeholder="ingrese numero de telefono" >
				<label for="telRef">Telefono Ref:</label>
				<input type="numeric" name="telRef" id="telRef" pattern="[0-9]{8,10}" placeholder="ingrese numero de telefono de referencia" >
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="eemplo@gmail.com">
				<center><button type="submit" value="Ingresar" class="btn_save"><i class="icon-floppy"></i> Guardar Nuevo Tutor</button>	</center>
			</form>
			</div>
	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>