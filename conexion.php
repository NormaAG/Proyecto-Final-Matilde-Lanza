<?php
$host = 'localhost';
$user = 'root';
$password ='';
$bd ='matilde';

$conection = @mysqli_connect($host, $user, $password, $bd);
    
    if(!$conection){
    echo "error de conexion";
}
        //else{
        //  echo "conexion exitosa";
        //}
?>
