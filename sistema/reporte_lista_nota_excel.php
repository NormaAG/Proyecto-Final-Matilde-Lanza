<?php
 error_reporting(E_ALL ^ E_NOTICE);
include "../conexion.php";
 $output='';
 $grado=$_POST['grado'];
 $gestion=$_POST['gestion'];
if(isset($_POST['reporte'])) {
 $sql = "SELECT n.idnota,i.grado,i.gestion, n.idalumno,a.ci,a.nombre,a.apellidos, m.idmateria,m.materia, n.nota1,n.nota2,n.nota3,n.nota4 FROM notas n INNER JOIN alumno a ON n.idalumno = a.idalumno INNER JOIN materia m ON n.idmateria = m.idmateria INNER JOIN inscribir i ON a.ci = i.ci WHERE i.grado='$grado' AND i.gestion='$gestion'
      ORDER BY a.apellidos";
 $result= mysqli_query($conection,$sql);
 if(mysqli_num_rows($result) > 0)
 {

    $output .= '
      <table class="table" border="1" text-align: "center">
     <center>  <h1>Lista de alumnos de la U. E. Matilde Lanza</> </center>
       <tr>
                       
            <th>Apellidos </th>
            <th>Nombre </th>
            <th>CI</th>
            <th>Materia</th>
            <th>1er Bimestre</th>
            <th>2do Bimestre</th>
            <th>3er Bimestre</th>
            <th>4to Bimestre</th>
       </tr>

    ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
          <tr>
           
            <td>'.$row["apellidos"].'</td>
            <td>'.$row["nombre"].'</td>
            <td>'.$row["ci"].'</td>
            <td>'.$row["materia"].'</td>
            <td>'.$row["nota1"].'</td>
            <td>'.$row["nota2"].'</td>
            <td>'.$row["nota3"].'</td>
            <td>'.$row["nota4"].'</td>
          </tr>  

        ';

    }
    $output .= '</table>';
    header("Content-Type: application/xls ; charset=utf-8");
    header("Content-Disposition:attachment; filename=notas.xls");
    echo $output;
 }
 }
?>