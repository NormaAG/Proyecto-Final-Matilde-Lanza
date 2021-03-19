<?php 
	date_default_timezone_set('America/Caracas'); 
	
	function fechaC(){
		$mes = array("","1", 
					  "2", 
					  "3", 
					  "4", 
					  "5", 
					  "6", 
					  "7", 
					  "8", 
					  "9", 
					  "10", 
					  "11", 
					  "12");
		return date('d')."/". $mes[date('n')] . "/" . date('Y');
	}
	
	 ?>