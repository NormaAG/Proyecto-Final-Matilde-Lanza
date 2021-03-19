<?php
include "../conexion.php";
session_start();
/*Buscar alumno*/

if($_POST['action'] == 'searchAlumno'){
    if(!empty($_POST['alumno'])){
        $ci=$_POST['alumno'];
        $query=mysqli_query($conection, 
        "SELECT ci, nombre, apellidos /*aqi solo nos nuestra de la tabla ci., nombre y apellidos*/
        FROM alumno 
        WHERE ci LIKE '$ci' and estatus=1"); //buscamos al alumno por su ci
        mysqli_close($conection);

        $result=mysqli_num_rows($query);
        $data='';
        if($result > 0 ){ //alumno encontrado con dicho ci.
            $data=mysqli_fetch_assoc($query);
        }else{
            $data=0; // alumnos que no existe en la  basde de datos 
        }
       echo json_encode($data,JSON_UNESCAPED_UNICODE);
        //echo json_encode($data);
    }
    exit;
}


// cambiar contraseña
if($_POST['action'] == 'changePassword')
{
    if(!empty($_POST['passActual']) && !empty($_POST['passNuevo']))
    {
        $password = $_POST['passActual'];
        $newPass = $_POST['passNuevo'];
        $idUser = $_SESSION['idUser'];

        $code = '';
        $msg =  '';
        $arrData =array();

        $query_user=mysqli_query($conection,"SELECT * FROM usuario 
         WHERE clave = '$password' AND idusuario = $idUser ");
        $result = mysqli_num_rows($query_user);
        if($result > 0)
        {
            $query_update= mysqli_query($conection,"UPDATE usuario 
                SET clave='$newPass' WHERE idusuario = $idUser ");
            mysqli_close($conection);
            
            if($query_update)
            {
                $code = '00';
                $msg ="Su contraseña se actualizo exitosamente.";
            }else
            {
                $code='2';
                $msg="No es posible cambiar su contraseña.";
            }
        }else
            {
                $code = '1';
                $msg = "La contraseña actual es incorrecta.";
            }
        $arrData = array('cod' => $code, 'msg' => $msg);
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }else
        {
            echo "error";
        }
    exit;
}

exit;
?>
