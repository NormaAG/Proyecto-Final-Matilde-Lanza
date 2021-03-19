<?php
$alert = '';
session_start();
if(!empty($_SESSION['active'])){
    header('location: sistema/');
}else{
if(!empty($_POST)){
    
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $captcha = $_POST['g-recaptcha-response'];
    
    $secret = '6LfvdNoZAAAAACnK15tD1YXI6FR0GPXxRrg8Iym1';
    
    if(!$captcha){

      $alert='Por favor verifica el Captcha, Nombre Usuario y Contraseña';
      
      } else {
      
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
      
      $arr = json_decode($response, TRUE);
      
      if($arr['success'])
      {
         require_once "conexion.php";
         $user =mysqli_real_escape_string($conection,$_POST['usuario']);
         $clave =mysqli_real_escape_string($conection, $_POST['clave']);

         $query = mysqli_query($conection, "SELECT u.idusuario, u.nombre, u.correo,u.usuario,r.idrol,r.rol 
           FROM usuario u
           INNER JOIN rol r
           ON u.rol=r.idrol
           WHERE u.usuario= '$user' AND u.clave ='$clave'");
         mysqli_close($conection);
         $result = mysqli_num_rows($query);
           if($result > 0){
                $data= mysqli_fetch_array($query);
                $_SESSION['active']=true;
                $_SESSION['idUser']=$data['idusuario'];
                $_SESSION['nombre']=$data['nombre'];
                $_SESSION['correo']=$data['correo'];
                $_SESSION['user']=$data['usuario'];
                $_SESSION['rol']=$data['idrol'];
                $_SESSION['rol_name']=$data['rol'];
                header('location: sistema/');
            }else{
                $alert = 'El Nombre de Usuario o Contraseña es Incorrecta';
                session_destroy();
            }
         } else {
        $alert= '<h3>Error al comprobar Captcha </h3>';
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>U.E. | Matilde Lanza</title>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <link rel="icon" type="image/ico" href="img/school.png"/>
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/estilo.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 
</head>
<body>
<header>
	<div class="menu_bar">
	<a class="bt-menu" href="#"><span class="icon-menu3"></span>Menu</a>
	</div>
		<nav>
			<ul>
        <li><a href="logo.php"><span style="font-family:Federant,Monaco,monospace;font-size:17px;font-weight: bold;color:#C13D47;padding:0px;">UEmatilde</span><span style="font-family:Federant,Monaco,monospace;font-size:16px;font-weight: bold;color:white;">.com.bo</span></a></li>
				<li><a href="index.php"><span class="icon-home"></span>Inicio</a></li>
				<li><a href="estudiante.php"><span class="icon-graduate"></span>Estudiante</a></li>
        <li><a href="admin.php"><span class="icon-user"></span>Admin</a></li>
				<li><a href="profesor.php"><span class="icon-user-check"></span>Profesor</a></li>
				<li><a href="familiar.php"><span class="icon-users"></span>Tutor</a></li>
				<li><a href="contacto.php"><span class="icon-phone4"></span>Contacto</a></li>
        <li><a href="anuncios.php"><span class="icon-chat"></span>Anuncios</a></li>
        <li><a href="javascript:history.back()"><span class="icon-arrow-left"></span>Atras</a></li>
       
			</ul>
		</nav>
	</header>
  <div class="support-grid"></div>
<div class="container"> <br><br><br>
 <center>  <section id="container" style="background:white; width:90%; height:100%; border-radius:0%; border: 0px solid #ccc;">
        <form action="" method="post">
            <h3 class="icon-at-and-t" style="font-size: 15pt;letter-spacing:1px; background: #2980b9;color: #FFF;text-align: center;padding: 10px;"> ESTUDIANTES</h3>
                <h4 style="font-size: 11pt; letter-spacing: 1px;  background: #C1C0BF; padding: 10px;">Bienvenidos al Servicio a Estudiantes de la Unidad Educativa Matilde Lanza</h4>
           
            <img src="img/estudiante.png" alt="login" title="INICIO DE SESION PARA ESTUDIANTES ">
                              
            <input type="text" name="usuario"  placeholder="Ingrese Nombre Usuario: &#129333" autocomplete="off" pattern="[A-Za-z0-9]+" >
            <input type="password" name="clave"  placeholder="Ingrese su Contraseña: &#128272" autocomplete="off" pattern="[A-Za-z0-9]+" > 
            <div class="alert"><?php echo isset($alert) ? $alert :''; ?></div>
            <div class="g-recaptcha" data-sitekey="6LfvdNoZAAAAADrGhJ04syqZArhroYhRi5AQhHcL"></div> <br>
            <button type="submit" value="Ingresar"><i class="icon-enter" style="color:white;font-size:16px;margin-right:10px;"></i> Iniciar Sesión</button>
        </form>  
          
    </section></center> 
	</div>
  <script src="http://code.jquery.com/jquery-latest.js">//submenu complemnto</script>
  <script>//funcion para sub menu reponsive
      $(document).ready(main);
          var contador = 1;
              function main(){
                $('.menu_bar').click(function(){
                    if(contador == 1){
                    $('nav').animate({
                      left: '0'
                    });
                    contador = 0;
                    }else{
                    contador = 1;
                    $('nav').animate({
                    left: '-100%'
                    });
                  }

                });

              }
  </script>
 <?php include "include/footer.php";?>
</body>
</html>
