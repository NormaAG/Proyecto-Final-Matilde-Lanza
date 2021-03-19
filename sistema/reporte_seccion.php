<?php
require('fpdf/fpdf.php');
class PDF extends FPDF{
function Header(){// Cabecera de página
    $this->Image('img/logo.png',6,6,20); // Logo espacio derec,izq y tamaño imagen
    $this->SetFont('times','BU',14);// Arial bold 15
    $this->Cell(60); // Mover a la derecha Título
    $this->SetTextColor(105, 128, 156 );
    $this->Cell(70,10,'Lista de Alumnos U. E. Matilde Lanza',0,0,'C');// tamaño ancho cuadro,alto cuadro, Título,borde
    $this->Ln(25);// Salto de línea

    $this->SetTextColor(10, 0, 0 );
    $this->SetFont('times','B',10);
    $this->cell(15,10,'CI',0,0,'C',0);
    $this->cell(40,10,'Nombre',0,0,'C',0);
    $this->cell(40,10,'Apellidos',0,1,'C',0);
   
}

function Footer(){// Pie de página
    $this->SetY(-15); // Posición: a 1,5 cm del final
    $this->SetFont('Arial','I',8);// Arial italic 8
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');// Número de página
}
}

$mysqli = new mysqli("localhost","root","","matilde");//conexion a la base de datos
$consulta = "SELECT i.ci,a.nombre,a.apellidos FROM inscribir i INNER JOIN alumno a ON i.ci=a.ci ";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();// creamos alias para la paginacion
$pdf->AddPage("PORTRAIT","A4"); //ES LO MISMO A ....$pdf->AddPage();
$pdf->SetFont('Arial','',8);

$pdf->SetLinewidth(1);
$pdf->SetFillColor(55, 129, 225 );
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(255, 255, 255);//borde tabla
while($row = $resultado->fetch_assoc()){
    $pdf->cell(15,10,$row['ci'],1,0,'C',0);
    $pdf->cell(40,10,$row['nombre'],1,0,'C',0);
    $pdf->cell(40,10,$row['apellidos'],1,1,'C',0);
    
}

$pdf->Output();
/*
Addpage(orientacion[PORTRAIT,LANDSCAPE],tamaño[A3,A4,A5,LETTER,LEGAL],rotacionde hoja poner numero),
SetFont(tipo[COURIER, HELVETICA,ARIAL,TIMES,SYMBOL,ZAPDINGBATS], estilo[normal,B,I,U],tamaño),
Cell(ancho,alto,texto,bordes,?,alineacion,rellenar,link),
OutPut(destino[I,D,F,S],nombre_archivo,utf8)
*/
?>