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
		if(empty($_POST['ci']) || empty($_POST['nombre']) || empty($_POST['apellidos'])  || empty($_POST['direccion']) || empty($_POST['fecha_nac'])   || empty($_POST['id']) || empty($_POST['foto_actual'])  || empty($_POST['foto_remove']) ) /*campos obligatorios a llenar en formulario*/
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

            $idalumno =          $_POST['id'];
            $ci =               $_POST['ci'];
            $nombre =           $_POST['nombre'];
            $apellidos =        $_POST['apellidos'];
            $direccion =        $_POST['direccion'];
			$fecha_nac  =       $_POST['fecha_nac'];
			$correo   =         $_POST['correo'];
			$telefono  =        $_POST['telefono'];
			$imgAlumno = 		$_POST['foto_actual'];
			$imgRemove = 		$_POST['foto_remove'];
			$foto 			=$_FILES['foto'];
			$nombre_foto	=$foto['name'];
			$type 			=$foto['type'];
			$url_temp 		=$foto['tmp_name'];

			$upd ='';
			if($nombre_foto !=''){
				$destino = 'img/uploads/';
				$img_nombre='img_'.md5(date('d-m-Y H:m:s'));
				$imgAlumno=$img_nombre.'.jpg';
				$src =$destino.$imgAlumno;
			}else{
				if($_POST['foto_actual'] != $_POST['foto_remove'] ){
					$imgAlumno ='img_alumno.png';
				}
			}

            $result =0;
           if (is_numeric($ci) and $ci !=0){
			$query = mysqli_query($conection,"SELECT * FROM alumno 
													   WHERE (ci = '$ci' AND idalumno != $idalumno)
                                                       ");
                          $result = mysqli_fetch_array($query);
            }
			if($result > 0){
				$alert='<p class="msg_error">El numero de cedula de identidad ya existe.</p>';
			}else{
                        if($ci == ''){ /*en caso de no llenar campo ci automaticamente pone cero*/
                            $ci='0';
                        }
                $sql_update = mysqli_query($conection,"UPDATE alumno
							SET ci = '$ci', nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion', fecha_nac = '$fecha_nac',correo='$correo',telefono='$telefono', foto = '$imgAlumno'
							WHERE idalumno= $idalumno ");
                
                if($sql_update){
					if(($nombre_foto != ''&& ($_POST['foto_actual'] != 'img_alumno.png')) || ($_POST['foto_actual'] != $_POST['foto_remove']))
					{
						unlink('img/uploads/'.$_POST['foto_actual']);
					}
					if($nombre_foto != '')
					{
						move_uploaded_file($url_temp, $src);
					}
					$alert='<p class="msg_save">Alumno actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizar el Alumno.</p>';
				}

			}
        }
	}

	

	/*validar alumno*/
	if(empty($_REQUEST['id']))
	{
		header("location:lista_alumno.php");
	}else
	{
		$idalumno=$_REQUEST['id'];
		if(!is_numeric($idalumno))
		{
			header("location:lista_alumno.php");	
		}
		$query_alumno= mysqli_query($conection, "SELECT * FROM alumno WHERE idalumno=$idalumno AND estatus=1"  );
		$result_alumno=mysqli_num_rows($query_alumno);
		$foto='';
		$classRemove = 'notBlock';
	
	if($result_alumno > 0)
	{
		$data_alumno = mysqli_fetch_assoc($query_alumno);
		if($data_alumno['foto'] != 'img_alumno.png')
		{
			$classRemove='';
			$foto = '<img id="img" src="img/uploads/'.$data_alumno['foto'].'" alt ="Foto Alumno">';
		}
	}
	}
	?>
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML |Actualizar Alumno</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
			<h1 class="icon-user" style="font-size=:16pt;"> Actualizar  Alumno</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $data_alumno['idalumno']; ?>">

				<input type="hidden" id= "foto_actual" name="foto_actual" value="<?php echo $data_alumno['foto']; ?>">
				<input type="hidden" id= "foto_remove" name="foto_remove" value="<?php echo $data_alumno['foto']; ?>">

                <label for="ci">Cedula Identidad</label>
				<input type="numeric" name="ci" id="ci" pattern="[0-9]{6,9}"  placeholder="Ingrese Numero Cedula Identida" value="<?php echo $data_alumno['ci']; ?>">
				<label for="nombre">Nombre </label>
				<input type="nombre" name="nombre" id="nombre" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese Nombre completo" value="<?php echo $data_alumno['nombre']; ?>">
				<label for="apellidos">Apellidos </label>
				<input type="apellidos" name="apellidos" id="apellidos" onblur="aMayusculas(this.value,this.id)" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,40}" placeholder="Ingrese apellido completo" value="<?php echo $data_alumno['apellidos']; ?>">
				<label for="direccion">Dirección</label>
				<input type="direccion" name="direccion" id="direccion" onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese su dirección Completo" value="<?php echo $data_alumno['direccion']; ?>">
				<label for="fecha_nac">Fecha Nacimiento</label>
				<input type="date" name="fecha_nac" id="fecha_nac" placeholder="Ingrese Fecha Nacimiento" value="<?php echo $data_alumno['fecha_nac']; ?>">
                <label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico" value="<?php echo $data_alumno['correo']; ?>">
				<label for="telefono">Telefono</label>
				<input type="numeric" name="telefono" id="telefono" pattern="[0-9]{8,10}" placeholder="Ingrese Numero Telefono" value="<?php echo $data_alumno['telefono']; ?>">
					
				<div class="photo">
								<label for="foto">Actualizar Foto Alumno</label>
									<div class="prevPhoto">
									<span class="delPhoto <?php echo $classRemove; ?>">X</span>
									<label for="foto"></label>
									<?php echo $foto; ?>
									</div>
									<div class="upimg">
									<input type="file" name="foto" id="foto">
									</div>
									<div id="form_alert"></div>
						</div>
				
			
                <center><button type="submit" value="Actualiar" class="btn_save"><i class="icon-refresh"></i> Actualizar Alumno</button>	</center>
			</form>


		</div>


	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>