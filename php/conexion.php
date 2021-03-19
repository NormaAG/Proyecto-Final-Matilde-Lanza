<?php
	
    $conn = new mysqli("localhost","root","","matilde");
    $count = 0;
    $sql2 = "SELECT * FROM avisos WHERE estado = 0";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
