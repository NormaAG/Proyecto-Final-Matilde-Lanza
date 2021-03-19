<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UEML | Contactenos</title>
	<link rel="icon" type="/image/ico" href="img/school.png"/> 
	<link rel="stylesheet" href="css/fonts.css">
  	<link rel="stylesheet" href="css/estilo.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<style>

			/* reglas CSS para formulario */
			.form-consulta {
				max-width: 50%; 
				margin:5px 50px 50px 40px ;
				background: #bbb; 
				padding: 25px; 
				font-family: 'Source Sans Pro', sans-serif; 
				}
			.campo-form {
				width:100%; 
				height:30px; 
				margin:2px 0 6px; 
				padding-left:4px; 
				box-sizing: border-box; 
				border-radius:3px; 
				border:0px; 
				font-family: 'Source Sans Pro', sans-serif; 
				font-size:1em; 
				}
			label span {
				color: #f00
				}
			textarea {
				min-height: 60px!important;
				}
			.btn-form {
				display: inline-block; 
				border:0px; 
				background: #000; 
				height: 40px; 
				line-height: 46px; 
				padding: 0 20px; 
				border-radius: 6px; 
				color:#fff; 
				text-decoration: none; 
				text-transform: uppercase; 
				letter-spacing: 1px;
				}
			.btn-form:hover {
				background: #444;
				}

			</style>
</head>
<body>
	<header>
	
		<div class="menu_bar"><a class="bt-menu" href="#"><span class="icon-menu3"></span>Menu</a></div>
		
		<nav>
			<ul>
				<li><a href="logo.php"><span style="font-family:Federant,Monaco,monospace;font-size:14px;font-weight: bold;color:white;padding:0px;">UEmatilde</span><span style="font-family:Federant,Monaco,monospace;font-size:14px;font-weight: bold;color:rgb(94, 192, 124);">.com.bo</span></a></li>
				<li><a href="index.php"><span class="icon-home"></span>Inicio</a></li>
				<li><a href="estudiante.php"><span class="icon-graduate"></span>Estudiante</a></li>
				<li><a href="admin.php"><span class="icon-user"></span>Admin</a></li>
				<li><a href="profesor.php"><span class="icon-user-check"></span>Profesor</a></li>
				<li><a href="familiar.php"><span class="icon-users"></span>Tutor</a></li>				
				<li><a href="contacto.php"><span class="icon-phone4"></span>Contacto</a></li>
				<li><a href="anuncios.php"><span class="icon-chat"></span>Anuncios</a></li>
				<li><a href="salir.php"><span class="icon-switch2"></span>Salir</a></li>
			</ul>
		</nav>
		</header>

		<div id="body">
				
						<div id="derecha">   <!-- derecha--->
							<table style="background-color:white;"><TR> 
									<td style="vertical-align:middle;"><a href="logo.php" ><img  src="img/foto1.png" height="80" style="border:none;" ; title="Logo U. E. Matilde Lanza";></td></a> 
									<td style="vertical-align:middle;width:100%">
										<table >
											<tr><td style="white-space:nowrap;"><span style="font-family:Federant, Monaco, monospace; font-size:18px; font-weight:bold; color:#215F88;">UEmatilde</span><span style="font-family:Federant, Monaco, monospace; font-size:16px; font-weight:bold; color:#A11A1A;">.com.bo</span>&nbsp;&nbsp;</td></tr>
											<tr><td style="white-space:nowrap;"><span class="clsTituloPrincipalDetalle">Sistema De Administración Académica</span></td></tr>
											<tr><td style="white-space:nowrap;"><span class="clsSubtituloPrincipal">Unidad Educativa Matilde Lanza</span></td></tr>
										</table>
									</td>
							</TR></table>    
						</div>
						
						<div id="izquierda"> <!-- izquierda--->
							 <table>
								<TR>
								 <td style="text-align:center;">
								   <table>
								  		  <tr style="background-color:#AAAAAA; ">
												<td style="width:250px; padding:3px; text-align:center;">
														<i class="icon-display" style="color:black; font-size:20px;"></i>
												<td style="width:250px; padding:3px; text-align:center;">
														<i class="icon-clock1" style="color:black; font-size:20px;"></i></td>
												<td style="width:250px; padding:3px; text-align:center;" class="no-print">
														<i class="icon-eye" style="color:black; font-size:20px;"></i></td>
								   		   </tr>
								
											<td style="text-align:center; width:120px; color:black; font-size:12px;">
												<i class="icon-tablet" style="color:#777777; font-size:20px;"></i>
												<i class="icon-mobile2" style="color:#777777; font-size:20px;"></i>
												<i class="icon-mobile" style="color:#777777; font-size:20px;"></i>
												
											</td>

											<td style="text-align:center; width:90px; padding:0px; color:black; font-size:15px;">
												<span id="dd"><?php include "fecha_hora.php";?>	</span>
											</td>
											<td style="width:25px; text-align: center; white-space:nowrap;" class="no-print">
												<i class="icon-chrome" style="color:#777777; font-size:15px;"></i>
												<i class="icon-firefox" style="color:#777777; font-size:15px;"></i>
												<i class="icon-IE" style="color:#777777; font-size:15px;"></i> <br>
												<i class="icon-opera" style="color:#777777; font-size:15px;"></i>
												<i class="icon-edge" style="color:#777777; font-size:15px;"></i>
												<i class="icon-safari" style="color:#777777; font-size:15px;">
											</td>
									</tr></table>
								</td>
							 </TR>
							 </table>
						</div>
				</div>
				
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="menu.js"></script> 
<?php include "include/nav.php";?><br>
						
<!-- formulario de contacto -->
<center><h2 style="color:blue;">Contáctenos</h2>
<form action="envia.php" method="post" class="form-consulta"> 
		<input type="text" name="nombre" placeholder="Nombre Completo" class="campo-form" required>
		<input type="numeric" name="telefono" placeholder="Teléfono" class="campo-form" required>
		<input type="email" name="email" placeholder="Email" class="campo-form" required>
		<textarea name="consulta"  placeholder="Ingrese Mensaje" class="campo-form"></textarea>
		<input type="submit" value="Enviar" class="btn-form">
	</form>	
	</center>
						<?php include "include/footer.php";?>
</body>
</html>