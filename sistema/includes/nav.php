<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu3"></span>Menu</a>
        </div>
<nav>
			<ul>

				<?php if($_SESSION['rol']==2 || $_SESSION['rol']==4){?>
				<li><a href="datos_personales.php"> <span class="icon-profile"></span> Datos Personales </a></li>
				<?php } ?>	

				
				<?php 
				if($_SESSION['rol']==1){
					?>
			<li class="submenu">
					<a href="#"><span class="icon-user"></span> Usuarios </a>
					
					    <ul class="children"><li><a href="registro_usuario.php">Nuevo <span class="icon-user-plus"></span></a></li>
						<li><a href="lista_usuarios.php">Listar<span class="icon-list-numbered"></span></a></li>
					    </ul>
				</li>
				<?php } ?>

				<?php if($_SESSION['rol']==1 || $_SESSION['rol']==3){?>
				<li class="submenu">
					<a href="#"><span class="icon-graduate"></span> Alumnos </a>
					<ul class="children">
					    <li><a href="registro_alumno.php">Nuevo <span class="icon-user-plus"></span></a></li>
						<li><a href="lista_alumno.php">Listar <span class="icon-list-numbered"></span></a></li>
					    </ul>
				</li>
				<?php } ?>

				<li class="submenu">
					<a href="#"><span class="icon-user-check"></span> Profesores </a>
				  		<ul class="children">
						  <?php if($_SESSION['rol']==1 ){?>
						<li><a href="registro_profesor.php">Nuevo <span class="icon-user-plus"></span></a></li>
						<?php } ?>
						<li><a href="lista_profesor.php">Listar <span class="icon-list-numbered"></span></a></li>
						</ul>
				</li>
				<?php if($_SESSION['rol']==1 || $_SESSION['rol']==3){?>
				<li class="submenu">
					<a href="#"><span class="icon-users"></span> Tutores </a>
				  		<ul class="children">
						<li><a href="registro_tutor.php">Nuevo <span class="icon-users"></span></a></li>
						
						<li><a href="lista_tutor.php">Listar <span class="icon-list-numbered"></span></a></li>
						</ul>
				</li>
				<?php } ?>
				
				<?php if($_SESSION['rol']==1 ){
					?>
				<li class="submenu">
					<a href="#"><span class="icon-user-tie"></span> Admin </a>
				  		<ul class="children">
						  
						<li><a href="registro_admin.php">Nuevo <span class="icon-user-plus"></span></a></li>
						<li><a href="lista_admin.php">Listar <span class="icon-list-numbered"></span></a></li>
						</ul>
				</li>
				<?php } ?>
				
			
				<li class="submenu">
					<a href="#"><span class="icon-profile"></span> Materias </a>
				  		<ul class="children">

						<?php if($_SESSION['rol']==1 ){?>
						<li><a href="registro_materia.php">Nuevo <span class="icon-profile"></span></a></li>
						<?php } ?>

						<li><a href="lista_materia.php">Listar <span class="icon-list-numbered"></span></a></li>
						</ul>
				</li>
				
				<li class="submenu">
					<a href="#"><span class="icon-office"></span> Cursos </span></a>
				  		<ul class="children">
						  <?php if($_SESSION['rol']==1 ){?>
						<li><a href="registro_curso.php">Nuevo <span class="icon-office"></span></a></li>
						<?php } ?>
						<li><a href="lista_curso.php">Listar <span class="icon-list-numbered"></span></a></li>
						</ul>
				</li>
			
				<li class="submenu">
					<a href="#"><span class="icon-calendar2"></span> Horarios</span></a>
						<ul class="children">
						<?php if($_SESSION['rol']==1 || $_SESSION['rol']==3){?>
							<li><a href="registro_horario.php">Nuevo <span class="icon-calendar"></span></a></li>
							<?php } ?>
							<li><a href="lista_horario.php">Listar <span class="icon-list-numbered"></span></a></li>
						</ul>
				</li>

			
				<li class="submenu">
					<a href="#"><span class="icon-pencil1"></span> Incripciones</a>
						<ul class="children">
						
							<li><a href="registro_inscripcion.php">Inscribir<span class="icon-pencil1"></span></a></li>
							<?php if($_SESSION['rol']==1){?>	
							 <li><a href="lista_inscripcion.php">Lista General<span class="icon-list-numbered"></span></a></li>
							<?php } ?>
							<li><a href="lista_seccion.php">Listar Cursos<span class="icon-graduate"></span></a></li>
						</ul>
						
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-checkmark1"></span> Notas </a>
						<ul class="children">

						<?php if( $_SESSION['rol']==3){?>
							<li><a href="registro_calificacion.php">Subir Nota<span class="icon-pencil1"></span></a></li>
							<?php } ?>
							<!-- <li><a href="lista_calificaciones.php">Listar Nota<span class="icon-list-numbered"></span></a></li> -->
						    <li><a href="lista_nota_curso.php">Notas por Cursos<span class="icon-graduate"></span></a></li>
						</ul>
				</li>
				<?php if($_SESSION['rol']==1 ){?>
				<li><a href="respaldo.php"> <span class="icon-folder-download"></span> Backup </a></li>
				<?php } ?>


   				<?php if($_SESSION['rol']==1 || $_SESSION['rol']==3){?>
				<li class="submenu">
					<a href="#"><span class="icon-exit"></span></span> Reportes</span></a>
						<ul class="children">
							<li><a href="reporte_grado_seccion.php">Lista Cursos</span></a></li>
							<li><a href="reporte_grado_seccion_notas.php">Listar Notas </span></a></li>
						</ul>
				</li>	
				<?php } ?>	

				
</nav>