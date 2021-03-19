
<?php
	include "../conexion.php";
	if(ISSET($_POST['add'])){
		$ci = $_POST['ci'];
		$idmateria = $_POST['idmateria'];
		$bimestre1 = $_POST['bimestre1'];
		$bimestre2 = $_POST['bimestre2'];
		$bimestre3 = $_POST['bimestre3'];
		$bimestre4 = $_POST['bimestre4'];
mysqli_query($conection, "INSERT INTO notas VALUES('','$ci', '$idmateria', '$bimestre1', '$bimestre2', '$bimestre3','$bimestre4') ") OR die(mysqli_error());
header("location: registro_calificacion.php");
	}
?>