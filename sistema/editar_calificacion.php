<?php 
		session_start(); 
		
			include "../conexion.php";
	
		if(!empty($_POST))
		{
		$alert='';
			if(empty($_POST['ci']) || empty($_POST['idmateria']))
			{
				$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
			}
			else
			{   
                $idnota 			= $_POST['idnota'];
                $ci 			    = $_POST['ci'];
				$idmateria 			= $_POST['idmateria'];
				$bimestre1 			= $_POST['bimestre1'];
				$bimestre2 			= $_POST['bimestre2'];
                $bimestre3 			= $_POST['bimestre3'];
                $bimestre4 			= $_POST['bimestre4'];

				$query = mysqli_query($conection,"SELECT * FROM notas WHERE  bimestre1 ='$bimestre1' and bimestre2 ='$bimestre2' and bimestre3 ='$bimestre3' and bimestre4 ='$bimestre4'  ");
				$result = mysqli_fetch_array($query);
	
				if($result > 1)
				{
					$alert='<p class="msg_error">Cedula de identidad no pude ser modificado..... </p>';
				}
				else{
	
					$query_update= mysqli_query($conection, "UPDATE  notas 
					SET ci = '$ci', idmateria='$idmateria',bimestre1='$bimestre1' ,bimestre2='$bimestre2' ,bimestre3='$bimestre3' ,bimestre4='$bimestre4'
					WHERE idnota= $idnota ");
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
		header('Location: lista_calificaciones.php');
	}else{
	$idnota = $_REQUEST['id'];
	if(!is_numeric($idnota)) {
		header('location: lista_calificaciones.php');
	}
	$query_nota = mysqli_query($conection,"SELECT * FROM notas  WHERE idnota = $idnota");

	$result_nota =mysqli_num_rows($query_nota);
	if($result_nota > 0){
	
	$data_nota=mysqli_fetch_assoc($query_nota);

	//print_r($data_curso);
		}else{
			header('location: lista_calificaciones.php');
		}
	}
	
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Actualizar Notas</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
<div class="title_page">
   <center> <h1 > <i  class="icon-profile"></i> Actualizar calificaciones</h1></center><hr>
 </div>
        <div class="datos_alumno">
                <div class="action_alumno">
                 <!--   <a href="registro_alumno.php" class="btn_new " style="text-decoration:none; "> <i class="icon-user-plus"></i> Crear Nuevo Alumno</a>	--> 		
                
                 <h4 style="font-size: 14pt;">Datos del Alumno</h4>  
                 </div>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                
                <form action="" method="POST" class="datos">
                <input type="hidden" name="idnota" value="<?php echo $data_nota['idnota']; ?>">
                   
                        <div class="wd30" >
                            <label>Cédula  Identidad</label>
                            <input type="numeric" name="ci" id="ci" value="<?php echo $data_nota['ci']?>" >
                        </div>
                    
                      
       
                      
             <div class="datos_inscripcion"> 
                 
                    <div class="datos">
                        <div class="wd40">
                            <label for="idmateria">Materia</label>
                            <?php 
                            $query_materia = mysqli_query($conection,"SELECT * FROM materia");
                            $result_materia = mysqli_num_rows($query_materia);
                            ?>
                            <select name="idmateria" id="idmateria" >
                            <option value="<?php echo $data_nota['idmateria']; ?>" selected><?php echo $data_nota["idmateria"]; ?></option>
                           
                            <?php 
                                if($result_materia > 0){
                                    while ($materia = mysqli_fetch_array($query_materia)){
                            ?>
                                <option value="<?php echo $data_nota["idmateria"]; ?>"> <?php echo $data_nota["idmateria"]; ?></option>
                            <?php 
                                }  }
                            ?>
                            </select>
                        </div>
                        <div class="wd40">
					<label>1er Bimestre</label>
					<input type="number" min="0" max="100" class="form-control" name="bimestre1" value="<?php echo $data_nota['bimestre1']?>"/>
				</div>
				<div class="wd40">
					<label>2do Bimestre</label>
					<input type="number" min="0" max="100" class="form-control" name="bimestre2" value="<?php echo $data_nota['bimestre2']?>"/>
				</div>
				<div class="wd40">
					<label>3er Bimestre</label>
					<input type="number" min="0" max="100" class="form-control" name="bimestre3" value="<?php echo $data_nota['bimestre3']?>"/>
				</div>
				<div class="wd40">
					<label>4to Bimestre</label>
					<input type="number" min="0" max="100" class="form-control" name="bimestre4" value="<?php echo $data_nota['bimestre4']?>"/>
				</div>

                  </div>
                </div>
             <button type="submit" class="btn_save"> <i class="icon-floppy"></i> Actualizar</button>
      
     </div>
     </form>
 </section>
 
<?php include "includes/footer.php"; ?>
</body>
</html>