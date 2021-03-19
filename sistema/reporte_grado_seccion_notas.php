<?php 
	session_start();

    include "../conexion.php";	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Lista Inscripcion</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
<style>
#form {
    border:3px solid ##CD5C5C;
    width:450px;
    margin:auto;
    padding:10px;
    background:#e5e7e9 ;
}
label{
    color:blue;
    font-size:18px;
}
input{ background-color: #30A0E0;
  border: none;
  color: white;
  padding: 8px 10px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  width: 30%;
}
</style>
</head>
<body>
	<?php include "includes/header.php"; ?>
<form  method="post"  class="form"   action="reporte_lista_nota_excel.php">
		<center>	
        <fieldset id="form">			
            <h2>Listar Notas por Cursos</h2>
                <div class="">
                   
                        <div class="wd40">
                            <label for="grado">Seleccionar Sección</label>
                            <select name="grado" id="grado">
                            <?php 
                                $sql=$conection->query(" SELECT * FROM curso ");
                                while($fila=$sql->fetch_array()){
                                echo "<option value='".$fila['idcurso']."'> ".$fila['grado']." ".$fila['seccion']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        
                         <div class="wd40">
                            <label for="gestion">Seleccione Gestión</label>
                            <select name="gestion" id="gestion">
                            <?php 
                                $sql=$conection->query(" SELECT * FROM gestion ");
                                while($fila=$sql->fetch_array()){
                                echo "<option value='".$fila['gestion']."'> ".$fila['gestion']."</option>";
                                }
                            ?>
                            </select>
                        </div>
						<br>
	                     <a><input type="submit" name="reporte" value="Reporte Excel"></a>
                </div>
        </fieldset>
        </center> 
</form>
<?php include "includes/footer.php"; ?>
</body>
</html>
