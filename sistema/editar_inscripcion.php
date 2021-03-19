<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{		
        header("location: ./");  	
	}
	include "../conexion.php";

	if(!empty($_POST)) {
	$alert='';
		if( empty($_POST['ci'])) { 
			$alert='<p class="msg_error">Campo Cédula  Identidad, Nombre y Apellidos son Obligatoria.</p>';
        }else{
        $idinscripcion      =$_POST['id'];    
        $ci 				= $_POST['ci'];
        $grado 				= $_POST['grado'];
        $jornada 			= $_POST['jornada'];
        $gestion 				= $_POST['gestion'];
        $idusuario          = $_SESSION['idUser'];/*para ver el usuario que lo registro*/
          
        $result =0;
        
        $query= mysqli_query ($conection,"SELECT * FROM inscribir 
            WHERE ci = '$ci'  AND gestion != $gestion"); /*si ci y idiincripcion son iguales error no puedes inscrbirte en el mismo curso 2 veces*/
        
        $result = mysqli_fetch_array($query);
           if($result > 0 ){
                    $alert='<p class="msg_error">Error....Estudiante ya se encuentra inscrito.</p>';
                }else{
                    $query_update= mysqli_query ($conection,"UPDATE inscribir
                    SET ci = $ci, grado = $grado, jornada = '$jornada', gestion = $gestion 
                         WHERE idinscripcion=$idinscripcion");
                      
                      if($query_update){
                                $alert='<p class="msg_save">El alumno se Actualiazo correctamente.</p>';
                            }else{
                                    $alert='<p class="msg_error">Cedula de Identidad y gestion no se deben modificar.</p>';
                                }
                    }
        }/*mysqli_close($conection);  ulitima  modificacion comentar linea*/
     }
    // validar inscripcion
    if(empty($_REQUEST['id'])){
        header("location:lista_inscripcion.php");
    }else{
        $idinscripcion = $_REQUEST['id'];
        if(!is_numeric($idinscripcion)){
            header("location:lista_inscripcion.php");
        }
        
        $query_inscrito = mysqli_query($conection,"SELECT i.idinscripcion, i.ci,c.idcurso, c.grado,c.seccion, p.nombre, p.apellidos, i.jornada, i.gestion, i.fecha_inscrib
			FROM inscribir i
			INNER JOIN curso c ON i.grado = c.idcurso
            INNER JOIN profesor p  ON c.nombre=p.idprofesor
			WHERE  i.idinscripcion = $idinscripcion AND i.estatus = 1 ");

        
        $result_inscrito = mysqli_num_rows($query_inscrito);
        if($result_inscrito > 0){
            $data_inscrito=mysqli_fetch_assoc($query_inscrito);
         //   print_r($data_inscrito);
        }else{
            header("location:lista_inscripcion.php");
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Actualizar Incripcion</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
<div class="title_page">
   <center> <h1 > <i  class="icon-profile"></i> Actualizar datos de Alumno</h1></center><hr>
 </div>
        <div class="datos_alumno">
                <div class="action_alumno">
                 <!--   <a href="registro_alumno.php" class="btn_new " style="text-decoration:none; "> <i class="icon-user-plus"></i> Crear Nuevo Alumno</a>	--> 		
                
                 <h4 style="font-size: 14pt;">Datos del Alumno</h4>  
                 </div>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                
                <form action="" method="POST" name="form_new_alumno_inscripcion" id="form_new_alumno_inscripcion" class="datos">
                <input type="hidden" name="id" value="<?php echo $data_inscrito['idinscripcion']; ?>">
                    <input type="hidden" name="action" value="addAlumno">
                    <input type="hidden" id="idalumno" name="idalumno" value="" required>
               
                        <div class="wd30" >
                            <label>Cédula  Identidad</label>
                            <input type="numeric" name="ci" id="ci" value="<?php echo $data_inscrito['ci']?>" >
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
                            <option value="<?php echo $data_inscrito['idcurso']; ?>" selected><?php echo $data_inscrito['grado']; ?> "<?php echo  $data_inscrito["seccion"]; ?>", <?php echo  $data_inscrito["nombre"]; ?> <?php echo  $data_inscrito["apellidos"]; ?> </option>
                           
                            <?php 
                                if($result_curso > 0){
                                    while ($grado = mysqli_fetch_array($query_curso)){
                            ?>
                                <option value="<?php echo $grado["idcurso"]; ?>"> <?php echo $grado["grado"]; ?> "<?php echo $grado["seccion"]; ?>", <?php echo $grado["nombre"]; ?> <?php echo $grado["apellidos"]; ?> </option>
                            <?php 
                                }  }
                            ?>
                            </select>
                        </div>
                        
                        <div class="wd40">
                            </select>
                            <label for="gestion">Gestión</label>
                            <select name="gestion" id="gestion" class="notItemOne">
                            <option value="<?php echo $data_inscrito['gestion']; ?>" selected><?php echo $data_inscrito['gestion']; ?></option>
                           
                            <?php 
                            $sql=$conection->query(" select * from gestion ");
                            while($fila=$sql->fetch_array()){
                            echo "<option value='".$fila['gestion']."'> ".$fila['gestion']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="wd40">
                            </select>
                            <label for="jornada">Turno</label>
                            <select name="jornada" id="jornada" class="notItemOne">
                            <option value="<?php echo $data_inscrito['jornada']; ?>" selected><?php echo $data_inscrito['jornada']; ?></option>
                            <?php 
                            $sql=$conection->query(" select * from jornada ");
                            while($fila=$sql->fetch_array()){
                            echo "<option value='".$fila['jornada']."'> ".$fila['jornada']."</option>";
                            }
                            ?>
                            </select>
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