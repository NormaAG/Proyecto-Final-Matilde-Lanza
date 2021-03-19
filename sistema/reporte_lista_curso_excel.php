<?php
 error_reporting(E_ALL ^ E_NOTICE);
include "../conexion.php";
 $output='';
 $grado=$_POST['grado'];
 $gestion=$_POST['gestion'];
if(isset($_POST['reporte'])) {
 $sql = "SELECT i.ci, a.nombre, a.apellidos
			FROM inscribir i
            INNER JOIN alumno a ON i.ci=a.ci
			WHERE  i.gestion = '$gestion' AND i.grado= '$grado'
			ORDER BY i.ci";
 $result= mysqli_query($conection,$sql);
 if(mysqli_num_rows($result) > 0)
 {
    $output .= '
      <table class="table" border="1" text-align= "center">
    <center>  <h1>Lista Alumnos U. E. Matilde Lanza</h1></center>
       <tr>
        <th>Cedula Identidad</th>
        <th>Apellidos</th>
        <th>Nombre</th>
       </tr>

    ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
          <tr>
            <td>'.$row["ci"].'</td>
            <td>'.$row["apellidos"].'</td>
            <td>'.$row["nombre"].'</td>
          </tr>  

        ';

    }
    $output .= '</table>';
    header("Content-Type: application/xls ;  charset=utf-8 ");
    header("Content-Disposition:attachment; filename=Lista_curso.xls");
    echo $output;
 }
 }
?>