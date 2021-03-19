<?php
session_start();
if($_SESSION['rol'] != 1 AND $_SESSION['rol'] != 2 && $_SESSION['rol'] != 3 AND $_SESSION['rol'] != 4)
	{
		header("location: ./");
	}
include 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UEML | Registro Horario</title>
    <link rel="icon" type="image/ico" href="img/school.png"/>
    
    <link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'><!-- Bootstrap -->
    <link href="style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="fonts.css">
 
    
    <?php include "includes/function.php"; ?>
    <script type="text/javascript" src="js/main.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar-check-o"></i> Nuevo Horario</button>
      </div>
    </div>
    <!-- menu -->


    <!-- container -->
      <div class="container">
       <div id="clockindex" class="col-sm-12 text-center">
         <i class="fa fa-calendar-plus-o icon-clock-index animated infinite pulse" aria-hidden="true"></i>
       </div>
       <div id="mynew" class="col-sm-12">
          
       </div>
      </div>
    <!-- container -->

<!-- modal nuevo horario -->
<div class="modal fade animated bounceInLeft" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cancel-new" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> Nuevo Horario</h4>
      </div>
      <div class="modal-body">
        
         <form id="horariofrm">
            <label>Curso y Seccion:</label>
            <input class="form-control" type="text" name="nombre" >
            <label>Descripcion Aula:</label>
            <textarea class="form-control" name="descripcion" rows="3"></textarea>
            <label>Marcar Dias:</label>
            <div id="days-list" class="col-sm-12">
               <a data-day="1" class="day-option">Lunes</a>
               <a data-day="2" class="day-option">Martes</a>
               <a data-day="3" class="day-option">Miercoles</a>
               <a data-day="4" class="day-option">Jueves</a>
               <a data-day="5" class="day-option">Viernes</a>
               <a data-day="6" class="day-option">Sabado</a>
               <a data-day="7" class="day-option">Domingo</a>
            </div>
            <input id="days-chose" class="form-control" type="text" name="days" >
            <label>Inicio:</label>
            <input class="form-control" type="text" id="time1" name="tiempo1">
            <label>Fin:</label>
            <input class="form-control" type="text" id="time2" name="tiempo2">
            <label>Dividir Entre:</label>
            <select class="form-control" name="minutos">
                <option></option>
                <option value="35">35 Minutos</option>
                <option value="45">45 minutos</option>
                <option value="60">1 Hora</option>
            </select>
         </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="create-horario btn btn-info"><i class="fa fa-calendar-check-o"></i> Crear Horario</button>
        <button type="button" class="cancel-new btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal nuevo horario -->

    
<!-- append modal set data -->
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
        <button type="button" class="savetask btn btn-info"><i class="fa fa-floppy-o"></i> Guardar</button>
      <?php }?>
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
    <!-- RECUADRO DE INSCRIPCION DE HORARIOS MOVIBLES ESTILOS Y MAS-->
    <script src="js/bootstrap.min.js"></script>
    <!-- datetimepicker -->
    <script src="js/moment-with-locales.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <!-- validate -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <!-- script -->
    <script src="js/script.js"></script>
</body>
</html>