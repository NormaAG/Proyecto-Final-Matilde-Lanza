<?php
require_once 'config.php';// conexion de la base de datos
$conexion = Conexion::singleton_conexion();
if (isset($_POST['process'])) {
#---------------------------------------------// Var Process
$process = $_POST['process'];
if ($process == 1) {
#----------------------------------------------// Dias
$dias = explode(',', $_POST['days']);// Contar dias
$countdays = count($dias);
$name = strip_tags($_POST['nombre']);
// Acomodar Dias
echo'
<h1 class="horario-name"><i class="fa fa-calendar" aria-hidden="true"></i> '.$name.'</h1>
<table id="thetable" class="table table-bordered">
<thead class="thead">
<th class="horarioheader"><i class="fa fa-clock-o"></i> Horario</th>
';
for ($i=0; $i < $countdays; $i++) { 
 if ($dias[$i] == 1) {
 	echo '<th><i class="fa fa-angle-right"></i> Lunes</th>';
 }elseif ($dias[$i] == 2){
 	echo '<th><i class="fa fa-angle-right"></i> Martes</th>';
 }elseif ($dias[$i] == 3){
 	echo '<th><i class="fa fa-angle-right"></i> Miercoles</th>';
 }elseif ($dias[$i] == 4){
 	echo '<th><i class="fa fa-angle-right"></i> Jueves</th>';
 }elseif ($dias[$i] == 5){
 	echo '<th><i class="fa fa-angle-right"></i> Viernes</th>';
 }elseif ($dias[$i] == 6){
 	echo '<th><i class="fa fa-angle-right"></i> Sabado</th>';
 }elseif ($dias[$i] == 7){
 	echo '<th><i class="fa fa-angle-right"></i> Domingo</th>';
 }
}
echo '
</thead>
<tbody>';

///////////////////////////////////////////////////////
// Hora Inicio 24 Horas
$inicio24 = date('G:i', strtotime($_POST['tiempo1']));

// Hora Final 24 Horas
$final24 = date('G:i', strtotime($_POST['tiempo2']));
///////////////////////////////////////////////////////
function resum($in,$fin,$minutos,$columnas){
$time = new DateTime($in);
$time->add(new DateInterval('PT' . $minutos . 'M'));
$stamp = $time->format('h:i a');
$format24 = $time ->format('G:i');

$uniq = str_replace(' ', '', str_replace(':', '', $stamp));
$reverse = strrev($uniq);



echo '<tr id="tr'.sha1($in).'">

<td class="td-time">

<div id="parent'.sha1($in).'" class="timeblock">
<strong id="data'.sha1($in).'">'.date('h:i a', strtotime($in)). ' - ' .$stamp.'</strong>
<button data-time="'.sha1($in).'" class="changethetime btn btn-primary btn-xs pull-right"><i class="fa fa-pencil"></i></button>
</div>

<div id="edit'.sha1($in).'" class="hideedittime text-center">
  <input id="input'.sha1($in).'" type="text" class="form-control" value="'.date('h:i a', strtotime($in)). ' - ' .$stamp.'"><p></p><button data-save="'.sha1($in).'" class="savetime btn btn-block btn-xs btn-primary"><i class="fa fa-floppy-o"></i> Guardar</buttton><button data-block="'.sha1($in).'" class="deleteblock btn btn-block btn-xs btn-warning"><i class="fa fa-ban"></i> Eliminar </button><button class="canceledit btn btn-block btn-xs btn-danger"><i class="fa fa-times"></i> Cancelar</buttton>
</div>

</td>';

for ($i=1; $i < $columnas; $i++) { 
	echo'
       <td class="td-line">
         <div id="'.$reverse.$i.'" class="col-sm-12 nopadding"></div>
         <div class="col-sm-12 text-center">
            <button id="edit-'.$reverse.$i.'" data-row="'.$reverse.$i.'" class="addinfo btn btn-xs btn-primary"><i class="fa fa-plus"></i></button>
         </div>
      </td>
	';
}

echo '</tr>';

sumtime($format24,$fin,$minutos,$columnas);
}


function sumtime($in,$fin,$minutos,$columnas){
$parse1 = new DateTime($in);
$parse2 = new DateTime($fin);   
if ($parse2 <= $parse1){
  return;
}else{
$time = new DateTime($in);
$time->add(new DateInterval('PT' . $minutos . 'M'));
$stamp = $time->format('h:i a');
$format24 = $time ->format('G:i');
$uniq = str_replace(' ', '', str_replace(':', '', $stamp));
$reverse = strrev($uniq);

echo '<tr id="tr'.sha1($in).'">

<td class="td-time">

<div id="parent'.sha1($in).'" class="timeblock">
<strong id="data'.sha1($in).'">'.date('h:i a', strtotime($in)). ' - ' .$stamp.'</strong>
<button data-time="'.sha1($in).'" class="changethetime btn btn-primary btn-xs pull-right"><i class="fa fa-pencil"></i></button>
</div>

<div id="edit'.sha1($in).'" class="hideedittime text-center">
  <input id="input'.sha1($in).'" type="text" class="form-control" value="'.date('h:i a', strtotime($in)). ' - ' .$stamp.'"><p></p><button data-save="'.sha1($in).'" class="savetime btn btn-block btn-xs btn-primary"><i class="fa fa-floppy-o"></i> Guardar</buttton><button data-block="'.sha1($in).'" class="deleteblock btn btn-block btn-xs btn-warning"><i class="fa fa-ban"></i> Eliminar </button><button class="canceledit btn btn-block btn-xs btn-danger"><i class="fa fa-times"></i> Cancelar</buttton>
</div>

</td>';
for ($i=1; $i < $columnas; $i++) { 
	echo'
       <td class="td-line">
         <div  id="'.$reverse.$i.'" class="col-sm-12 nopadding"></div>
         <div class="col-sm-12 text-center">
            <button id="edit-'.$reverse.$i.'" data-row="'.$reverse.$i.'" class="addinfo btn btn-xs btn-primary"><i class="fa fa-plus"></i></button>      
         </div>
      </td>
	';
}
echo'</tr>';
    resum($format24,$fin,$minutos,$columnas);
  }          
}
///////////////////////////////////////////////////////
sumtime($inicio24,$final24,$_POST['minutos'],$countdays);
///////////////////////////////////////////////////////
echo '</tbody></table>

<input type="hidden" id="descripcioninput" value="'.$_POST['descripcion'].'">
<input type="hidden" id="nombreinput" value="'.$_POST['nombre'].'">

<button class="guardarhorario btn btn-lg btn-warning pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>

';


#--------------------------------------------------------------------------------------------------
}elseif ($process == 2) {
#--------------------------------------------------------------------------------------------------

if(empty($_POST['nombre']) || empty($_POST['horario']) || empty($_POST['descripcion'])){
  exit();
}
if(ctype_space($_POST['nombre']) || ctype_space($_POST['horario']) || ctype_space($_POST['descripcion'])){
  exit();
}

$fecha = date('Y-m-d');
$data = $_POST['horario'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$SQL = 'INSERT INTO horarios (nombre, descripcion, horario, fecha) VALUES (:nombre, :descripcion, :horario, :fecha);';
$sentence = $conexion -> prepare($SQL);
$sentence -> bindParam(':nombre',$nombre,PDO::PARAM_STR);
$sentence -> bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
$sentence -> bindParam(':horario',$data,PDO::PARAM_STR);
$sentence -> bindParam(':fecha',$fecha,PDO::PARAM_STR);
$sentence -> execute();


#--------------------------------------------------------------------------------------------------
}elseif ($process == 3) {


$SQL = 'SELECT * FROM horarios WHERE id = :id LIMIT 1';
$sentence = $conexion -> prepare($SQL);
$sentence -> bindParam(':id',$_POST['data'],PDO::PARAM_INT);
$sentence -> execute();
$resultados = $sentence -> fetchAll();
if (empty($resultados)){
}else{
   foreach ($resultados as $key){
   echo'
<div class="modal fade" id="ViewHorario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div id="modalblue" class="modal-body">
       
      <div id="edithorariotabledata">
        '.$key['horario'].'
        </div>
        <input type="hidden" id="inputidedit" value="'.$key['id'].'" >
      </div>

    </div>
  </div>
</div>
   ';
   }
}


}
#--------------------------------------------------------------------------------------------------
elseif ($process == 4) {


if(empty($_POST['nombre']) || empty($_POST['horario']) || empty($_POST['descripcion']) || empty($_POST['id'])){
  exit();
}
if(ctype_space($_POST['nombre']) || ctype_space($_POST['horario']) || ctype_space($_POST['descripcion']) || ctype_space($_POST['id'])){
  exit();
}

$data = $_POST['horario'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$iddata = $_POST['id'];

$SQL = 'UPDATE horarios SET nombre =:nombre, descripcion = :descripcion, horario = :horario WHERE id = :id';
$sentence = $conexion -> prepare($SQL);
$sentence -> bindParam(':nombre', $nombre ,PDO::PARAM_STR);
$sentence -> bindParam(':descripcion', $descripcion ,PDO::PARAM_STR);
$sentence -> bindParam(':horario', $data ,PDO::PARAM_STR);
$sentence -> bindParam(':id', $iddata ,PDO::PARAM_INT);
$sentence -> execute();


}
#--------------------------------------------------------------------------------------------------
elseif ($process == 5){


if(empty($_POST['dataid'])){
  exit();
}
if(ctype_space($_POST['dataid'])){
  exit();
}

$SQL = 'DELETE FROM horarios WHERE id = :id';
$sentence = $conexion -> prepare($SQL);
$sentence -> bindParam(':id',$_POST['dataid'], PDO::PARAM_INT);
$sentence -> execute();


}
#--------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------
}








