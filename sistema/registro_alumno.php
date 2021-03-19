<?php 
	session_start(); 
	if($_SESSION['rol'] != 1  and $_SESSION['rol'] != 3)  /* si no es administrador o profesor nos redirecciona a la carpeta raiz*/
	{
		header("location: ./");
	}
		include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['ci']) ||empty($_POST['nombre']) || empty($_POST['apellidos']) ||empty($_POST['direccion']) ||empty($_POST['fecha_nac']))
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
			$idtutor   	    = $_POST['idtutor'];
			$idusuario      = $_SESSION['idUser'];/*para ver el usuario que lo registro*/
			
			$foto 			=$_FILES['foto'];
			$nombre_foto	=$foto['name'];
			$type 			=$foto['type'];
			$url_temp 		=$foto['tmp_name'];

			$imgAlumno ='img_alumno.png';
			if($nombre_foto !=''){
				$destino = 'img/uploads/';
				$img_nombre='img_'.md5(date('d-m-Y H:m:s'));
				$imgAlumno=$img_nombre.'.jpg';
				$src =$destino.$imgAlumno;
			}


			$result = 0;
				if(is_numeric($ci) and $ci !=0)
				{
				$query = mysqli_query($conection,"SELECT * FROM alumno  WHERE ci = '$ci' ");
				$result = mysqli_fetch_array($query);
				}
				if($result > 0)
				{
					$alert='<p class="msg_error">El numero de cedula de identidad ya existe.</p>';
				}
				else
				{
				$query_insert = mysqli_query($conection,"INSERT INTO alumno(ci,nombre,apellidos,direccion,fecha_nac,correo,telefono,idtutor,idusuario,foto)
														VALUES('$ci','$nombre','$apellidos','$direccion','$fecha_nac','$email','$telefono','$idtutor','$idusuario','$imgAlumno')");
					if($query_insert)
					{
						if($nombre_foto !=''){
							move_uploaded_file($url_temp,$src);
						}
						$alert='<p class="msg_save">Alumno creado correctamente.</p>';
						}

					else{
						$alert='<p class="msg_error"> ! Error al crear el Alumno.</p>';
						}
		    	}
	     }
	mysqli_close($conection);
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Registro Alumno</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
			<h1 style="font-size:20pt;"> <i  class="icon-graduate"></i> Registro Nuevo Alumno</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post" enctype="multipart/form-data">
			<label for="ci">Cedula Identidad</label>
				<input type="ci" name="ci" id="numeric" pattern="[0-9]{6,9}" placeholder="Ingrese Numero Carnet" >
						
				<label for="nombre">Nombres</label>
				<input type="text" name="nombre" id="nombre" onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Nombres">
				<label for="apellidos">Apellidos </label>
				<input type="text" name="apellidos" id="apellidos" onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Apellidos">
				<label for="direccion">Dirección </label>
				<input type="text" name="direccion" id="direccion" onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Dirección  ">
				<label for="fecha_nac">Fecha Nacimiento</label>
				<input type="date" name="fecha_nac" id="fecha_nac" placeholder="Ingrese Fecha Nacimiento">
                <label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="ejemplo@gmail.com">
				<label for="telefono">Telefono</label>
				<input type="tel" name="telefono" id="telefono" pattern="[0-9]{8}" placeholder="Ingrese Numero de Telefono o Celular" >
										
						<div class="photo">
							<label for="foto">Subir Foto Alumno:</label>
								<div class="prevPhoto">
								<span class="delPhoto notBlock">X</span>
								<label for="foto"></label>
								</div>
								<div class="upimg">
								<input type="file" name="foto" id="foto" require>
								</div>
								<div id="form_alert"></div>
						</div>


				<label for="tutor">Tutor</label>
				<select name="idtutor" id="tutor">
				
				<?php 
				$sql=$conection->query(" select * from tutores");
				while($fila=$sql->fetch_array()){
					echo "<option value='".$fila['idtutor']."'> ".$fila['nombre_madre'].", ".$fila['nombre_padre']." </option>";
				}
				?>
				</select>
				<center><button type="submit" value="Ingresar" class="btn_save"><i class="icon-floppy"></i> Guardar Nuevo Alumno</button>	</center>
			</form>
			</div>
	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>