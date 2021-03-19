<?php 
	session_start();
	
	include "../conexion.php";

	if(!empty($_POST)) {
	$alert='';
		if(empty($_POST['ci'])) { 
			$alert='<p class="msg_error">Campo Cédula  Identidad es Obligatoria.</p>';
        }else{
        $ci 				= $_POST['ci'];
        $grado 				= $_POST['grado'];
        $jornada 			= $_POST['jornada'];
        $gestion 				= $_POST['gestion'];
        $idusuario          = $_SESSION['idUser'];/*para ver el usuario que lo registro*/
                
        $query = mysqli_query ($conection,"SELECT * FROM inscribir  WHERE ci = '$ci'  AND gestion=$gestion"); /*si nombre y grado son iguales error no puedes inscrbirte en el mismo curso 2 veces*/
        $result = mysqli_fetch_array($query);
           if($result > 0 ){
                    $alert='<p class="msg_error">Error....Estudiante ya se encuentra inscrito.</p>';
                }
                else{
                        $query_insert = mysqli_query($conection,"INSERT INTO inscribir(ci, grado, jornada, gestion, idusuario) VALUES ('$ci','$grado','$jornada','$gestion', '$idusuario')");
                            if($query_insert){
                                $alert='<p class="msg_save">El alumno se inscribio correctamente.</p>';
                            }else{
                                    $alert='<p class="msg_error">Error de inscripcion intentelo nuevamente.</p>';
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
	<title>UEML | Registro Incripcion</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
<div class="title_page">
   <center> <h1 > <i  class="icon-profile"></i> INSCRIBIR ALUMNO</h1></center><hr>
 </div>
        <div class="datos_alumno">
                <div class="action_alumno">
                <h4 style="font-size: 14pt;">Datos del Alumno</h4>  
                 <a href="" class="btn_new btn_new_alumno" style="text-decoration:none; "> <i class="icon-user-plus"></i> Buscar </a>	
                 </div>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                
                <form action="" method="POST" name="form_new_alumno_inscripcion" id="form_new_alumno_inscripcion" class="datos">
                    <input type="hidden" name="action" value="addAlumno">
                    <input type="hidden" id="idalumno" name="idalumno" value="" required>
               
                        <div class="wd30" >
                            <label>Cédula  Identidad</label>
                            <input type="numeric" name="ci" id="ci" required>
                        </div>

                        <div class="wd30">
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="nombre" disabled required>
                        </div>

                        <div class="wd30">
                            <label>Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" disabled required>
                        </div>
                    
                        <div id="div_registro_alumno" class="wd100">
                      <center><p>Estudiante no registrado en la "Unidad Educativa Matilde Lanza"</p></center> 
                     </div>
       
                      
             <div class="datos_inscripcion"> 
                 
                    <div class="datos">
                        <div class="wd40">
                            <label for="grado">Curso y Asesor</label>
                            <?php 
                            $query_curso = mysqli_query($conection,"SELECT c.idcurso,c.grado,c.seccion, p.nombre,p.apellidos FROM curso c INNER JOIN profesor p  ON c.nombre=p.idprofesor");
                            $result_curso = mysqli_num_rows($query_curso);
                            ?>
                            <select name="grado" id="grado" >
                            <?php 
                                if($result_curso > 0){
                                    while ($grado = mysqli_fetch_array($query_curso)){
                            ?>
                                <option value="<?php echo $grado["idcurso"]; ?>"><?php echo $grado["grado"] ?> "<?php echo $grado["seccion"] ?>", <?php echo $grado["nombre"] ?> <?php echo $grado["apellidos"] ?> </option>
                            <?php 
                                }  }
                            ?>
                            </select>
                        </div>
                         
                        
                        <div class="wd40">
                            
                            <label for="gestion">Gestión</label>
                            <select name="gestion" id="gestion">
                            <?php 
                                $sql=$conection->query(" SELECT * FROM gestion ");
                                while($fila=$sql->fetch_array()){
                                echo "<option value='".$fila['gestion']."'> ".$fila['gestion']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="wd40">
                            
                            <label for="jornada">Turno</label>
                            <select name="jornada" id="jornada">
                            <?php 
                            $sql=$conection->query(" SELECT * FROM jornada ");
                            while($fila=$sql->fetch_array()){
                            echo "<option value='".$fila['jornada']."'> ".$fila['jornada']."</option>";
                            }
                            ?>
                            </select>
                        </div>

                  </div>
                </div>
             <button type="submit" class="btn_save"> <i class="icon-floppy"></i> Guardar</button>
      
     </div>
     </form>
 </section>
 
<?php include "includes/footer.php"; ?>
</body>
</html>