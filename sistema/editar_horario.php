<?php 
	
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}

	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['hora']) || empty($_POST['lunes']) || empty($_POST['martes'])  || empty($_POST['miercoles'])|| empty($_POST['jueves']) || empty($_POST['viernes']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
        }else
        {

			$idHorario = $_POST['id'];
            $hora = $_POST['hora'];
            $lunes  = $_POST['lunes'];
            $martes   = $_POST['martes'];
            $miercoles  = $_POST['miercoles'];
            $jueves   = $_POST['jueves'];
            $viernes  = $_POST['viernes'];
            $idcurso  = $_POST['idcurso'];

            $result =0;
            $query = mysqli_query($conection,"SELECT * FROM horario WHERE hora = '$hora' AND idcurso = '$idcurso' ");
			$result = mysqli_fetch_array($query);
            if($result > 0)
            {
				$alert='<p class="msg_error">El hora y curso ya  existe.</p>';
            }
                else{
                    
                    $sql_update = mysqli_query($conection,"UPDATE horario
                    SET hora = '$hora', lunes='$lunes', martes='$martes', miercoles='$miercoles', jueves='$jueves', viernes='$viernes', idcurso='$idcurso'
                    WHERE idhorario= $idHorario ");
                   
                if($sql_update)
                {
					$alert='<p class="msg_save">Horario actualizado correctamente.</p>';
                }
                else
                {
					$alert='<p class="msg_error">Error al actualizar el horario.</p>';
				}

			}

        }
		}
	

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_horario.php');
		mysqli_close($conection);
	}
	$idHorario = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM horario 
                    WHERE idhorario= $idHorario and estatus = 1");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_horario.php');
	}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$idHorario  = $data['idhorario'];
            $hora  = $data['hora'];
            $lunes  = $data['lunes'];
            $martes = $data['martes'];
            $miercoles  = $data['miercoles'];
            $jueves = $data['jueves'];
            $viernes  = $data['viernes'];
            $idcurso  = $data['idcurso'];

		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Alctualizar Horario</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br>
		<div class="form_register">
			<h1 class="icon-user" style="font-size=:16pt;"> Actualizar Horario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $idHorario; ?>">
                <label for="hora"> Hora</label>
                            <?php 
                                include "../conexion.php";
                                $query_rol = mysqli_query($conection,"SELECT * FROM hora");
                                mysqli_close($conection);
                                $result_rol = mysqli_num_rows($query_rol);

                            ?>

                            <select name="hora" id="hora" class="notItemOne">
                                <?php
                                    echo $option; 
                                    if($result_rol > 0)
                                    {
                                      while ($rol = mysqli_fetch_array($query_rol))
                                       {
                                ?>
                                        <option value="<?php echo $rol["hora"]; ?>"><?php echo $rol["hora"] ?></option>
                                        <?php 
                                        }
                                      }
                                    ?>
                                </select>
                </select><label for="lunes">Lunes</label>
                <input type="text" name="lunes" id="lunes"  placeholder="Usuario" value="<?php echo $lunes; ?>">
                <label for="martes">martes</label>
                <input type="text" name="martes" id="martes"  placeholder="Usuario" value="<?php echo $martes; ?>">
                <label for="miercoles">miercoles</label>
                <input type="text" name="miercoles" id="miercoles"  placeholder="Usuario" value="<?php echo $miercoles; ?>">
                <label for="jueves">jueves</label>
                <input type="text" name="jueves" id="jueves"  placeholder="Usuario" value="<?php echo $jueves; ?>">
                <label for="viernes">viernes</label>
                <input type="text" name="viernes" id="viernes"  placeholder="Usuario" value="<?php echo $viernes; ?>">
                <label for="idcurso"> Curso</label>

				<?php 
					include "../conexion.php";
					$query_rol = mysqli_query($conection,"SELECT * FROM curso");
					mysqli_close($conection);
					$result_rol = mysqli_num_rows($query_rol);

				 ?>

				<select name="idcurso" id="idcurso" class="notItemOne">
					<?php
						echo $option; 
						if($result_rol > 0)
						{
							while ($rol = mysqli_fetch_array($query_rol)) {
					?>
							<option value="<?php echo $rol["idcurso"]; ?>"> <?php echo $rol["grado"] ?> <?php echo $rol["seccion"] ?></option>
                            
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
				
				<button type="submit" value="Actualizar" class="btn_save"><i class="icon-refresh"></i> Actualizar Horario</button></center>
			</form>


		</div>


	</section>
	<br>
	<?php include "includes/footer.php"; ?>
</body>
</html>