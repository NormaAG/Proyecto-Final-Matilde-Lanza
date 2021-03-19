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
            $grado 			= $_POST['grado'];
			$seccion 			= $_POST['seccion'];
			$nombre    = $_POST['nombre'];
			$idusuario          = $_SESSION['idUser'];/*para ver el usuario que lo registro*/
			

			$query = mysqli_query($conection,"SELECT * FROM curso WHERE grado = '$grado' AND seccion ='$seccion' OR nombre ='$nombre'");
			$result = mysqli_fetch_array($query);

            if($result > 0)
            {
				$alert='<p class="msg_error">Grado y Seccion ya existe....o.. Profesor ya fue asignado a un curso.</p>';
            } else{

				$query_insert = mysqli_query($conection,"INSERT INTO curso(grado,seccion,nombre,idusuario)
														             VALUES('$grado','$seccion', '$nombre','$idusuario')");
					if($query_insert)
					{
						$alert='<p class="msg_save">Curso creado correctamente.</p>';
					}
					else{
						$alert='<p class="msg_error">Error al crear la Curso.</p>';
						}
		    	
                 }
              
        }
		
     }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Registro Curso</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
		<h1 style="font-size:20pt;"> <i  class="icon-office"></i> Registro Nuevo Curso</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
                <label for="grado">Curso</label>
				<input type="text" name="grado" id="grado"  onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Nombre Curso">
				
				<label for="seccion">Seccion</label>
				<input type="text" name="seccion" id="seccion"  onblur="aMayusculas(this.value,this.id)" placeholder="Ingrese Nombre Seccion">
				<label for="grado">Profesor Tutor</label>
                            <?php 
                            $query_profesor = mysqli_query($conection,"SELECT * FROM profesor");
                            $result = mysqli_num_rows($query_profesor);
                            ?>
                            <select name="nombre" id="nombre" >
                            <?php 
                                if($result > 0){
                                    while ($nombre = mysqli_fetch_array($query_profesor)){
                            ?>
                                <option value="<?php echo $nombre["idprofesor"]; ?>"><?php echo $nombre["nombre"] ?> <?php echo $nombre["apellidos"] ?></option>
                            <?php 
                                }  }
                            ?>
                            </select>
                <center><button type="submit" value="Ingresar" class="btn_save"><i class="icon-floppy"></i> Guardar Nuevo Curso</button>	</center>
			</form>
			</div>
	</section>
	<script src="js/mayuscula.js"></script>	
	<?php include "includes/footer.php"; ?>
</body>
</html>