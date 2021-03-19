<?php
if($_SESSION['rol'] !=3 )
	{
		header("location: ./");
	}
	include "../conexion.php";
	//print_r($_POST);
$materia=$_POST['materia'];
$numero=$_POST['numero'];
for ($i=1; $i <=$numero ; $i++) {
	$alumno=$_POST["alumno".$i];
	$nota1=$_POST['nota1'.$alumno];
	$nota2=$_POST['nota2'.$alumno];
	$nota3=$_POST['nota3'.$alumno];
	$nota4=$_POST['nota4'.$alumno];
	$query= mysqli_query($conection,"SELECT idnota, idalumno, idmateria, nota1, nota2, nota3, nota4 FROM notas WHERE idalumno=$alumno AND idmateria=$materia ");
	$result = mysqli_num_rows($query);
			if($result > 0){
				while ($data = mysqli_fetch_array($query)) {	
				$idnota=$data['idnota'];			
				$query_insert = mysqli_query($conection,"UPDATE notas SET  nota1='$nota1', nota2 ='$nota2', nota3 ='$nota3', nota4 ='$nota4'
					WHERE idnota ='$idnota' AND idalumno = '$alumno' AND idmateria ='$materia'");
				    break;
					}
				if($query_insert)		
					$alert='<p class="msg_save">Notas registrado correctamente.</p>';		
				else
					$alert='<p class="msg_error">Error al registrar las Notas.</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO notas( idalumno, idmateria, nota1, nota2, nota3, nota4) VALUES ( $alumno, $materia, $nota1, $nota2, $nota3, $nota4)");
				if($query_insert)		
					$alert='<p class="msg_save">Notas registrado correctamente.</p>';		
				else
					$alert='<p class="msg_error">Error al registrar las Notas.</p>';
			}
}
header("Location: registro_calificacion.php");
