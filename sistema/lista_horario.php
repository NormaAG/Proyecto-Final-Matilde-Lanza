<?php
session_start();
if($_SESSION['rol'] != 1 AND $_SESSION['rol'] != 2 && $_SESSION['rol'] != 3 AND $_SESSION['rol'] != 4)
	{
		header("location: ./");
	}
include "../conexion.php";	
include 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
		<title>UEML | Lista Horario</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="css/fonts.css">
    <link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
    <link href="style.css" rel="stylesheet">
    <?php include "includes/function.php"; ?>
   
    <script type="text/javascript" src="js/main.js"></script>
    <style>
 .header{/*primer div de sistemas scolar*/
	color: #FFF;
	background: #0a4661;
	height: 40px;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 10px;
	margin:0px 0px -21px 0px;
}
.optionsBar{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: center;
	align-items: center;
	
}
.optionsBar span {/*muestra usuario y su rol*/
    color: #FFF;
    font-size: 10pt;
    font-family: 'GothamBook';    
    margin-left: 30px;
    text-transform: uppercase;
}
.photouser {
    margin-left:15px;
    width: 25px;
    height: 25px;
}
.close{
    width: 25px;
    height: 25px;
}
.optionsBar a {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    margin-left: 30px;
}
  

}
 </style>
 </head>
<body>
     <div class="header">
        	<h3>Sistema Escolar</h3>
		       	<div class="optionsBar">
			      	<p>Bolivia, <?php echo fechaC(); ?></p>
				        <span class="user"><?php echo $_SESSION['user'].' - '.$_SESSION['rol']; ?></span>
			        	<img class="photouser" src="img/user.png" alt="Usuario">
			        	<a href="lista_alumno.php"><img class="close" src="img/atras.jpg" alt="Salir del sistema" title="Salir"></a>
		      	</div>
		</div>
    <!-- menu -->
    <div id="menu" class="col-md-12 text-right">
      <div class="container">
          <a class="btn btn-info" href="lista_horario.php"><i class="fa fa-calendar" aria-hidden="true"></i> Lista de Horarios</a>
          
					<?php if($_SESSION["rol"] == 1 || $_SESSION["rol"] == 3){ ?>
          <a class="btn btn-success" href="registro_horario.php"><i class="fa fa-calendar-check-o"></i> Nuevo Horario</a>
          <?php } ?>
      </div>
    </div>
    <!-- menu -->


    <!-- container -->
      <div class="container" >
         <div class="panel panel-info" style="margin-top: 20px;">
           <div class="panel-heading"><i class="fa fa-calendar" aria-hidden="true"></i> Lista de Horarios</div>
           <div class="panel-body nopadding">
                <?php 
                    if (isset($_GET['page'])){
                      horariostable($_GET['page']);
                    }else{
                      horariostable(1);
                    }
                ?>
           </div>
         </div>
      </div>
    <!-- container -->

    <!-- apend data -->
    <div id="appenddata"></div>
    <!-- apend data -->


<!-- agregar datos del conjunto modal-->
<div class="modal fade" id="DataEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close canceltask" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>		
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-thumb-tack"></i> Agregar Materia</h4>
      </div>
    
      <div class="modal-body">
        
        <form id="taskfrm">
           <label>Materia</label>
           <input class="form-control" type="text" id="nametask" >
           <label>Color:</label>
           <select class="form-control" id="idcolortask">
              <option value="purple-label">Purpura</option>
              <option value="red-label">Rojo</option>
              <option value="blue-label">Azul</option>
              <option value="pink-label">Rosa</option>
              <option value="green-label">Verde</option>
              <option value="brow-label">Cafe</option>
              <option value="yellow-label">Amarillo</option>
              <option value="orange-label">Naranja</option>
              <option value="gray-label">Plomo</option>
           </select> 
          <input id="tede" type="hidden" name="tede" >
        </form>

      </div>
      <div class="modal-footer">
      <?php if($_SESSION["rol"] == 1 || $_SESSION["rol"] == 3){ ?>
       <button type="button" class="savetask btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
      <?php } ?>
      
        <button type="button" class="canceltask btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- append modal set data -->

    <!-- alert danger -->
    <div id="alert-error"><i class="fa fa-times fa-2x"></i></div>
    <!-- alert danger -->
   
  <script src="http://code.jquery.com/jquery-latest.js"></script>
 
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- datetimepicker -->
    <script src="js/moment-with-locales.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <!-- validate -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <!-- script -->
    <script src="js/scripts-custom.js"></script>
</body>
</html>