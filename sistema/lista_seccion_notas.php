<?php 
	session_start();
if($_SESSION['rol'] !=3 )
	{
		header("location: ./");
	}
    include "../conexion.php";	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>UEML | Lista Inscripcion</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
        <style>
            body{background: url(img/background.jpg);}
            section {
                margin-top:1%;
                margin-right: 2%;
                margin-left: 2%;
            }
            .pad-basic{padding:.5%; }
            .no-btm{	margin-bottom:0%;}
            .btn-der{	text-align: right;} 
        </style>
</head>
<body>
<?php include "includes/header.php";
    $grado=$_POST['grado'];
    $gestion=$_POST['gestion'];
    $materia = (isset($_POST['materia2'])) ? $_POST['materia2'] : 0 ;
    $materias=array();
 ?>
 <section>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

    <!-- <h3> Subiendo Notas de Primero A:</h3>
     <h3> Acesor:Licenciado Jose luis</h3>
     <h3> Gestion:2020</h3>-->
    <form style="background: RGB(192, 192, 192); display: inline-block; width: auto;  margin:0;  padding: 10px 20px 10px 20px;  border: 1px solid #d1d1d1;  margin-bottom:5px;" action="lista_seccion_notas.php" method="POST"  class="form_search_date">
         <label for="materia2">Seleccione Materia</label>
            <select name="materia2" id="materia2">
            <?php 
            $sql=$conection->query(" SELECT * FROM materia ");
            while($fila=$sql->fetch_array()){
                array_push($materias,$fila['idmateria']);
                if ($materia!=0) {
                    if ($materia===$fila['idmateria']) {
                      echo "<option selected value='".$fila['idmateria']."'> ".$fila['materia']."</option>";
                    }else{
                            echo "<option  value='".$fila['idmateria']."'> ".$fila['materia']."</option>";
                         }
                }else{
                      echo "<option  value='".$fila['idmateria']."'> ".$fila['materia']."</option>";
                     }
            }
            ?>
            <input type="hidden" name="grado" value="<?=$grado?>">       
            <input type="hidden" name="gestion" value="<?=$gestion?>">
            <button  tpye="submit" class="btn_view">  <i class="icon-search"> Buscar</i> </button>
    </form>
     
    <form action="registrar_nota.php" method="POST">     
          <div id="div_1" class="contenido">
            <table>
              <thead>
                <tr style="color:white;background: black;">
                  <td>CI</td>
                  <td>Nombres</td>
                  <td>Apellidos</td>
                  <td>Bimestre 1</td>
                  <td>Bimestre 2</td>
                  <td>Bimestre 3</td>
                  <td>Bimestre 4</td>      
                </tr>
              </thead>
              <tbody>
              <?php
             $connect = mysqli_connect("localhost","root", "","matilde");

             if (!$connect) {
               die(mysqli_error());
             }

              $results = mysqli_query($connect,"
                SELECT i.ci,a.idalumno, a.nombre, a.apellidos 
                FROM inscribir i 
                INNER JOIN alumno a ON i.ci=a.ci  
                WHERE i.gestion = '$gestion' AND i.grado= '$grado' 
                ORDER BY i.ci");
                $i=0;
                $numero=0;
              while($row = mysqli_fetch_object($results)) {
                $numero++;
                $i++;
                $ci = $row->ci;
                $boo = 0; 
                $resultsNota = mysqli_query($connect,"
                SELECT n.idnota, n.idalumno,n.idmateria, n.nota1,n.nota2,n.nota3,n.nota4
                FROM notas n 
                INNER JOIN materia m ON m.idmateria=n.idmateria  
                WHERE n.idalumno = '$row->idalumno' AND n.idmateria='$materia'");
              ?>
                <tr>
                      <td><?=$row->ci?></td>
                      <td><?=$row->nombre?></td>
                      <td><?=$row->apellidos?></td>
                     <?php
                      $nota1=0;
                      $nota2=0;
                      $nota3=0;
                      $nota4=0;
                      while($rownota = mysqli_fetch_object($resultsNota)) { 
                        $nota1=$rownota->nota1;
                        $nota2=$rownota->nota2;
                        $nota3=$rownota->nota3;
                        $nota4=$rownota->nota4;

                      }?>
                      <td> 
                        <input type="hidden" name="materia" value="<?=$materia?>">
                        <input type="hidden" name="alumno<?=$i?>" value="<?=$row->idalumno?>">
                        <input type="number" min="0" max="100" name ="nota1<?=$row->idalumno?>" id="nota1" value="<?=$nota1?>">
                      </td>

                      <td><input type="number" min="0" max="100"  name ="nota2<?=$row->idalumno?>" id="nota2" value="<?=$nota2?>"></td>
                      <td><input type="number" min="0" max="100" name ="nota3<?=$row->idalumno?>" id="nota3" value="<?=$nota3?>"></td>
                      <td><input type="number" min="0" max="100" name ="nota4<?=$row->idalumno?>" id="nota4" value="<?=$nota4?>"></td>
                </tr>
              <?php
              }
              ?>
              </tbody>
            </table>
          </div>
    <input type="hidden" name="numero" value="<?=$numero?>">
    <input type="hidden" name="idusuario" value="<?=$idusuario?>">
		<button  type="submit" value="Ingresar" class="btn_save"><i class="icon-floppy"> Guardar</i> </button>	
</form>
		</section>
<?php include "includes/footer.php"; ?>
</body>
</html>