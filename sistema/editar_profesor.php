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
		if(empty($_POST['rda']) || empty($_POST['ci']) || empty($_POST['nombre']) || empty($_POST['apellidos'])  || empty($_POST['direccion'])|| empty($_POST['fecha_nac']) || empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['especialidad'])) /*campos obligatorios a llenar en formulario*/
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

            $idprofesor =       $_POST['id'];
            $rda =               $_POST['rda'];
            $ci =               $_POST['ci'];
            $nombre =           $_POST['nombre'];
            $apellidos =        $_POST['apellidos'];
            $direccion =        $_POST['direccion'];
			$fecha_nac  =       $_POST['fecha_nac'];
			$correo   =         $_POST['correo'];
			$telefono  =        $_POST['telefono'];
			$especialidad =     $_POST['especialidad'];

            $result =0;
           if (is_numeric($ci) and $ci !=0){
			$query = mysqli_query($conection,"SELECT * FROM profesor 
					 WHERE (ci = '$ci' AND idprofesor != $idprofesor)
                                                       ");
                          $result = mysqli_fetch_array($query);
            }
			if($result > 0){
				$alert='<p class="msg_error">El numero de cedula de identidad ya existe.</p>';
			}else{
                        if($ci == ''){ /*en caso de no llenar campo ci automaticamente pone cero*/
                            $ci='0';
                        }
                $sql_update = mysqli_query($conection,"UPDATE profesor
							SET rda = '$rda', ci = '$ci', nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion', fecha_nac = '$fecha_nac',correo='$correo',telefono='$telefono',especialidad='$especialidad'
							WHERE idprofesor= $idprofesor ");
                
                if($sql_update){
					$alert='<p class="msg_save">Profesor actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizar el Profesor.</p>';
				}

			}
        }
	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_profesor.php');
		mysqli_close($conection);
	}
	$idprofesor = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM profesor 
											WHERE idprofesor= $idprofesor and estatus = 1");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_profesor.php');
	}else{
		
		while ($data = mysqli_fetch_array($sql)) {
			# code...
            $idprofesor  = $data['idprofesor'];
            $rda    = $data['rda'];
            $ci    = $data['ci'];
            $nombre  = $data['nombre'];
            $apellidos     = $data['apellidos'];
            $direccion    = $data['direccion'];
            $fecha_nac     = $data['fecha_nac'];
			$correo  = $data['correo'];
			$telefono = $data['telefono'];
			$especialidad   = $data['especialidad'];
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML |Actualizar Profesor</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
			<h1 class="icon-user-check" style="font-size=:16pt;"> Actualizar  Profesor</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $idprofesor; ?>">
                <label for="rda"> RDA</label>
				<input type="numeric" name="rda" id="numric" pattern="[0-9]{6,9}"  placeholder="Ingrese Numero RDA" value="<?php echo $rda; ?>">
                <label for="ci">Cedula Identidad</label>
				<input type="numeric" name="ci" id="numric" pattern="[0-9]{8,9}"  placeholder="Ingrese Numero Cedula Identida" value="<?php echo $ci; ?>">
				<label for="nombre">Nombre </label>
				<input type="nombre" name="nombre" id="nombre"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombre completo" value="<?php echo $nombre; ?>">
				<label for="apellidos">Apellidos </label>
				<input type="apellidos" name="apellidos" id="apellidos"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese apellido completo" value="<?php echo $apellidos; ?>">
				<label for="direccion">Dirección</label>
				<input type="direccion" name="direccion" id="direccion"  onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese su dirección Completo" value="<?php echo $direccion; ?>">
				<label for="fecha_nac">Fecha Nacimiento</label>
				<input type="date" name="fecha_nac" id="fecha_nac" placeholder="Ingrese Fecha Nacimiento" value="<?php echo $fecha_nac; ?>">
                <label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="ejemplo@gmail.com" value="<?php echo $correo; ?>">
				<label for="telefono">Telefono</label>
				<input type="numeric" name="telefono" id="telefono" pattern="[0-9]{8,10}" placeholder="ingrese numero de telefono" value="<?php echo $telefono; ?>">
				<label for="especialidad">Especialidad</label>
				<input type="especialidad" name="especialidad" id="especialidad"  onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese su Especialidad " value="<?php echo $especialidad; ?>">
				<center><button type="submit" value="Actualiar" class="btn_save"><i class="icon-refresh"></i> Actualizar Profesor</button>	</center>
			</form>


		</div>


	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>