<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
  
    <title>UEML | Anuncios</title>
	  <link rel="icon" type="/image/ico" href="img/school.png"/> 
    <link rel="stylesheet" href="css/fonts.css">
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap core CSS -->
    <link href="css/starter-template.css" rel="stylesheet"> <!-- Custom styles for this template -->
    
   <style>
   
/* div.demo-content{box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.20);color:#8d9090;} */
#notification-header {
	background: #fff; /*colo blanco cuadro de la campanita*/
    padding: 4px;
    text-align: right;
    /* margin-top: 4px; */
    border-radius: 4px;
    margin-left: 4px;
    margin-right: 20px;
}
button#notification-icon {
	background: transparent;
	border: 0;
	position:relative;
	cursor:pointer;
}
#notification-count{
	position: absolute;
    left: -2px;
    top: -8px;
    font-size: 14px;
    color: #de5050;
    font-weight: bold;
}
#form-header {
	font-size:1.5em;
}
#frmNotification {
	padding:20px 30px;
}
.form-row{
	padding-bottom:10px;
}
#btn-send {
	background: #258bdc;/*color de boton enviar*/
	color: #FFF; /*color del texto boton enviar*/
	padding: 10px 40px;
	border: 0px;
}
div.demo-content input[type='text'],textarea{
	width: 100%;
	padding: 10px 5px;
}
#notification-latest {
	color: #555;/*color del texto de notificaciones*/
  position: absolute;
  right: 0px;
  background: #f5f5f5;/*color del fondo del texto de notificaciones*/
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.20);
  max-width: auto;/*ancho texto de notificaciones que se muestra*/
  text-align: left;
  font-size: 13px;
}
.notification-item {
	padding:5px;
	border-bottom: #ce2078 2px solid;  /*color de linea que separa cada notificacion de otra*/
	cursor:pointer;
}
.notification-subject {		
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.notification-comment {		
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  font-style:italic;
}
footer {
	position: fixed;
    Width: 100%;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 2px 0px 2px 0px;
    background-color:  rgb(73, 74, 77);
    text-align: center;
  }
  footer a {
    color: #fff;
  }

   </style>
  </head>
  
  <body>
  
    <nav class="navbar navbar-expand-md navbar-dark bg-info fixed-top">
        <a href="logo.php" style="text-decoration: none;"><span style="font-family:Federant,Monaco,monospace;font-size:16px;font-weight: bold;color:white;padding:0px;">UEmatilde</span><span style="font-family:Federant,Monaco,monospace; font-size:15px;font-weight: bold;color:rgb(94, 192, 124);">.com.bo</span></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                  <ul class="navbar-nav mr-auto">
                          <li class="nav-item active"><a class="nav-link" href="index.php"><span class="icon-home"></span>  Inicio <span class="sr-only">(current)</span></a> </li>          
                          <li class="nav-item"><a class="nav-link" href="estudiante.php"><span class="icon-graduate"></span>  Estudiante</a></li>
                          <li class="nav-item"><a class="nav-link" href="admin.php"><span class="icon-user"></span> Admin</a></li>
                          <li class="nav-item"><a class="nav-link" href="profesor.php"><span class="icon-user-check"></span> Profesor</a></li>
                          <li class="nav-item"><a class="nav-link" href="familiar.php"><span class="icon-users"></span> Tutor</a></li>
                          <li class="nav-item"><a class="nav-link" href="contacto.php"><span class="icon-phone4"></span> Contacto</a></li>
                          <li class="nav-item"><a class="nav-link" href="anuncios.php"><span class="icon-chat"></span> Anuncios</a></li>
                          <li class="nav-item"><a class="nav-link" href="salir.php"><span class="icon-switch2"></span> Salir</a></li>
                      </ul>
 
                            <?php   include("php/conexion.php");  ?>                        
                        
         
                  <div class="demo-content">
                        <div id="notification-header">
                                <div style="position:relative">
                                      <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="img/icono.png" /></button>
                                <div id="notification-latest"></div>
                        </div>          
                  </div>
             </div>

          <?php 
          if(isset($message)) {
             ?> <div class="error">
             
             <?php echo $message; 
             ?>
             </div> 
             <?php } 
             ?>
          <?php 
          if(isset($success)) { 
            ?> 
            <div class="success">
            <?php echo $success;
            ?></div>
             <?php 
               } 
             ?>


      </div>
    </nav>




    <div class="container">

      <div class="starter-template">
          <h2>Comunicados</h2>

          <p class="lead">

              <form name="frmNotification" id="frmNotification" action="php/agregarnotificacion.php" method="post" >
                <div class="form-group">
                  <label for="autor">Autor del Comunicado</label>
                  <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingresa Nombre Completo de Autor" required>
                </div>
                <div class="form-group">
                  <label for="mensaje">Comunicado</label>
                  <textarea class="form-control" name="mensaje" id="mensaje" rows="3" placeholder="Ingrese su Comunicado" required></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" name="add" id="btn-send" value="Enviar">
                </div>

              </form>            

          </p>

        </div>

    </div><!-- /.container -->

    <?php include "include/footer.php";?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">
      function myFunction() {
        $.ajax({
          url: "php/notificaciones.php",
          type: "POST",
          processData:false,
          success: function(data){
            $("#notification-count").remove();                  
            $("#notification-latest").show();$("#notification-latest").html(data);
          },
          error: function(){}           
        });
      }
                                 
      $(document).ready(function() {
        $('body').click(function(e){
          if ( e.target.id != 'notification-icon'){
            $("#notification-latest").hide();
          }
        });
      });                                     
    </script>

  </body>
</html>
