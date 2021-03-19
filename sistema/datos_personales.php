<?php 
	session_start();
	
	include "../conexion.php";	

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>UEML | Datos Personales</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
    <style type="text/css">
    	
.titlePanelControl{
	width: 100%;
	background: #3B7FA5  ;
	padding: 5px 15px;
	margin-bottom: 20px;
	margin-top: 20px;
	font-size: 18pt !important;
	color:#E0E0E0; 
}
.containerPerfil{
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: space-around;
	align-items: flex-start;
	flex-wrap: wrap;
}
.containerDataUser, .containerDataEmpresa{
	width: 600px;
	background-color: #E0E0E0;
	padding: 20px; 
}
.logoUser, .logoEmpresa{
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: center;
	align-items: center;
	width: 200px; 
	height: 200px;
	border-radius: 100%;
	margin: 10px auto;
	padding: 5px;
	background: #E9E9E9;
}
.logoUser img, .logoEmpresa img{
	width: 100%;
	height: 100%;
}

.divDataUser{
	padding: 20px;
	margin: auto;
}
.divInfoSistema h4{
	background: #3279a7;
	padding: 5px 10px;
	color:#FFF;
	border-radius: 3px;
	text-align: center;
	margin-bottom: 10px; 
}

.divDataUser input{
	
	padding: 5px;
}
.divDataUser div{
	
	padding: 5px;
}

.divDataUser > div{
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
}
.divDataUser label{
	width: 150px;
	margin: 0;
	
}
.alertChangePass{
	text-align: center;
	font-weight: bold;
}
</style>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container"><br>
		<div class="divInfoSistema">
			<div class="containerPerfil">
				<div class="containerDataUser">		
						<div class="logoUser"> 
					    <img src="img/estudiante.png">
				    </div>
				    <div class="divDataUser">
				     		<h4> Información Personal del Usuario</h4>
				     		<div>
				     			<label>Nombre</label><span><?= $_SESSION['nombre'];?></span>
				     		</div>
				     		<div>
				     			<label>Correo</label><span><?= $_SESSION['correo'];?></span>
				     		</div>
				     		<div>
				     			<label>Usuario</label><span><?= $_SESSION['rol_name'];?></span>
				    	    </div>
				     		<div>
				     			<label>Usuario</label><span><?= $_SESSION['user'];?></span>
				    	    </div>

				     		<form action ="" method="POST" name="frmChangePass" id="frmChangePass">
				     			<h4> Cambiar Contraseña</h4>
				     			<div>
				     				<input type="password" name="txtPassUser" id="txtPassUser" placeholder="Contraseña Actual" required>
				     			</div>
				     		    <div>
				     		    	<input class="newPass" type="password" name="txtNewPassUser" id="txtNewPassUser" placeholder="Nueva Contraseña" required>
				     		    </div>
				     		    <div>
				     		    	<input class="newPass" type="password" name="txtPassConfirm" id="txtPassConfirm" placeholder="Confirmar Contraseña" required>
				     		    </div>
				     		    <div class="alertChangePass" style="display:none;"></div>
				     		    <div>
				      				<button style="width: 100%;" type="submit" class="btn_save btnChangePass"><i class="icon-key"></i> Cambiar Contraseña </button>
				     		    </div>
				     		</form>
		   			</div>
		         </div>
				

				<div class="containerDataEmpresa">
						<div class="logoEmpresa"> 
							<img src="../img/familiar.png">
						</div>
						
					
						
							<form action="" name="frmEmpresa" id="frmEmpresa">
								<div class="divDataUser">
								<h4> Información Personal del Estudiante</h4>
						     		
						     		
						     			 <?php 
											$sql = "SELECT *
											FROM usuario u
											JOIN alumno a ON a.correo=u.correo
											JOIN tutores t ON t.idtutor=a.idalumno
											WHERE  u.correo='darling@gmail.com'";
											$result=mysqli_query($conection,$sql);
											while($mostrar=mysqli_fetch_array($result)){
							            ?>
						     			
								     		<div>
								     			<label>CI</label><span><?php echo $mostrar['ci'] ?></span>
								     		</div>
								     		<div>
								     			<label>Nombre</label><span><?php echo $mostrar['nombre'] ?></span>
								     		</div>
								     		<div>
								     			<label>Apellidos</label><span><?php echo $mostrar['apellidos'] ?></span>
								     		</div>
								     		<div>
								     			<label>Dirección</label><span><?php echo $mostrar['direccion'] ?></span>
								     		</div>
								     		<div>
								     			<label>Fecha Nac.</label><span><?php echo $mostrar['fecha_nac'] ?></span>
								     		</div>
								     		<div>
								     			<label>Correo</label><span><?php echo $mostrar['correo'] ?></span>
								     		</div>
								     		<div>
								     			<label>Teléfono</label><span><?php echo $mostrar['telefono'] ?></span>
								     		</div>
								     		<h4> Información Personal de Tutores</h4>
								     		<div>
								     			<label>CI Padre</label><span><?php echo $mostrar['ci_padre'] ?></span>
								     		</div>
								     		<div>
								     			<label>Nombre Padre</label><span><?php echo $mostrar['nombre_padre'] ?></span>
								     		</div>
								     		<div>
								     			<label>Fecha Nac.</label><span><?php echo $mostrar['fecha_nac_padre'] ?></span>
								     		</div>
								     		<div>
								     			<label>Ocupacion Padre</label><span><?php echo $mostrar['ocupacion_padre'] ?></span>
								     		</div>
								     		
						     				<div>
								     			<label>CI Madre</label><span><?php echo $mostrar['ci_madre'] ?></span>
								     		</div>
								     		<div>
								     			<label>Nombre Madre</label><span><?php echo $mostrar['nombre_madre'] ?></span>
								     		</div>
								     		<div>
								     			<label>Fecha Nac.</label><span><?php echo $mostrar['fecha_nac_madre'] ?></span>
								     		</div>
								     		<div>
								     			<label>Ocupacion Madre</label><span><?php echo $mostrar['ocupacion_madre'] ?></span>
								     		</div>
								     		<div>
								     			<label>Direccion</label><span><?php echo $mostrar['direccion'] ?></span>
								     		</div>
						     			<?php 
						     		     }
						     			?>
						     		
						    	    </div>
						    	 
							</form>

				</div>
		</div>
  </div>					    
</section>
<?php include "includes/footer.php"; ?>
</body>
</html>

