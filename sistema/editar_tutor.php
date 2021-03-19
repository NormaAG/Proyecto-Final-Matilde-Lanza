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
		if(empty($_POST['ci_padre']) && empty($_POST['nombre_padre']) && empty($_POST['fecha_nac_padre']) && empty($_POST['ocupacion_padre']) 
		&& empty($_POST['ci_madre']) && empty($_POST['nombre_madre']) && empty($_POST['fecha_nac_madre']) && empty($_POST['ocupacion_madre'])
		|| empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['correo'])){
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

            $idtutor =          $_POST['id'];
            $ci_padre =               $_POST['ci_padre'];
			$nombre_padre =           $_POST['nombre_padre'];
			$fecha_nac_padre  =       $_POST['fecha_nac_padre'];
			$ocupacion_padre =        $_POST['ocupacion_padre'];
			$ci_madre =               $_POST['ci_madre'];
			$nombre_madre =           $_POST['nombre_madre'];
			$fecha_nac_madre  =       $_POST['fecha_nac_madre'];
            $ocupacion_madre =        $_POST['ocupacion_madre'];
            $direccion =        $_POST['direccion'];
			$telefono  =        $_POST['telefono'];
			$telRef  =        $_POST['telRef'];
			$correo   =         $_POST['correo'];

           
                $sql_update = mysqli_query($conection,"UPDATE tutores
							SET ci_padre = '$ci_padre', nombre_padre = '$nombre_padre', fecha_nac_padre = '$fecha_nac_padre',ocupacion_padre = '$ocupacion_padre',ci_madre = '$ci_madre', nombre_madre = '$nombre_madre', fecha_nac_madre = '$fecha_nac_madre',ocupacion_madre = '$ocupacion_madre', direccion = '$direccion', telefono='$telefono',telRef='$telRef',correo='$correo'
							WHERE idtutor= $idtutor ");
                
                if($sql_update){
					$alert='<p class="msg_save">Tutores actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizar el Tutores.</p>';
				}

			}
        }
	

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_tutor.php');
		mysqli_close($conection);
	}
	$idtutor = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM tutores 
											WHERE idtutor= $idtutor and estatus = 1");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_tutor.php');
	}else{
		
		while ($data = mysqli_fetch_array($sql)) {
			# code...
            $idtutor  = $data['idtutor'];
            $ci_padre    = $data['ci_padre'];
            $nombre_padre  = $data['nombre_padre'];
            $fecha_nac_padre     = $data['fecha_nac_padre'];
			$ocupacion_padre    = $data['ocupacion_padre'];
			
            $ci_madre    = $data['ci_madre'];
            $nombre_madre  = $data['nombre_madre'];
            $fecha_nac_madre     = $data['fecha_nac_madre'];
            $ocupacion_madre    = $data['ocupacion_madre'];
            $direccion     = $data['direccion'];
			$telefono = $data['telefono'];
			$telRef  = $data['telRef'];
			$correo  = $data['correo'];
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML |Actualizar Tutor</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
			<h1 class="icon-users" style="font-size=:16pt;"> Actualizar  Tutor</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $idtutor; ?>">
                <label for="ci_padre">Cedula Identidad Padre</label>
				<input type="numeric" name="ci_padre" id="ci_padre" pattern="[0-9]{8,9}"  placeholder="Ingrese Numero Cedula Identida" value="<?php echo $ci_padre; ?>">
				<label for="nombre_padre">Nombre  Padre</label>
				<input type="text" name="nombre_padre" id="nombre_padre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombre completo" value="<?php echo $nombre_padre; ?>">
				<label for="fecha_nac_padre">Fecha Nac. Padre </label>
				<input type="date" name="fecha_nac_padre" id="fecha_nac_padre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese apellido completo" value="<?php echo $fecha_nac_padre; ?>">
				<label for="ocupacion_padre">Ocupación  Padre</label>
				<input type="text" name="ocupacion_padre" id="ocupacion_padre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese ocupación" value="<?php echo $ocupacion_padre; ?>">
				
				<label for="ci_madre">Cedula Identidad Madre</label>
				<input type="numeric" name="ci_madre" id="ci_madre" pattern="[0-9]{8,9}"  placeholder="Ingrese Numero Cedula Identida" value="<?php echo $ci_madre; ?>">
				<label for="nombre_madre">Nombre Madre</label>
				<input type="text" name="nombre_madre" id="nombre_madre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombre completo" value="<?php echo $nombre_madre; ?>">
				<label for="fecha_nac_madre">Fecha Nac. Madre </label>
				<input type="date" name="fecha_nac_madre" id="fecha_nac_madre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Fecha NAci completo" value="<?php echo $fecha_nac_madre; ?>">
				<label for="ocupacion_madre">Ocupación Madre</label>
				<input type="text" name="ocupacion_madre" id="ocupacion_madre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese ocupación" value="<?php echo $ocupacion_madre; ?>">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion"  onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese su Dirección " value="<?php echo $direccion; ?>">
				
				<label for="telefono">Telefono</label>
				<input type="numeric" name="telefono" id="telefono" pattern="[0-9]{8,10}" placeholder="Ingrese Numero Telefono" value="<?php echo $telefono; ?>">
				<label for="telRef">Telefono Ref.</label>
				<input type="numeric" name="telRef" id="telRef" pattern="[0-9]{8,10}" placeholder="Ingrese Numero Telefono" value="<?php echo $telRef; ?>">
				
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="ejemplo@gmail.com" value="<?php echo $correo; ?>">
				<center><button type="submit" value="Actualiar" class="btn_save"><i class="icon-refresh"></i> Actualizar Tutor</button>	</center>
			</form>


		</div>


	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>