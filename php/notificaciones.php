<?php
$conn = new mysqli("localhost","root","","matilde");

$sql = "UPDATE avisos SET estado = 1 WHERE estado = 0";	
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM avisos ORDER BY id ASC limit 50";//solo 50 mensaje muestra en ventana de notificaciones
$result = mysqli_query($conn, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["fecha"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["autor"] . " - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . $row["mensaje"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>