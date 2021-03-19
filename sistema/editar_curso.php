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
			if(empty($_POST['grado']) || empty($_POST['seccion']))
			{
				$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
			}
			else
			{   
				$idcurso 			= $_POST['idcurso'];
				$grado 			= $_POST['grado'];
				$seccion 			= $_POST['seccion'];
				$nombre 			= $_POST['nombre'];
				$idusuario          = $_SESSION['idUser'];/*para ver el usuario que lo registro*/
				
				$query = mysqli_query($conection,"SELECT * FROM curso WHERE ((grado != '$grado' AND  seccion ='$seccion' AND nombre ='$nombre') OR (grado = '$grado' AND  seccion ='$seccion' AND nombre ='$nombre'))");
				$result = mysqli_fetch_array($query);
	
				if($result > 1)
				{
					$alert='<p class="msg_error">Grado y Seccion ya existe..... Profesor ya esta con un curso asignado</p>';
				}
				else{
	
					$query_update= mysqli_query($conection,
					"UPDATE  curso 
					SET grado = '$grado', seccion='$seccion',nombre='$nombre'
					WHERE idcurso= $idcurso ");
						if($query_update)
						{
							$alert='<p class="msg_save">Curso Actualizado correctamente.</p>';
						}
						else{
							$alert='<p class="msg_error">Error al Actualizar Curso.</p>';
							}
					
					 }
				  
			}
		
		 }
	 //mostrar datos de curso
	 if(empty($_REQUEST['id'])){
		header('Location: lista_usuarios.php');
	}else{
	$idcurso = $_REQUEST['id'];
	if(!is_numeric($idcurso)) {
		header('location: lista_curso.php');
	}
	$query_curso = mysqli_query($conection,"SELECT c.idcurso, c.grado,c.seccion,p.idprofesor, p.nombre,apellidos
	FROM curso c 
	INNER JOIN profesor p ON c.nombre = p.idprofesor
	WHERE c.idcurso = $idcurso AND c.estatus = 1 ");

	$result_curso =mysqli_num_rows($query_curso);
	if($result_curso > 0){
	
	$data_curso=mysqli_fetch_assoc($query_curso);

	//print_r($data_curso);
		}else{
			header('location: lista_curso.php');
		}
	}
	
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Actualizar Curso</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
		<h1 style="font-size:20pt;"> <i  class="icon-office"></i> Actualizar Curso</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
			<input type="hidden" name="idcurso" id="idcurso" value="<?Php echo $data_curso['idcurso']; ?>">
                <label for="grado">Curso</label>
				<input type="text" name="grado" id="grado"  onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Nombre grado" value="<?php echo $data_curso['grado']; ?>">
				<label for="seccion">Seccion</label>
				<input type="text" name="seccion" id="seccion"  onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Nombre Seccion" value="<?php echo$data_curso['seccion'];?>">
				<label for="grado">Profesor Tutor</label>
                            <?php 
                            $query_profesor = mysqli_query($conection,"SELECT * FROM profesor");
                            $result = mysqli_num_rows($query_profesor);
                            ?>
                            <select name="nombre" id="nombre" class="notItemOne">
							<option value="<?php echo $data_curso['idprofesor']; ?>" selected><?php echo $data_curso['nombre']; ?> <?php echo $data_curso['apellidos']; ?> </option>
                           
                            <?php 
                                if($result > 0){
                                    while ($nombre = mysqli_fetch_array($query_profesor)){
                            ?>
                                <option value="<?php echo $nombre["idprofesor"]; ?>"><?php echo $nombre["nombre"]; ?> <?php echo $nombre["apellidos"]; ?></option>
                            <?php 
                                }  }
                            ?>
                            </select>
                <center><button type="submit" value="Ingresar" class="btn_save"><i class="icon-floppy"></i> Guardar  Curso</button>	</center>
			</form>
			</div>
	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>