<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Backups</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>

</head>
<body>
	<?php include "includes/header.php"; ?>
	
		<br>
	<center>	<h1  style="font-size:15pt; color:#486B96;">Para realizar una Copia de Seguridad haga clic en el Icono</h1> <br><br>
		<a href="Backup.php" style="font-size:25pt;text-decoration: none; color:#468DE5;"><span class="icon-folder-download"  ></span></a></center><br><br><br>
	<form action="Restore.php" method="POST" style="font-size:25pt; width: 280pt;">
		<label style="font-size:15pt;color:#486B96;">Restaurar</label><br>
		<select name="restorePoint">
			<option value="" disabled="" selected="">Selecciona punto de restauración</option>
			<?php
				include_once 'Connet.php';
				$ruta=BACKUP_PATH;
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        }
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
		</select>

		<center><button type="submit"  class="btn_save"><i class="icon-loop2"></i> Restaurar</button>	</center>
		
	</form>
	

	<?php include "includes/footer.php"; ?>
</body>
</html>